<?php

namespace App\Http\Controllers;

use App\Step;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepController extends Controller
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

        $Step = Step::where('user_id', $id)->first();
        $Users =  User::find($id);
        $nameMaster = $Users->masters->first();

        // dd($nameMaster);

        if ($nameMaster != null) {
            $nameMaster =  $nameMaster->name;
        }
        else {
            $nameMaster = "Máster EADIC";
        }
       

        if ($Step) {

            return view('resumen' , [ 'Steps' => $Step , 'nameMaster'=> $nameMaster]  );

        }

        else {
            return view('resumen');

        }


    }
    public function store(Request $request)
    {
    

    }
}
