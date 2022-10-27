<?php
/**
* Vtiger Web Services PHP Client Library
*
* The MIT License (MIT)
*
* Copyright (c) 2015, Zhmayev Yaroslav <salaros@salaros.com>
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*
* @author    Zhmayev Yaroslav <salaros@salaros.com>
* @copyright 2015-2016 Zhmayev Yaroslav
* @license   The MIT License (MIT)
*/

namespace Salaros\Vtiger\VTWSCLib;

use Salaros\Vtiger\VTWSCLib\WSClient;

/**
* Vtiger Web Services PHP Client Session class
*
* Class Entities
* @package Salaros\Vtiger\VTWSCLib
*/
class Entities
{
    private $wsClient;

    /**
     * Class constructor
     * @param object $wsClient  Parent WSClient instance
     */
    public function __construct($wsClient)
    {
        $this->wsClient = $wsClient;
    }

    /**
     * Retrieves an entity by ID
     * @param  string  $moduleName The name of the module / entity type
     * @param  string  $entityID The ID of the entity to retrieve
     * @return array   $select  The list of fields to select (defaults to SQL-like '*' - all the fields)
     * @return array  Entity data
     */
    public function findOneByID($moduleName, $entityID, array $select = [ ])
    {
        $entityID = $this->wsClient->modules->getTypedID($moduleName, $entityID);
        $record = $this->wsClient->invokeOperation('retrieve', [ 'id' => $entityID ], 'GET');
        if (!is_array($record)) {
            return null;
        }

        return (empty($select))
            ? $record
            : array_intersect_key($record, array_flip($select));
    }

    /**
     * Retrieve the entity matching a list of constraints
     * @param  string  $moduleName   The name of the module / entity type
     * @param  array   $params  Data used to find a matching entry
     * @return array   $select  The list of fields to select (defaults to SQL-like '*' - all the fields)
     * @return array  The matching record
     */
    public function findOne($moduleName, array $params, array $select = [ ])
    {
        $entityID = $this->getID($moduleName, $params);
        return (empty($entityID))
            ? null
            : $this->findOneByID($moduleName, $entityID, $select);
    }

    /**
     * Retrieves the ID of the entity matching a list of constraints + prepends '<module_id>x' string to it
     * @param  string $moduleName   The name of the module / entity type
     * @param  array   $params  Data used to find a matching entry
     * @return string  Type ID (a numeric ID + '<module_id>x')
     */
    public function getID($moduleName, array $params)
    {
        $query = self::getQueryString($moduleName, $params, [ 'id' ], 1);
        $records = $this->wsClient->runQuery($query);
        if (false === $records || !is_array($records) || empty($records)) {
            return null;
        }

        $record = $records[ 0 ];
        return (!is_array($record) || !isset($record[ 'id' ]) || empty($record[ 'id' ]))
            ? null
            : $record[ 'id' ];
    }

    /**
     * Retrieve a numeric ID of the entity matching a list of constraints
     * @param  string  $moduleName   The name of the module / entity type
     * @param  array   $params  Data used to find a matching entry
     * @return integer  Numeric ID
     */
    public function getNumericID($moduleName, array $params)
    {
        $entityID = $this->getID($moduleName, $params);
        $entityIDParts = explode('x', $entityID, 2);
        return (is_array($entityIDParts) && count($entityIDParts) === 2)
            ? intval($entityIDParts[ 1 ])
            : -1;
    }

    /**
     * Creates an entity for the giving module
     * @param  string  $moduleName   Name of the module / entity type for which the entry has to be created
     * @param  array  $params Entity data
     * @return array  Entity creation results
     */
    public function createOne($moduleName, array $params)
    {
        if (!is_assoc_array($params)) {
            throw new WSException(
                "You have to specify at least one search parameter (prop => value) 
                in order to be able to create an entity"
            );
        }

        // Assign record to logged in user if not specified
        if (!isset($params[ 'assigned_user_id' ])) {
            $currentUser = $this->wsClient->getCurrentUser();
            $params[ 'assigned_user_id' ] = $currentUser[ 'id' ];
        }

        $requestData = [
            'elementType' => $moduleName,
            'element'     => json_encode($params)
        ];

        return $this->wsClient->invokeOperation('create', $requestData);
    }

    /**
     * Updates an entity
     * @param  string $moduleName   The name of the module / entity type
     * @param  array $params Entity data
     * @return array  Entity update result
     */
    public function updateOne($moduleName, $entityID, array $params)
    {
        if (!is_assoc_array($params)) {
            throw new WSException(
                "You have to specify at least one search parameter (prop => value) 
                in order to be able to update the entity(ies)"
            );
        }

        // Fail if no ID was supplied
        if (empty($entityID)) {
            throw new WSException("The list of contraints must contain a valid ID");
        }

        // Preprend so-called moduleid if needed
        $entityID = $this->wsClient->modules->getTypedID($moduleName, $entityID);

        // Check if the entity exists + retrieve its data so it can be used below
        $entityData = $this->findOneByID($moduleName, $entityID);
        if ($entityData === false && !is_array($entityData)) {
            throw new WSException("Such entity doesn't exist, so it cannot be updated");
        }

        // The new data overrides the existing one needed to provide
        // mandatory field values to WS 'update' operation
        $params = array_merge(
            $entityData,
            $params
        );

        $requestData = [
            'elementType' => $moduleName,
            'element'     => json_encode($params)
        ];

        return $this->wsClient->invokeOperation('update', $requestData);
    }

    /**
     * Provides entity removal functionality
     * @param  string $moduleName   The name of the module / entity type
     * @param  string $entityID The ID of the entity to delete
     * @return array  Removal status object
     */
    public function deleteOne($moduleName, $entityID)
    {
        // Preprend so-called moduleid if needed
        $entityID = $this->wsClient->modules->getTypedID($moduleName, $entityID);
        return $this->wsClient->invokeOperation('delete', [ 'id' => $entityID ]);
    }

    /**
     * Retrieves multiple records using module name and a set of constraints
     * @param  string   $moduleName  The name of the module / entity type
     * @param  array    $params  Data used to find matching entries
     * @return array    $select  The list of fields to select (defaults to SQL-like '*' - all the fields)
     * @return integer  $limit   Limit the list of entries to N records (acts like LIMIT in SQL)
     * @return integer  $offset  Integer values to specify the offset of the query
     * @return array  The array containing matching entries or false if nothing was found
     */
    public function findMany($moduleName, array $params, array $select = [ ], $limit = 0, $offset = 0)
    {
        if (!is_array($params) || (!empty($params) && !is_assoc_array($params))) {
            throw new WSException(
                "You have to specify at least one search parameter (prop => value) 
                in order to be able to retrieve entity(ies)"
            );
        }

        // Builds the query
        $query = self::getQueryString($moduleName, $params, $select, $limit, $offset);

        // Run the query
        $records = $this->wsClient->runQuery($query);
        if (false === $records || !is_array($records) || empty($records)) {
            return null;
        }

        return $records;
    }

    /**
     * Sync will return a sync result object containing details of changes after modifiedTime
     * @param  integer [$modifiedTime = null]    The date of the first change
     * @param  string [$moduleName = null]   The name of the module / entity type
     * @param  string [$syncType = null]   Sync type determines the scope of the query
     * @return array  Sync result object
     */
    public function sync($modifiedTime = null, $moduleName = null, $syncType = null)
    {
        $modifiedTime = (empty($modifiedTime))
            ? strtotime('today midnight')
            : intval($modifiedTime);

        $requestData = [
            'modifiedTime' => $modifiedTime
        ];

        if (!empty($moduleName)) {
            $requestData[ 'elementType' ] = $moduleName;
        }

        if ($syncType) {
            $requestData[ 'syncType' ] = $syncType;
        }

        return $this->wsClient->invokeOperation('sync', $requestData, 'GET');
    }

    /**
     * Builds the query using the supplied parameters
     * @access public
     * @static
     * @param  string   $moduleName  The name of the module / entity type
     * @param  array    $params  Data used to find matching entries
     * @return string   $select  The list of fields to select (defaults to SQL-like '*' - all the fields)
     * @return integer  $limit   Limit the list of entries to N records (acts like LIMIT in SQL)
     * @return integer  $offset  Integer values to specify the offset of the query
     * @return string   The query build out of the supplied parameters
     */
    public static function getQueryString($moduleName, array $params, array $select = [ ], $limit = 0, $offset = 0)
    {
        $criteria = array();
        $select = (empty($select)) ? '*' : implode(',', $select);
        $query = sprintf("SELECT %s FROM $moduleName", $select);
        
        if (!empty($params)) {
            foreach ($params as $param => $value) {
                $criteria[ ] = "{$param} LIKE '{$value}'";
            }

            $query .= sprintf(' WHERE %s', implode(" AND ", $criteria));
        }

        if (intval($limit) > 0) {
            $query .= (intval($offset) > 0)
                ? sprintf(" LIMIT %s, %s", intval($offset), intval($limit))
                : sprintf(" LIMIT %s", intval($limit));
        }

        return $query;
    }
}
