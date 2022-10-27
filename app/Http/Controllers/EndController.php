<?php

namespace App\Http\Controllers;

use App\End;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Step;

use Illuminate\Support\Facades\Storage;
use App\vtwsclib\Vtiger;
use App\Http\Requests\UpdateEnd;

class EndController extends Controller
{

 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        $id = Auth::user()->id;
        $End = End::where('user_id', $id)->first();
        $Step = Step::where('user_id', $id)->first();


        if ($End) {
            return view('finaliza' , ['End' => $End, 'Steps' => $Step]);
        }

        else {
            return view('finaliza' , ['Step' => $Step]);

        }
 
    }
    public function update(UpdateEnd $request,$id)
    {
     
        $end = End::where('user_id', $id)->first();
        $url = '';
        $validated = $request->validated();

        if ($request->file) { 
            $request->validate([
                "file" => "required|mimes:pdf|max:10000"
            ]);
            // $pdf = $request->file('file')->store('public/pdf');
            $pdf =  $request->file('file')->storeAs(
                'public/pdf', 'CV_'.Auth::user()->name.'_'.Auth::user()->lastname.".pdf"
            );
            
            $url = "https://eadic.org/portal-admisiones/storage/app/".$pdf;
           // $end->curriculum = $url;
        }

        $client =  new Vtiger();
        $client->login();

        // Se crea el Arrray con los datos recibidos
        $data = [
          //  'email' => 'persona2601_esc2@eadic.es',
            'email' => Auth::user()->email,
            'firstname' => Auth::user()->name,
            'lastname' => Auth::user()->lastname,
        ];

            $log = array();
            $rs_log = array();
            $rs = '';
           // $exists_product = !empty($data['codigo_curso']);
            $exists_account = $client->setAccount($data, true);
            $exists_contact = $client->setContacts($data, true);
            $exists_subscriber = $client->setSubscriber($data, true);

            // se crea un lead si no exixte cuenta ni contacto

            if ( $exists_subscriber == false &&   $exists_account == false && $exists_contact == false) {
                $data['cf_1370'] = "Link CV: ".$url.PHP_EOL.'Nombre recomendacion 1:'.$request->name1.PHP_EOL.'Apellido recomendacion 1:'.$request->lastname1.PHP_EOL.'Numero recomendacion 1:'.$request->phone1.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 1:'.$request->alumno1.PHP_EOL.'Nombre recomendacion 2:'.$request->name2.PHP_EOL.'Apellido recomendacion 2:'.$request->lastname2.PHP_EOL.'Numero recomendacion 2:'.$request->phone2.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 2:'.$request->alumno2;

                $rs = $client->setSubscriber($data);
                $rs_log['subscriber'] = $rs;
                $log[] = 'No contacto, No cuenta, se crear lead';
            } else {
                if ( $exists_subscriber !== false) {
    
                    $data['cf_1370'] = "Link CV: ".$url.PHP_EOL.'Nombre recomendacion 1:'.$request->name1.PHP_EOL.'Apellido recomendacion 1:'.$request->lastname1.PHP_EOL.'Numero recomendacion 1:'.$request->phone1.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 1:'.$request->alumno1.PHP_EOL.'Nombre recomendacion 2:'.$request->name2.PHP_EOL.'Apellido recomendacion 2:'.$request->lastname2.PHP_EOL.'Numero recomendacion 2:'.$request->phone2.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 2:'.$request->alumno2;

                    $rs = $client->setSubscriber($data);
                    $rs_log['subscriber'] = $rs;
                    $log[] = 'No producto, No contacto, No cuenta, pero si Subsrcritor actualiza';
                    /**
                     *  no hay cuenta o contacto pero si existe el suscirptor se actualiza lead
                     */
                }
                else {
                $log[] = 'Ya existe contacto y cuaeta solo hay que actualizar';

                $data['cf_998'] = "Link CV: ".$url;

                $data['cf_972'] = 'Nombre recomendacion 1:'.$request->name1.PHP_EOL.'Apellido recomendacion 1:'.$request->lastname1.PHP_EOL.'Numero recomendacion 1:'.$request->phone1.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 1:'.$request->alumno1.PHP_EOL.'Nombre recomendacion 2:'.$request->name2.PHP_EOL.'Apellido recomendacion 2:'.$request->lastname2.PHP_EOL.'Numero recomendacion 2:'.$request->phone2.PHP_EOL.' ¿Es antiguo alumno de EADIC? recomendacion 2:'.$request->alumno2;

                $rs = $client->setAccount($data);
                $rs_log['account'] = $rs;
    
                $data['account_id'] = $rs['rs']['id'];
                $rs = $client->setContacts($data);
                $rs_log['contacts'] = $rs;
                }
        }

        $rs_log['log'] = $log;
        // return $rs_log;

        if (!$end) {
            $end = End::create([
                'user_id' => Auth::user()->id,
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

            $Step = Step::where('user_id',  Auth::user()->id)->first();
            $Step->step4 = "completado";
            $Step->update();

            return redirect()->route('formaliza');
        }


        else {

            $end =   $end->update([
                'user_id' => Auth::user()->id,
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

            $Step = Step::where('user_id',  Auth::user()->id)->first();
            $Step->step4 = "completado";
            $Step->update();

            return redirect()->route('formaliza');
        }
   
    }

    public function store(Request $request ,$id)
    {
        $booking = Booking::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }

}
