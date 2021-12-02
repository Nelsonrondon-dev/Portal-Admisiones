<?php

include("Vtiger.php");

$obj = new Vtiger();
$data['email'] = 'test13@gmail.com';
$data['firstname'] = 'Ramiro Michaelee';
$data['lastname'] = 'Morales';
$data['phone'] = '332715992';
$data['numdoc'] = '42867896';
$data['nacionalidad'] = 'Italia';
$rs = $obj->setAccount($data);

$data['email'] = 'test13@gmail.com';
$data['firstname'] = 'Ramiro Michaelee';
$data['lastname'] = 'Morales';
$data['mobile'] = '992128527';
$data['numdoc'] = '42867896';

$rs = $obj->setContacts($data);

$data['codigo_curso'] = "DBIMSAP";
$data['motivo1_eleccion_EADIC'] = 'AAA1';
$data['motivo2_eleccion_EADIC'] = 'AA2';
$data['motivo3_eleccion_EADIC'] = 'AA3';

$rs = $obj->setPotentials($data);
echo "<pre>";

print_r($rs);
exit();
require 'vendor/autoload.php';

use Salaros\Vtiger\VTWSCLib\WSClient;
use Salaros\Vtiger\VTWSCLib\Entities;

$client = new WSClient('', 'admin', '');

$query = 'SELECT id FROM Accounts limit 2';

$r = $client->runQuery($query);

//print_r($r);

$ent = new Entities($client);

$moduleName = 'Accounts';
$params['email1'] = 'test2@gmail.com';
$id = $ent->getID($moduleName, $params);


$row2 = $ent->findOne($moduleName, $params);

//$row['phone'] = '33356';
//$row2 = $ent->updateOne($moduleName, $id, $row);

echo "<pre>";
print_r($row2);
