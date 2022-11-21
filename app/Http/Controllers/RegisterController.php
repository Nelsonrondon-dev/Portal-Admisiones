<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RelacionUserMaster;
use App\Master;
use App\End;
use App\Step;
use App\vtwsclib\Vtiger;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();


        return view('admin.registros.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);


        return view('admin.registros.edit', ['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       

        $user = User::findOrFail($id);
        $end = End::where('user_id', $id)->first();


        // Request PASO 1
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phone = $request->full_phone;
        $user->country = $request->countryid;
     //   $user->email = $request->email;
        $user->master = $request->master;


       // $url = '';
        // $validated = $request->validated();

        if ($request->file) { 
            $request->validate([
                "file" => "required|mimes:pdf|max:10000"
            ]);
            // $pdf = $request->file('file')->store('public/pdf');
            $pdf =  $request->file('file')->storeAs(
                'public/pdf', 'CV_'.$user->name.'_'.$user->lastname.".pdf"
            );
            
            $url = "https://eadic.org/portal-admisiones/storage/app/".$pdf;
           // $end->curriculum = $url;
        } else {

            if ($end) {
                $url = $end->curriculum;
            }
            else {
                $url = '';
            }
           
        }


        if ($request->master) {
           
            // determinamos si existe una relacion asociada a este ususario
            $relacion =  RelacionUserMaster::where('user_id', $id)->first();

            // Buscamos el master asociado al codigo pasado  en el request 
            $master = Master::where('codigo', $request->master)->first();

                if ($relacion != null) {
                    $relacion->master_id = $master->id;
                    $relacion->update();
                }
                else {
                    RelacionUserMaster::create([
                        'user_id' => $id,
                        'master_id' => $master->id,
                    ]);
                };

        }

     

        // Request PASO 2






        // Request PASO 3


        // $bookingcount = $user->getbookings->count();

        // if ($bookingcount == 0) {
          
        //     $booking = Booking::create([
        //         'user_id' => $id,
        //         'title' => $request->title,
        //         'start_date' => $request->start_date,
        //         'end_date' => $request->end_date,
        //         'start_date_espana' => $request->start_date_espana,
        //     ]);

        // }




        // Request   PASO 4

       // $end = End::where('user_id', $id)->first();
       


        if (!$end) {
            $end = End::create([
                'user_id' => $user->id,
                'curriculum' => $url,
                'name_1' => $request->name1,
                'lasname_1' => $request->lastname1,
                'phone_1' => $request->phone1,
                'alumno_eadic_1' => $request->alumno1,
                'name_2' => $request->name2,
                'lasname_2' => $request->lastname2,
                'phone_2' => $request->phone2,
                'alumno_eadic_2' => $request->alumno2,
            ]);           
        }
        else {
            $end =   $end->update([
                'user_id' => $user->id,
                'curriculum' => $url,
                'name_1' => $request->name1,
                'lasname_1' => $request->lastname1,
                'phone_1' => $request->phone1,
                'alumno_eadic_1' => $request->alumno1,
                'name_2' => $request->name2,
                'lasname_2' => $request->lastname2,
                'phone_2' => $request->phone2,
                'alumno_eadic_2' => $request->alumno2,
            ]);         
        }

        // Request   PASO 5


        $step = Step::where('user_id', $id)->first();


        if (!$step) {
            
            $step = Step::create([
                'user_id' => $user->id,
                'step1' => $request->step1,
                'step2' => $request->step2,
                'step3' => $request->step3,
                'step4' => $request->step4,
                'step5' => $request->step5,
                'step6' => $request->step6,
            ]);

        } else {

            $step = $step->update([
                'user_id' => $user->id,
                'step1' => $request->step1,
                'step2' => $request->step2,
                'step3' => $request->step3,
                'step4' => $request->step4,
                'step5' => $request->step5,
                'step6' => $request->step6,
            ]);


        }

        // Actualizar user
        
        $user->update();

       
        $client = new Vtiger();
        $client->login();

        // Se crea el Arrray con los datos recibidos
        $data = [
            //  'email' => 'persona2601_esc2@eadic.es',
            'email' => $user->email,
            'firstname' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->full_phone,
            'country' => $request->country,
            'cf_1598' => $request->master,
            'codigo_curso' => $request->master,
            //   'youtube' => $request->youtube,
            //   'carta' => url($url)
        ];

        $data['assigned_user_id'] = '19x643';

        $log = array();
        $rs_log = array();
        $rs = '';
        $exists_product = !empty($data['codigo_curso']);
        $exists_account = $client->setAccount($data, true);
        $exists_contact = $client->setContacts($data, true);
        $exists_subscriber = $client->setSubscriber($data, true);

        // se crea un lead si no exixte cuenta ni contacto

        if ($exists_subscriber == false && $exists_account == false && $exists_contact == false) {

            // Estado de la solicitud
            $data['rating'] = 'MO_Nuevo user';

            // Campana de origen
            $data['cf_1206'] = 'Portal-Admisiones-Nuevo';

            // Enlace Fuente
            $data['cf_978'] = 'https://eadic.org/portal-admisiones/public/';

            // Horario de asesoria personalizada Espana
          //  $data['cf_1670'] = $booking->start_date_espana;

            // Datos de la Recomendacion
            $data['cf_1370'] = "Link CV: ".$url.PHP_EOL.'Nombre recomendacion 1:'.$request->name1.PHP_EOL.'Apellido recomendacion 1:'.$request->lastname1.PHP_EOL.'Numero recomendacion 1:'.$request->phone1.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 1:'.$request->alumno1.PHP_EOL.'Nombre recomendacion 2:'.$request->name2.PHP_EOL.'Apellido recomendacion 2:'.$request->lastname2.PHP_EOL.'Numero recomendacion 2:'.$request->phone2.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 2:'.$request->alumno2;


            $data['cf_1370'] .= "Estatus de Admision".PHP_EOL."Paso 1: ".$request->step1.PHP_EOL."Paso 2: ".$request->step2.PHP_EOL."Paso 3: ".$request->step3.PHP_EOL."Paso 4: ".$request->step4.PHP_EOL."Paso 5: ".$request->step5;

            $rs = $client->setSubscriber($data);
            $rs_log['subscriber'] = $rs;
            $log[] = 'No contacto, No cuenta, se crear lead';
        } else {
            if ($exists_subscriber !== false) {


                // Estado de la solicitud

                $data['rating'] = 'MO_Modifica admision';

                // Campana de origen
                $data['cf_1652'] = 'Portal-Admisiones-Nuevo';

                // Horario de asesoria personalizada Espana
            //    $data['cf_1670'] = $booking->start_date_espana;


                // Datos de la Recomendacion
                $data['cf_1370'] = "Link CV: ".$url.PHP_EOL.'Nombre recomendacion 1:'.$request->name1.PHP_EOL.'Apellido recomendacion 1:'.$request->lastname1.PHP_EOL.'Numero recomendacion 1:'.$request->phone1.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 1:'.$request->alumno1.PHP_EOL.'Nombre recomendacion 2:'.$request->name2.PHP_EOL.'Apellido recomendacion 2:'.$request->lastname2.PHP_EOL.'Numero recomendacion 2:'.$request->phone2.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 2:'.$request->alumno2;


                $data['cf_1370'] .= "Estatus de Admision".PHP_EOL."Paso 1: ".$request->step1.PHP_EOL."Paso 2: ".$request->step2.PHP_EOL."Paso 3: ".$request->step3.PHP_EOL."Paso 4: ".$request->step4.PHP_EOL."Paso 5: ".$request->step5;


                $rs = $client->setSubscriber($data);
                $rs_log['subscriber'] = $rs;
                $log[] = 'No producto, No contacto, No cuenta, pero si Subsrcritor actualiza';
                /**
                 *  no hay cuenta o contacto pero si existe el suscirptor se actualiza lead
                 */
            } else {

                 // Estado de la solicitud
                $data['cf_972'] = 'MO_Modifica admision';

                // Campana de origen
                $data['cf_982'] = 'Portal-Admisiones-Nuevo';


                // Enlace Fuente
                $data['cf_980'] = 'https://eadic.org/portal-admisiones/public/';

                // Horario de asesoria personalizada Espana
            //    $data['cf_1026'] = $booking->start_date_espana;


                $data['cf_998'] = "Link CV: ".$url;

                $data['cf_972'] = 'Nombre recomendacion 1:'.$request->name1.PHP_EOL.'Apellido recomendacion 1:'.$request->lastname1.PHP_EOL.'Numero recomendacion 1:'.$request->phone1.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 1:'.$request->alumno1.PHP_EOL.'Nombre recomendacion 2:'.$request->name2.PHP_EOL.'Apellido recomendacion 2:'.$request->lastname2.PHP_EOL.'Numero recomendacion 2:'.$request->phone2.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 2:'.$request->alumno2;

                $data['cf_972'] .= "Estatus de Admision".PHP_EOL."Paso 1: ".$request->step1.PHP_EOL."Paso 2: ".$request->step2.PHP_EOL."Paso 3: ".$request->step3.PHP_EOL."Paso 4: ".$request->step4.PHP_EOL."Paso 5: ".$request->step5;


                $log[] = 'Ya existe contacto y cuaeta solo hay que actualizar';
                $rs = $client->setAccount($data);
                $rs_log['account'] = $rs;

                $data['account_id'] = $rs['rs']['id'];
                $rs = $client->setContacts($data);
                $rs_log['contacts'] = $rs;
            }

        }

        $rs_log['log'] = $log;
        // return $rs_log;


        return redirect()->route('registros.edit', $user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return response()->json([
            'message' => 'Se ha eleminado con exito este registro'
            ]);    
    }
}
