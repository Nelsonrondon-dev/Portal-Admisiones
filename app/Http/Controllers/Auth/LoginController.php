<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Laravel\Socialite\Facades\Socialite;

use App\User;
use App\ExamCode;
use App\Step;
use App\SocialProfile;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompleteFormulario;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver)
    {
        $drivers = ['facebook', 'google', 'linkedin'];

        if(in_array($driver, $drivers)){
            return Socialite::driver($driver)->redirect();
        }else{
            return redirect()->route('login')->with('info', $driver . ' no es una aplicación valida para poder loguearse');
        }
    
    }


    public function handleProviderCallback(Request $request, $driver)
    {
       
       // $user = Socialite::driver($driver)->user();
        if($request->get('error')){
            return redirect()->route('login');
        }

        $userSocialite = Socialite::driver($driver)->user();
        
        $social_profile = SocialProfile::where('social_id', $userSocialite->getId())->where('social_name', $driver)->first();


        if(!$social_profile){

            $user = User::where('email', $userSocialite->getEmail())->first();

            if(!$user){



                function getNombreSplit($full_name)
                {
                /* Convierto a mayascula */

                /* separar el nombre completo en espacios */
                $tokens = Str::of($full_name)->trim()->explode(' ');
                /* arreglo donde se guardan las "palabras" del nombre */
                $names = array();
                /* palabras de apellidos (y nombres) compuetos */
                $special_tokens = array('DA', 'DE', 'DEL', 'LA', 'LAS', 'LOS', 'MAC', 'MC', 'VAN', 'VON', 'Y', 'I', 'SAN', 'SANTA');

                $prev = "";
                foreach ($tokens as $token) {
                    $_token = $token;
                    if (in_array($_token, $special_tokens)) {
                        $prev .= "$token ";
                    } else {
                        $names[] = $prev . $token;
                        $prev = "";
                    }
                }
                $apellido_paterno = '';
                $apellido_materno = '';
                $primer_nombre = '';
                $segundo_nombre = '';
                $validar_name = true;

                $num_nombres = count($names);

                switch ($num_nombres) {
                    case 0:
                        break;
                    case 1:
                        $primer_nombre = $names[0];
                        break;
                    case 2:
                        $primer_nombre = $names[0];
                        $apellido_paterno = $names[1];
                        break;
                    case 3:
                        $primer_nombre = $names[0];
                        $apellido_paterno = $names[1];
                        $apellido_materno = $names[2];
                        break;
                    case 4:
                        $apellido_paterno = $names[2];
                        $apellido_materno = $names[3];
                        $primer_nombre = $names[0];
                        $segundo_nombre = $names[1];
                        $validar_name = false;
                        break;
                    default:
                        $apellido_paterno = "{$names[1]} {$names[2]}";
                        $apellido_materno = $names[3];
                        $primer_nombre = $names[0];

                        unset($names[0], $names[1], $names[2], $names[3]);
                        $segundo_nombre = implode(' ', $names);
                        break;
                }

                return  ['Paterno' => $apellido_paterno, 
                         'Materno' => $apellido_materno, 
                         'primer_nombre' => $primer_nombre,
                         'segundo_nombre' => $segundo_nombre, 
                         'validar_name' => $validar_name];
                }

                $nombres =  getNombreSplit($userSocialite->getName());
                $apellidos =  $nombres['Paterno']. ' ' . $nombres['Materno'];
            
                $user = User::create([
                    'name' =>  $nombres["primer_nombre"],
                    'lastname' => $apellidos,
                    'email'=> $userSocialite->getEmail(),
                ]);

                $ExamCode = ExamCode::create([
                    'user_id' => $user->id,
                    'code_id' => uniqid(),
                ]);

                $Step = Step::create([
                    'user_id' => $user->id,
                ]);


                Mail::to($user->email)
                ->send(new CompleteFormulario($ExamCode));

            }


            $social_profile = SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $userSocialite->getId(),
                'social_name' => $driver,
                'social_avatar'  => $userSocialite->getAvatar()
            ]);
        }

        auth()->login($social_profile->user);

        return redirect()->route('home');
    }

    

    
}
