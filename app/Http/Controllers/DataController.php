<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateData;
use App\SocialProfile;
use App\Step;
use App\User;
use App\RelacionUserMaster;
use App\Master;
use App\vtwsclib\Vtiger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateData $request, $id)
    {

        $usuario = User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->phone = $request->full_phone;
        $usuario->country = $request->countryid;
        $usuario->master = $request->master;


        // determinamos si existe una relacion asociada a este ususario
       $relacion =  RelacionUserMaster::where('user_id', $id)->first();

       // Buscamos el mastere asociado al codigo pasado  en el request 
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


        $usuario->update();

        $Step = Step::where('user_id', $id)->first();

        $Step->step1 = "completado";
        $Step->update();

        $client = new Vtiger();
        $client->login();

        // Se crea el Arrray con los datos recibidos
        $data = [
            //  'email' => 'persona2601_esc2@eadic.es',
            'email' => $usuario->email,
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

            $data['rating'] = 'MO_Nuevo usuario';
            $data['cf_1206'] = 'Portal-Admisiones-Nuevo';

            $data['cf_978'] = 'https://eadic.org/portal-admisiones/public/';

            $rs = $client->setSubscriber($data);
            $rs_log['subscriber'] = $rs;
            $log[] = 'No contacto, No cuenta, se crear lead';
        } else {
            if ($exists_subscriber !== false) {

                $data['rating'] = 'MO_Modifica admision';
                $data['cf_1652'] = 'Portal-Admisiones-Nuevo';

                $rs = $client->setSubscriber($data);
                $rs_log['subscriber'] = $rs;
                $log[] = 'No producto, No contacto, No cuenta, pero si Subsrcritor actualiza';
                /**
                 *  no hay cuenta o contacto pero si existe el suscirptor se actualiza lead
                 */
            } else {

                $data['cf_982'] = 'Portal-Admisiones-Nuevo';
                $data['cf_980'] = 'https://eadic.org/portal-admisiones/public/';

                $data['cf_972'] = 'MO_Modifica admision';

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


        return redirect()->route('diagnostico');


    }

    public function updatefoto(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $social_profile = SocialProfile::where('user_id', $usuario->id)->first();

        if ($request->file) {

            $img = $request->file('file')->store('public/imagenes');

            $url = "https://eadic.org/portal-admisiones/storage/app/" . $img;
            $social_profile->social_avatar = $url;
            $social_profile->update();
        }

        return redirect()->route('profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
