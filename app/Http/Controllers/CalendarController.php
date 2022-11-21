<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Step;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\vtwsclib\Vtiger;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompleteAsesoria;
use App\Mail\ReAgendarAsesoria;


class CalendarController extends Controller
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
       
        $events = array();
        $id = Auth::user()->id;
        $bookings = Booking::all();
        $Step = Step::where('user_id', $id)->first();
    
        foreach($bookings as $booking) {

            if ($booking->user_id== $id ) {  
           
            $color = null;
            if($booking->title == 'Test') {
                $color = '#924ACE';
            }
            if($booking->title == 'Test 1') {
                $color = '#68B01A';
            }

            $events[] = [
                'id'   => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color
            ];

        }
        }
        return view('cita', ['events' => $events , 'Steps'=> $Step]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $id = Auth::user()->id;
        $Users =  User::find($id);

        $Master = $Users->masters->first();

        if ( $Master == null ) {
            return response()->json([
                'error' => true,
            ]);
        }

        $bookingcount = Booking::where('user_id', $id)->count();

        if ($bookingcount == 0) {
          
            $booking = Booking::create([
                'user_id' => $request->id,
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_date_espana' => $request->start_date_espana,
                'zona_horaria' => $request->zonaHoraria,
            ]);
    
            $color = null;
    
            if($booking->title == 'Test') {
                $color = '#924ACE';
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
                    $data['cf_1670'] = $booking->start_date_espana;
    
                    $rs = $client->setSubscriber($data);
                    $rs_log['subscriber'] = $rs;
                    $log[] = 'No contacto, No cuenta, se crear lead';
                } else {
                    if ( $exists_subscriber !== false) {
                        $data['cf_1670'] = $booking->start_date_espana;
                        $rs = $client->setSubscriber($data);
                        $rs_log['subscriber'] = $rs;
                        $log[] = 'No producto, No contacto, No cuenta, pero si Subsrcritor actualiza';
                        /**
                         *  no hay cuenta o contacto pero si existe el suscirptor se actualiza lead
                         */
                    }
                    else {
                    $log[] = 'Ya existe contacto y cuaeta solo hay que actualizar';
                    $data['cf_1026'] = $booking->start_date_espana;
                    $rs = $client->setAccount($data);
                    $rs_log['account'] = $rs;
                    $data['account_id'] = $rs['rs']['id'];
                    $rs = $client->setContacts($data);
                    $rs_log['contacts'] = $rs;
                    }   
            }
    
            $rs_log['log'] = $log;
            // return $rs_log;
 

            $dataemail = [
                'booking' => $booking,
                'user' => Auth::user(),
                'master' => $Master,
            ];


            Mail::to(Auth::user()->email)->send(new CompleteAsesoria($dataemail));

            $Step = Step::where('user_id',  Auth::user()->id)->first();
            $Step->step3 = "completado";
            $Step->update();

    
            return response()->json([
                'id' => $booking->id,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'title' => $booking->title,
                'color' => $color ? $color: '',
                'repetido' => false,
                'error' => false,
                // 'completado' => true,
            ]);

        }
            else {
                return response()->json([
                    'repetido' => true,
                    'error' => false,
                ]);
            }
      
    }
    public function update(Request $request ,$id)
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
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }

    public function storeAdmin(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string'
        ]);


        $user =  User::find($id);

        $master = $user->masters->first();

        if ( $master == null ) {
            return response()->json([
                'error' => true,
            ]);
        }


        $booking = Booking::create([
            'user_id' => $request->id,
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_date_espana' => $request->start_date_espana,
            'zona_horaria' => $request->zonaHoraria,
        ]);


        $client =  new Vtiger();
        $client->login();


        // Se crea el Arrray con los datos recibidos
        $data = [
            'email' => $user->email,
            //'firstname' => $request->name,
            //'lastname' => $request->lastname,
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
                $data['cf_1670'] = $booking->start_date_espana;

                $rs = $client->setSubscriber($data);
                $rs_log['subscriber'] = $rs;
                $log[] = 'No contacto, No cuenta, se crear lead';
            } else {
                if ( $exists_subscriber !== false) {
                    $data['cf_1670'] = $booking->start_date_espana;
                    $rs = $client->setSubscriber($data);
                    $rs_log['subscriber'] = $rs;
                    $log[] = 'No producto, No contacto, No cuenta, pero si Subsrcritor actualiza';
                    /**
                     *  no hay cuenta o contacto pero si existe el suscirptor se actualiza lead
                     */
                }
                else {
                $log[] = 'Ya existe contacto y cuaeta solo hay que actualizar';
                $data['cf_1026'] = $booking->start_date_espana;
                $rs = $client->setAccount($data);
                $rs_log['account'] = $rs;
                $data['account_id'] = $rs['rs']['id'];
                $rs = $client->setContacts($data);
                $rs_log['contacts'] = $rs;
                }   
        }

        $rs_log['log'] = $log;
        


        $dataemail = [
            'booking' => $booking,
            'user' =>  $user,
            'master' => $master,
        ];


        Mail::to($user->email)->send(new ReAgendarAsesoria($dataemail));

    
        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'zona_horaria' =>$booking->zona_horaria,
            'title' => $booking->title,
            'repetido' => false,
            'error' => false,
        ]);




      
    }


}
