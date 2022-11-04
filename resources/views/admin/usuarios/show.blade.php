@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

    <h3 id="saludos" class="m-0 text-dark">Hola, {{ Auth::user()->name }}</h3>
    <a href="{{ route('resumen') }}" class="btn-flotante">Resumen de admisión</a>

@stop

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
   <div class="col-lg-6 ">

                
          
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">

                    @php
                        try {
                            $imegen = $user->SocialProfiles;
                            $img = $imegen[0]['social_avatar'];
                        } catch (\Throwable $th) {
                            $img = asset('img/default.png');
                        }
                    @endphp
                    <img class="profile-user-img img-fluid img-circle" src="{{ $img }}"
                        alt="{{ $user->name }}">
                </div>
  
                  <h3 class="profile-username text-center"> {{ $user->name }}</h3>
               
                  <p class="text-muted text-center"></p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Correo</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Telefono</b> <a class="float-right">{{ $user->telefono }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Rol de Usuario</b> <a class="float-right">{{ $user->roles[0]->name}}</a>
                    </li>
                  </ul>
  
                </div>
                <!-- /.card-body -->
              </div>

        </div> 


   </div>  
 </div>
        <!-- /.row -->
  @stop

  @section('css')
            
  @stop
        
  @section('js')
        
  <script>
        
           
   </script>
        
        
   @stop
        
