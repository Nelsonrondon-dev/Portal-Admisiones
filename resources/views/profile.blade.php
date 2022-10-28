@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
<h3 id="saludos" class="m-0 text-dark">Hola, {{ Auth::user()->name }}</h3>
<a href="{{ route('resumen') }}" class="btn-flotante">Resumen de admisión</a>

@stop

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-6">

            <div class="row justify-content-md-center">
                <div class="col-md-8 col-sm-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                                @php
                                    try {
                                        $imegen = Auth()->user()->SocialProfiles;
                                        $img = $imegen[0]['social_avatar'];
                                    } catch (\Throwable $th) {
                                        $img = asset('img/default.png');
                                    }
                                @endphp
                                <img class="profile-user-img img-fluid img-circle" src="{{ $img }}"
                                    alt="{{ Auth::user()->name }}">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center">Usuario</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Nombre</b> <a class="float-right">{{ Auth()->user()->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Apellido</b> <a class="float-right">{{ Auth()->user()->lastname }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Correo</b> <a class="float-right">{{ Auth()->user()->email }}</a>
                                </li>
                            </ul>

                            <form class="form-horizontal" action="{{ route('profiles.updatefoto', Auth::user()) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row mb-4">
                                    <label for="">Cambiar Foto de perfil</label>
                                    <div class="col-9 mt-2">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file"
                                            accept="application/png" value="" style="opacity: inherit">
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-success  float-right">Guardar</button>
                                    </div>
                                </div>


                            </form>


                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-default btn-flat float-right  btn-block"><b>
                                    <i class="fa fa-fw fa-power-off"></i>Salir
                                </b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>


            </div>
          </div>
        </div>

        @stop

        @section('css')

        @stop

        @section('js')

            <script>

                    @isset($Steps)

                    var steps =  document.querySelectorAll('.nav li a i[class~="fa-circle"]');

                    var setp1 =   {{ (($Steps->step1 == 'completado') ? 'true' : 'false' )}};
                    var setp2 =   {{ (($Steps->step2 == 'completado') ? 'true' : 'false' )}};
                    var setp3 =   {{ (($Steps->step3 == 'completado') ? 'true' : 'false' )}};
                    var setp4 =   {{ (($Steps->step4 == 'completado') ? 'true' : 'false' )}};
                    var setp5 =   {{ (($Steps->step5 == 'completado') ? 'true' : 'false' )}};


                    if (setp1) {

                    steps[0].classList.remove("far")
                    steps[0].classList.remove("fa-circle");
                    steps[0].classList.add("fa-check");
                    steps[0].classList.add("fas");

                    }


                    if (setp2) {
                    steps[1].classList.remove("far")
                    steps[1].classList.remove("fa-circle");
                    steps[1].classList.add("fa-check");
                    steps[1].classList.add("fas");
                    }


                    if (setp3) {
                    steps[2].classList.remove("far")
                    steps[2].classList.remove("fa-circle");
                    steps[2].classList.add("fa-check");
                    steps[2].classList.add("fas");
                    }


                    if (setp4 ) {
                    steps[3].classList.remove("far")
                    steps[3].classList.remove("fa-circle");
                    steps[3].classList.add("fa-check");
                    steps[3].classList.add("fas");
                    }

                    if (setp5) {
                    steps[4].classList.remove("far")
                    steps[4].classList.remove("fa-circle");
                    steps[4].classList.add("fa-check");
                    steps[4].classList.add("fas");
                    }




                    @endisset


            </script>

        @stop
