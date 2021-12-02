<?PHP namespace App\vtwsclib;

require 'vendor/autoload.php';

use App\vtwsclib\src\WSClient;
use App\vtwsclib\src\Entities;
use App\vtwsclib\src\Modules;

class Vtiger
{

    protected $CI;
    public $client;
    protected $login;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        // $this->CI = &get_instance();
    }
  
    public function login()
    {
        $contrasena = env('VTIGER_PASSWORD', 'VTIGER');
        $url = env('VTIGER_HOST', 'https://crm.eadic.es');
        $user = env('VTIGER_USERNAME', 'VTIGER'); 
        $this->client = new WSClient($url, $user, $contrasena);
    }
    public function setAccount($data = array(), $only_verify = false)
    {
        if (!$this->client) {
            return array("rA" => array(), "option" => "NOT LOGIN");
        }
        $module = 'Accounts';
        $lstAccountF = array(
            'accountname' => 'accountname',
            'email1' => 'email',
            'phone' => 'phone',
            // Documento de identidad
            'cf_1176' => 'numdoc',
            'bill_street' => 'lane',
            'bill_state' => 'state',
            'bill_city' => 'city',
            'bill_country' => 'nacionalidad',
        );

        $params = array();
        $params['email1'] = $data['email'];


        $ent = new Entities($this->client);

        $id = $ent->getID($module, $params);
        // echo  var_dump($id);
        if ($only_verify) {
            return ($id === null) ? false : $id;
        }
        $rs = $ent->findOne($module, $params);


        $rA = $rs;
        $option = 'update';
        if ($rs === null) {
            $option = 'create';
            $rA = array();
        }


        foreach ($lstAccountF as $fieldC => $fieldF) {
            if ($fieldF == 'accountname') {
                if (isset($data['firstname']) && isset($data['lastname'])) {

                    $rA[$fieldC] = $data['firstname'] . ' ' . $data['lastname'];
                }
            } else {
                if (isset($data[$fieldF])) {
                    $rA[$fieldC] = $data[$fieldF];
                }
            }
        }

        if ($option == 'update') {
            // print_r($rA);
            try {
                $rA = $ent->updateOne($module, $id, $rA);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        } else {
            //print_r($rA);
            try {
                $rA = $ent->createOne($module, $rA);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        }

        return array("rs" => $rA, "option" => $option);
    }

    public function setContacts($data = array(), $only_verify = false)
    {
        if (!$this->client) {
            return array("rA" => array(), "option" => "NOT LOGIN");
        }

        /*********************** Campos disponibles en CRM *************************** */
        $module = 'Contacts';
        $array = array(
            'firstname' => 'firstname',
            'lastname' => 'lastname',
            'email' => 'email',
            'mailingcountry' => 'country',
            'homephone' => 'phone',
            'mobile' => 'otros_telefonos',
            'birthday' => 'fecha_nacimiento',
            // Nacionalidad
            'cf_906' => 'country',
            // Documento de Identidad
            // 'cf_854' => 'tipodoc',
            // Nº de Identificación
            'cf_852' => 'numdoc',
            'mailingstreet' => 'lane',
            'mailingstate' => 'state',
            'mailingcity' => 'city',
            // Genero
            // 'cf_856' => 'genero',
            // Institución
            'cf_864' => 'universidad_licenciatura',
            // Tipo de programa
            // 'cf_866' => 'tipo_programa_otro_proceso',
            // Nombre del programa
            'cf_868' => 'codigo_curso',
            // Nivel de estudios culminados
            // 'cf_876' => 'nivel_de_estudios_culminado',
            // Situación laboral actual
            // 'cf_872' => 'situacion_laboral',
            // Empresa donde labora
            // 'cf_870' => 'empresa',
            // 'title' => 'title',
            // Años de experiencia profesional
            // 'cf_874' => 'experiencia_laboral',
            // Pendiente
            'cf_1046' => 'cf_1046',
            // 'cf_996' => 'doc1',
            // 'cf_998' => 'doc2',
            // 'cf_1002' => 'doc3',
            // 'cf_1010' => 'doc4',
            // 'cf_1004' => 'doc5',
            'leadsource' => 'como_nos_conociste',
            // 'cf_890' => 'licenciatura_obtenida',
            'title' => 'cargo',
            'othercountry' => 'country'
        );
        // $email=$this->input->post('email',true);

        $params = array();
        $params['email'] = $data['email'];

        $ent = new Entities($this->client);

        $id = $ent->getID($module, $params);
        // echo  var_dump($id);

        if ($only_verify) {
            return ($id === null) ? false : $id;
        }


        $rs = $ent->findOne($module, $params);


        $rA = $rs;
        $option = 'update';
        if ($rs === null) {
            $option = 'create';
            $rA = array();
        }



        //si no existecomo contacto  y tampoco tiene un codigo_curso creado debemo
        // de  crearlo como suscriptor
        if ($option == 'create' && empty($data['codigo_curso'])) {
            return 'new_subscriber';
        }


        foreach ($array as $fieldC => $fieldF) {
            if (isset($data[$fieldF])  && !empty($data[$fieldF])) {
                $rA[$fieldC] = $data[$fieldF];

                switch ($fieldC) {
                    case 'cf_890':
                        $rA[$fieldC] = true;
                        break;
                }
            }
        }

        $rA['cf_972'] = 'link de video de youtube: '.$data['youtube'].PHP_EOL."Link carta de recomendacion: ".$data['carta'];

        if (!isset($data['account_id']) || empty($data['account_id'])) {
            echo 'No se envio el ID de la cuenta para relacionar';
            exit();
        } else {
            $rA['account_id'] = $data['account_id'];
        }


        if ($option == 'update') {
            // print_r($rA);
            try {
                $rA = $ent->updateOne($module, $id, $rA);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        } else {
            //print_r($rA);
            try {
                $rA = $ent->createOne($module, $rA);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        }


            /***********************  Inicio Ralacionar Producto al Contacto *********************************** */
          if (!empty($data['codigo_curso'])) {

            $sql = "SELECT id FROM Products WHERE serial_no = '" . $data['codigo_curso'] . "'  ";
            $rPr = $this->client->runQuery($sql);

            $rPro['id'] = 0;
            $rPro['product_no'] = 0;
            $rPro['cf_1356'] = 0;

            if (count($rPr) > 0) {
                $params = array();
                $params['id'] = $rPr[0]['id'];
                $rPro = $ent->findOne('Products', $params);
            }

            $_REQUEST['product_id'] = $rPro['id'];       // Tipo de producto

            $rPro2 = array(-1);
            $related_result = '-';
            if (!empty($_REQUEST['product_id'])) {

                /** Buscar Relacion */
                $rPro = $this->client->invokeOperation(
                    'retrieve_related',
                    array('id' => $rA['id'],  'relatedType' => 'Products', 'relatedLabel' => 'Products'),
                    'GET'
                );
                //'serial_no' => $data['codigo_curso'],

                $new = true;
                if (count($rPro) > 0) {
                    foreach ($rPro as $k => $v) {
                        if ($v['serial_no'] == $data['codigo_curso']) {
                            $new = false;
                        }
                    }
                }

                if (count($rPro) <= 0 || $new) {
                    /** Crear Relacion */
                    $rPro2 = $this->client->invokeOperation(
                        'add_related',
                        array(
                            'sourceRecordId' => $rA['id'],
                            'relatedRecordId' => $_REQUEST['product_id'],
                            'relationIdLabel' => 'Products'
                        ),
                        'POST'
                    );
                    $related_result = 'Se crea una nueva relacion con la oportunidad';
                } else {
                    $related_result = 'Ya existe una relacion con la oportunidad';
                }
             }
         }
            /*********************** FIn Ralacionar Producto al Contacto *********************************** */

   
        return array("rA" => $rA, "option" => $option, "modulo" => $module);
    }


    public function setSubscriber($data = array(), $only_verify = false)
    {
       
        if (!$this->client) {
            return array("rA" => array(), "option" => "NOT LOGIN");
        }

        /*************************  Campos disponilbles en CRM ************************* */
        $module = 'Leads';
        $array = array(
            'firstname' => 'firstname',
            'lastname' => 'lastname',
            'email' => 'email',
            'leadsource' => 'como_nos_conociste',
            'country' => 'country',
            'phone' => 'phone',
            'cf_1598' => 'cf_1598'
            // 'homephone' => 'phone',
            //'birthday' => 'fecha_nacimiento',
            // Nacionalidad
            //'cf_906' => 'nacionalidad',
            // Documento de Identidad
            //'cf_854' => 'tipodoc',
            // Nº de Identificación
            //'cf_852' => 'numdoc',
            // 'mailingstreet' => 'lane',
            // 'mailingstate' => 'state',
            // 'mailingcity' => 'city',
            // Genero
            //  'cf_856' => 'genero',
            // Institución
            //'cf_864' => 'entidad_otro_proceso',
            // Tipo de programa
            // 'cf_866' => 'tipo_programa_otro_proceso',
            // Nombre del programa
            // 'cf_868' => 'nombre_programa_otro_proceso',
            // Nivel de estudios culminados
            // 'cf_876' => 'nivel_de_estudios_culminado',
            // Situación laboral actual
            // 'cf_872' => 'situacion_laboral',
            // Empresa donde labora
            /// 'cf_870' => 'empresa',
            // 'title' => 'title',
            // Años de experiencia profesional
            //'cf_874' => 'experiencia_laboral',
            // Pendiente
            //'cf_1046' => 'cf_1046',
        );

        $params = array();
        $params['email'] = $data['email'];


        $ent = new Entities($this->client);

        $id = $ent->getID($module, $params);

        if ($only_verify) {
            return ($id === null) ? false : $id;
        }

        $rs = $ent->findOne($module, $params);


        $rA = $rs;
        $option = 'update';
        if ($rs === null) {
            $option = 'create';
            $rA = array();
        }
      

        foreach ($array as $fieldC => $fieldF) {
            if (isset($data[$fieldF])  && !empty($data[$fieldF])) {
                $rA[$fieldC] = $data[$fieldF];
            }
        }

        $rA['cf_1370'] = 'link de video de youtube: '.$data['youtube'].PHP_EOL."Link carta de recomendacion: ".$data['carta'];


        if ($option == 'update') {
            // print_r($rA);
            try {
                $rA = $ent->updateOne($module, $id, $rA);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        } else {
            //print_r($rA);
            try {
                $rA = $ent->createOne($module, $rA);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        }



        /*********************** INICIO Ralacionar Producto al Leads *********************************** */
        if (!empty($data['codigo_curso'])) {

        $sql = "SELECT id FROM Products WHERE serial_no = '" . $data['codigo_curso'] . "'  ";
        $rPr = $this->client->runQuery($sql);

        $rPro['id'] = 0;
        $rPro['product_no'] = 0;
        $rPro['cf_1356'] = 0;

        if (count($rPr) > 0) {
            $params = array();
            $params['id'] = $rPr[0]['id'];
            $rPro = $ent->findOne('Products', $params);
        }

        $_REQUEST['product_id'] = $rPro['id'];       // Tipo de producto

        $rPro2 = array(-1);
        $related_result = '-';
        if (!empty($_REQUEST['product_id'])) {

            /** Buscar Relacion */
            $rPro = $this->client->invokeOperation(
                'retrieve_related',
                array('id' => $rA['id'],  'relatedType' => 'Products', 'relatedLabel' => 'Products'),
                'GET'
            );
            //'serial_no' => $data['codigo_curso'],

            $new = true;
            if (count($rPro) > 0) {
                foreach ($rPro as $k => $v) {
                    if ($v['serial_no'] == $data['codigo_curso']) {
                        $new = false;
                    }
                }
            }

            if (count($rPro) <= 0 || $new) {
                /** Crear Relacion */
                $rPro2 = $this->client->invokeOperation(
                    'add_related',
                    array(
                        'sourceRecordId' => $rA['id'],
                        'relatedRecordId' => $_REQUEST['product_id'],
                        'relationIdLabel' => 'Products'
                    ),
                    'POST'
                );

                /** relacionando  el producto al contacto */
                // $rPro3 = $this->client->invokeOperation(
                //     'add_related',
                //     array(
                //         'sourceRecordId' => $id_contacts,
                //         'relatedRecordId' => $_REQUEST['product_id'],
                //         'relationIdLabel' => 'Products'
                //     ),
                //     'POST'
                // );
                $related_result = 'Se crea una nueva relacion con la oportunidad';
            } else {
                $related_result = 'Ya existe una relacion con la oportunidad';
            }
        }
        
        }

        /*********************** FIn Ralacionar Producto al Leads *********************************** */
 
        return array("rA" => $rA, "option" => $option, "modulo" => $module);
    }



    public function addline($data, $key, $title, $end = false)
    {
        $line = '';
        if (isset($data[$key])) {
            $line = ' ' . $title . ': [' . $data[$key] . ']   
            ';
        }
        if ($end) {
            $line .= '************************
             ';
        }
        return $line;
    }
    public function setPotentials($data = array())
    {
        //$this->login();
        if (!$this->client) {
            return array("rA" => array(), "option" => "NOT LOGIN");
        }

        /************************************************** */
        $module = 'Potentials';
        $lstPotentialsF = array(
            'potentialname' => 'potentialname',
            'related_to' => 'related_to',
            'contact_id' => 'contact_id',
            'sales_stage' => 'sales_stage',
            // Motivo1 eleccion EADIC
            'cf_900' => 'motivo1_eleccion_EADIC',
            // Motivo2 eleccion EADIC
            'cf_902' => 'motivo2_eleccion_EADIC',
            // Motivo3 eleccion EADIC
            'cf_904' => 'motivo3_eleccion_EADIC',
            'cf_1382' => 'ID',
            'cf_1384' => 'name_backend',
            'cf_1398' => 'detalles',
            'opportunity_type' => 'tipo_programa',
            'cf_1364' => 'codigo_curso',
            'cf_970' => 'admision_fecha_completado',
            'cf_892' => 'recursos',
            'cf_1046' => 'modalidad_pago',
            'cf_1170' => 'forma_de_pago',
        );
        /************************************************** */
        // $email=$this->input->post('email',true);
        $ent = new Entities($this->client);

        /** obtenemos el ID de accounts */
        $params = array();
        $params['email1'] = $data['email'];
        $id_accounts = $ent->getID('Accounts', $params);
        $params = array();
        $params['email'] = $data['email'];
        $id_contacts = $ent->getID('Contacts', $params);
        /** obtenemos el ID de contactos */

        $params = array();
        $params['email'] = $data['email'];


        $sql = "SELECT * FROM Potentials WHERE contact_id = '" . $id_contacts . "' AND related_to = '" . $id_accounts . "' ";
        $sql .= " and cf_1382='" . $data['ID'] . "' ";
        $sql .= " AND sales_stage != 'Close Won' AND sales_stage != 'Close Lost' ORDER BY createdtime DESC";


        $rs = $this->client->runQuery($sql);

        //$id = $ent->getID($module, $params);
        // echo  var_dump($id);
        //echo "<pre>";
        //print_r($rs);
        //exit();



        if (count($rs) <= 0 || $rs === null) {
            $option = 'create';
            $rP = array();
        } else {
            //$rP = $rs;
            $option = 'update';
            $params = array();
            $params['id'] = $rs[0]['id'];
            $id_potentials = $rs[0]['id'];
            $rP = $ent->findOne($module, $params);
        }
        /*
        echo $option;
        echo "<pre>";
        echo $module;
        echo var_dump($rP);
        exit();
        */

        /******************************************************** */
        foreach ($lstPotentialsF as $fieldC => $fieldF) {
            if ($fieldF == 'related_to')
                $rP[$fieldC] = $id_accounts;
            elseif ($fieldF == 'contact_id')
                $rP[$fieldC] = $id_contacts;
            elseif ($fieldF == 'sales_stage') {
                $rP[$fieldC] = 'Pendiente-auto-creado-desde-web';
            } elseif ($fieldF == 'potentialname') {



                $sql = "SELECT id FROM Products WHERE serial_no = '" . $data['codigo_curso'] . "'  ";
                $rPr = $this->client->runQuery($sql);

                $rPro['id'] = 0;
                $rPro['product_no'] = 0;
                $rPro['cf_1356'] = 0;

                if (count($rPr) > 0) {
                    $params = array();
                    $params['id'] = $rPr[0]['id'];
                    $rPro = $ent->findOne('Products', $params);
                }

                $_REQUEST['product_id'] = $rPro['id'];       // Tipo de producto
                $rP[$fieldC] = $rPro['product_no'] . '-' . $rPro['cf_1356'] . '-' . $data['codigo_curso'] . '-' . $data['firstname'] . ' ' . $data['lastname'];
            } else {
                if (isset($data[$fieldF]) && !empty($data[$fieldF])) {
                    $rP[$fieldC] = $data[$fieldF];
                }
            }


            switch ($fieldC) {
                case 'cf_1398':
                    $otro_proceso_admision = $data['otro_proceso_admision'];

                    $entidad_otro_proceso = $data['entidad_otro_proceso'];
                    $tipo_programa_otro_proceso = $data['tipo_programa_otro_proceso'];
                    $nombre_programa_otro_proceso = $data['nombre_programa_otro_proceso'];
                    $detalles = '';

                    $detalles .= $this->addline($data, 'admision_fecha_inicio', 'Admision Fecha Inicio', true);


                    if ($otro_proceso_admision == 'si') {
                        $detalles .= ' Sí, estoy participando en otro proceso.  
                             ';
                        $detalles .= 'Institución:[ ' . $entidad_otro_proceso . ']    
                            ';
                        $detalles .= 'Programa:[' . $nombre_programa_otro_proceso . ']  
                             ';
                        $detalles .= 'Tipo de programa:[' . $tipo_programa_otro_proceso . ']
                        **************************

                        ';

                        /*
                        
                        
                        
                        
                        
                        
                        
                        
                        */
                    } else {
                        $detalles .= ' No, no participo en ninguno. 
                        *****************************
                        ';
                    }

                    $detalles .= $this->addline($data, 'promedio_licenciatura', 'Promedio Licenciatura');
                    $detalles .= $this->addline($data, 'maestria_obtenida', 'Maestria Obtenida');
                    $detalles .= $this->addline($data, 'promedio_maestria', 'Promedio Maestria');
                    $detalles .= $this->addline($data, 'doctorado_obtenido', 'Doctorado Obtenido');
                    $detalles .= $this->addline($data, 'doctorado_obtenido', 'Universidad Doctorado');
                    $detalles .= $this->addline($data, 'promedio_doctorado', 'Promedio Doctorado');
                    $detalles .= $this->addline($data, 'situacion_laboral', 'Situacion Laboral', true);
                    /*
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                     */ //tipo_programa
                    $detalles .= $this->addline($data, 'nombre', 'Nombre', false);
                    $detalles .= $this->addline($data, 'titulo_propio', 'Titulo propio', false);
                    $detalles .= $this->addline($data, 'precio_oficial', 'Precio Oficial', false);
                    $detalles .= $this->addline($data, 'precio_becado_latam', 'Precio Becado Latam', false);
                    $detalles .= $this->addline($data, 'precio_becado_europa', 'Precio Becado Europa', false);
                    $detalles .= $this->addline($data, 'url_web', 'URL WEB', false);
                    $detalles .= $this->addline($data, 'url_pdf', 'URL PDF', false);
                    $detalles .= $this->addline($data, 'area_curso', 'Area Curso', false);
                    $detalles .= $this->addline($data, 'tiempo_curso', 'Tiempo Curso', false);
                    $detalles .= $this->addline($data, 'Modulos', 'Modulos', true);

                    $detalles .= $this->addline($data, 'capacidad', 'Capacidad', true);
                    $rP[$fieldC] =  ($detalles);
                    break;

                case 'opportunity_type':
                    $arr[] = 'curso corto';
                    $arr[] = 'diplomado';
                    $arr[] = 'master';

                    $tipo_programa = trim(strtolower($data['tipo_programa']));

                    if ($tipo_programa == 'curso corto' || $tipo_programa == 'cursocorto') {
                        $temp = 'CC_ONLINE';
                    } else if ($tipo_programa == 'diplomado') {
                        $temp = 'D_ONLINE';
                    } else if ($tipo_programa == 'master' || $tipo_programa == 'máster') {
                        $temp = 'M_ONLINE';
                    }
                    /**
      
                     */

                    $rP[$fieldC] = $temp;
                    break;
            }
        }

        /******************************************************** */

        if ($option == 'update') {
            // print_r($rA);
            try {
                $rA = $ent->updateOne($module, $id_potentials, $rP);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        } else {
            //print_r($rA);
            try {
                $rA = $ent->createOne($module, $rP);
            } catch (Exception $e) {
                $rA =  $e->getMessage();
            }
        }

        /********************************************************** */
        $rPro2 = array(-1);
        $related_result = '-';
        if (!empty($_REQUEST['product_id'])) {

            /** Buscar Relacion */
            $rPro = $this->client->invokeOperation(
                'retrieve_related',
                array('id' => $rA['id'],  'relatedType' => 'Products', 'relatedLabel' => 'Products'),
                'GET'
            );
            //'serial_no' => $data['codigo_curso'],

            $new = true;
            if (count($rPro) > 0) {
                foreach ($rPro as $k => $v) {
                    if ($v['serial_no'] == $data['codigo_curso']) {
                        $new = false;
                    }
                }
            }

            if (count($rPro) <= 0 || $new) {
                /** Crear Relacion */
                $rPro2 = $this->client->invokeOperation(
                    'add_related',
                    array(
                        'sourceRecordId' => $rA['id'],
                        'relatedRecordId' => $_REQUEST['product_id'],
                        'relationIdLabel' => 'Products'
                    ),
                    'POST'
                );

                /** relacionando  el producto al contacto */
                $rPro3 = $this->client->invokeOperation(
                    'add_related',
                    array(
                        'sourceRecordId' => $id_contacts,
                        'relatedRecordId' => $_REQUEST['product_id'],
                        'relationIdLabel' => 'Products'
                    ),
                    'POST'
                );
                $related_result = 'Se crea una nueva relacion con la oportunidad';
            } else {
                $related_result = 'Ya existe una relacion con la oportunidad';
            }
        }



        return array("rA" => $rA, "rPro" => $rPro, "rPro2" => $rPro2, 'related_result' => $related_result, "option" => $option, "modulo" => $module);
    }


    public function convertirLead($lead_id, $exists_account, $exists_contact,  $campos)
    {
        // $this->login();
        if (!$this->client) {
            return array("rA" => array(), "option" => "NOT LOGIN");
        }

        $convert_lead_array = array();
        $convert_lead_array['leadId'] = $lead_id;
        $convert_lead_array['assignedTo'] = '19x1';
        $convert_lead_array['entities']['Accounts']['create'] = ($exists_account === false) ? true : false;
        $convert_lead_array['entities']['Accounts']['name'] = 'Accounts';
        $convert_lead_array['entities']['Accounts']['accountname'] = $campos['firstname'] . ' ' . $campos['lastname'];
        $convert_lead_array['entities']['Accounts']['email1'] = $campos['email'];

        $convert_lead_array['entities']['Contacts']['create'] = ($exists_contact === false) ? true : false;
        $convert_lead_array['entities']['Contacts']['name'] = 'Contacts';
        $convert_lead_array['entities']['Contacts']['lastname'] = $campos['lastname'];
        $convert_lead_array['entities']['Contacts']['firstname'] = $campos['firstname'];
        $convert_lead_array['entities']['Contacts']['email'] = $campos['email'];
        $convert_lead_json = json_encode($convert_lead_array);

        $r = $this->client->invokeOperation(
            'convertlead',
            array('element' => $convert_lead_json),
            'POST'
        );

        /*
        $r = $client->doInvoke('convertlead', array('element' => $convert_lead_json));
        $wasError = $client->lastError();
        if ($wasError) {
            echo $wasError['code'] . ':' . $wasError['message'];
            die();
        }
        */
        if (!isset($r['Potentials'])) {
            $r['Potentials'] = -1;
        }
        if (!isset($r['Accounts'])) {
            $r['Accounts'] = -1;
        }
        if (!isset($r['Contacts'])) {
            $r['Contacts'] = -1;
        }
        return array($r['Accounts'], $r['Contacts'], $r['Potentials']);
    }
}
