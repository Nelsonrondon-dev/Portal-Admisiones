<?php

namespace App\Http\Controllers;

use App\Master;
use Illuminate\Support\Facades\Auth;
use App\Step;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMaster;



class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($codigo)
    {

        $id = Auth::user()->id;
        $Step = Step::where('user_id', $id)->first();

        $Master = Master::where('codigo', $codigo)->first();

        return view('master' , [ 'Master' => $Master, 'Steps' => $Step ] );

            
    }


    public function indexAdmin() {

        $masters = Master::all();

        return view('admin.masters.index' , [ 'masters' => $masters] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.masters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaster $request)
    { 
        Master::create([
            'name' => $request->name,
            'codigo' => $request->codigo,
            'folleto' => $request->folleto,
        ]);

        return redirect()->route('masters');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $masters = Master::where('id', $id)->first();
       
        return view('admin.masters.edit' , [ 'masters' => $masters] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMaster $request, $id)
    {


        $master = Master::findOrFail($id);


        $master->name = $request->name;
        $master->codigo = $request->codigo;
        $master->folleto = $request->folleto;
       
        $master->update();

        return redirect()->route('masters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $master = Master::findOrFail($id);
        $master->delete();

        return redirect()->route('masters');
    }
}
