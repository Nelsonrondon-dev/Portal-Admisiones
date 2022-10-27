<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $Steps = Step::where('user_id', $id)->first();


        return view('home', ['Steps'=> $Steps]);
    }

    public function profile()
    {

        $id = Auth::user()->id;
        $Steps = Step::where('user_id', $id)->first();

        return view('profile', ['Steps'=> $Steps]);
    }

    
    public function sobre()
    {

        $id = Auth::user()->id;
        $Steps = Step::where('user_id', $id)->first();

        return view('sobre', ['Steps'=> $Steps]);
    }



    public function formaliza()
    {
        $id = Auth::user()->id;
        $Steps = Step::where('user_id', $id)->first();

        return view('formaliza', ['Steps'=> $Steps]);
    }



}
