<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\SocialProfile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.usuarios.index', ['users' => $users]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
       $roles =  Role::all();
        return view('admin.usuarios.create', ['roles' => $roles] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valdiamos el correo
        $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,']]);
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->phone = request('phone');
        
        $user->save();

        $social_profile = SocialProfile::create([
            'user_id' => $user->id,
            'social_id' => rand(21,  getrandmax()),
            'social_name' => 'default',
            'social_avatar'  => 'https://eadic.org/portal-admisiones/public/img/default.png'
        ]);


        if ($request->hasFile('file')) {
            $img = $request->file('file')->store('public/imagenes');
            $url = "https://eadic.org/portal-admisiones/storage/app/" . $img;
            $social_profile->social_avatar = $url;
            $social_profile->update();
        }

       //aignamos el rol enviado en el Request
        $user->roles()->attach(Role::where('id',  request('rol'))->first());


        return redirect('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.usuarios.show', ['user'=> User::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::findOrFail($id);
        $roles = Role::all();

        return view('admin.usuarios.edit', ['user'=>$user], ['roles'=> $roles ]);
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
       // Validadcion del Correo

       $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,'.$id]]);

       $user = User::findOrFail($id);
       $social_profile = SocialProfile::where('user_id', $user->id)->first();

       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;


       // Validacion de Imagen

       if ($request->hasFile('file')) {
        $img = $request->file('file')->store('public/imagenes');
        $url = "https://eadic.org/portal-admisiones/storage/app/" . $img;
        $social_profile->social_avatar = $url;
        $social_profile->update();
        }

       // Validadcion de Password

       $pass =  $request->get('password');
       if ($pass != null) {
           $user->password = bcrypt(request('password'));
       }
       else {
           unset($user->password);
       }
       // Validadcion si existe rol asignado


       $role = $user->roles;
       if (count($role) > 0) {
           $role_id = $role[0]->id;
           User::find($id)->roles()->updateExistingPivot($role_id, ['role_id'=> $request->get('rol')]);
       }
       else {
        $user->roles()->attach(Role::where('id',  request('rol'))->first());
       }

    
       $user->update();
      
       return redirect('usuarios');
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

        return redirect('usuarios');
    }
}
