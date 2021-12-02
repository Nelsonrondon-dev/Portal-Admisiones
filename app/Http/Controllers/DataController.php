<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\vtwsclib\Vtiger;

use App\Http\Requests\UpdateData;
 
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
        $usuario->youtube = $request->youtube;

        // $request->validate([
        //     "file" => "required|mimes:pdf|max:10000"
        // ]);

        $validated = $request->validated();

        if ($request->file) {
            
            $request->validate([
                "file" => "required|mimes:pdf|max:10000"
            ]);
    
            $imagenes = $request->file('file')->store('public/imagenes');

            $url = Storage::url($imagenes);
            $usuario->url = $url;
        }

        $usuario->update();
        
        $client =  new Vtiger();
        $client->login();


        // Se crea el Arrray con los datos recibidos
        $data = [
            // 'email' => 'persona0610_esc2@eadic.es',
            'email' => $request->email,
            'firstname' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->full_phone,
            'country' => $request->country,
            'cf_1598' => $request->master,
            'codigo_curso' => $request->master,
            'youtube' => $request->youtube,
            'carta' => url($url) 
        ];
       
      
            $log = array();
            $rs_log = array();
            $rs = '';
            $exists_product = !empty($data['codigo_curso']);
            $exists_account = $client->setAccount($data, true);
            $exists_contact = $client->setContacts($data, true);
            $exists_subscriber = $client->setSubscriber($data, true);

            // se crea un lead si no exixte cuenta ni contacto

            if ( $exists_subscriber == false &&   $exists_account == false && $exists_contact == false) {
                $rs = $client->setSubscriber($data);
                $rs_log['subscriber'] = $rs;
                $log[] = 'No contacto, No cuenta, se crear lead';
            } else {
                if ( $exists_subscriber !== false) {
    
                    $rs = $client->setSubscriber($data);
                    $rs_log['subscriber'] = $rs;
                    $log[] = 'No producto, No contacto, No cuenta, pero si Subsrcritor actualiza';
                    /**
                     *  no hay cuenta o contacto pero si existe el suscirptor se actualiza lead
                     */
                }
                else {
                $log[] = 'Ya existe contacto y cuaeta solo hay que actualizar';
                $rs = $client->setAccount($data);
                $rs_log['account'] = $rs;
    
                $data['account_id'] = $rs['rs']['id'];
                $rs = $client->setContacts($data);
                $rs_log['contacts'] = $rs;
                }
                
        }

        $rs_log['log'] = $log;
        return $rs_log;


        // return redirect()->route('home');
        
        // view('home');

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
