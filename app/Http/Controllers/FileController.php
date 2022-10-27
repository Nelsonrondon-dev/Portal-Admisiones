<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\End;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\vtwsclib\Vtiger;
use App\Http\Requests\UpdateEnd;



class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.files.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateEnd $request)
    {
       

        $id = Auth::user()->id;
        $end = End::where('user_id', $id)->first();
        $url = '';
        $validated = $request->validated();

        if ($request->file) {
            
            $request->validate([
                "file" => "required|mimes:pdf|max:10000"
            ]);    
           
            $pdf =  $request->file('file')->storeAs(
                'public/pdf', 'CV_'.Auth::user()->name.'_'.Auth::user()->lastname.".pdf"
            );
            $url = "https://eadic.org/portal-admisiones/storage/app/".$pdf;
        }

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

            return $url;

        }

        else {
            $end =   $end->update([
                'user_id' => Auth::user()->id,
                'curriculum' => $url,
            ]);
            return $url;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return view('admin.files.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($file)
    {
        return view('admin.files.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file)
    {
        //
    }
}
