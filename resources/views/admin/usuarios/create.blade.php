@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 pb-3 ">

                @if ($errors->any())

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atención!</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Registrar Usuario</h3>


                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{ url('usuarios') }}" id="formulario-validado" role="form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">



                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="name" class="form-control"
                                                value="" placeholder="Nombre" <div>
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="lastname" class="form-control"
                                            value="" placeholder="Apellido">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  

                        <div class="form-group">
                            <label>Telefono</label>
                            <div class="input-group mb-3">

                                <input id="telefono" name="phone" type="tel" class="form-control"
                                    value="" placeholder="Telefono">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email">Correo</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>

                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file">Foto</label>
                            <input type="file" name="file" class="form-control-file" id="file">
                        </div>



                        <div class="form-group">
                            <label for="file">Rol</label>
                            <select name="rol" class="form-control" id="" required>
                                <option selected disabled> Elige un rol para este usuario</option>

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach


                            </select>


                        </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="reset" class="btn btn-danger float-right ml-2">Cancelar</button><button type="submit"
                        class="btn btn-success float-right">Crear Usuario</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


@stop

@section('css')
    <style>
        /* Requerimientos Plugin paises  */
        .iti__flag {
            background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/img/flags.png");
        }

        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/img/flags@2x.png");
            }
        }

        .iti {
            width: 100%;
        }

        ;

        .custom-file-label::after {
            content: "Buscar" !important;
        }

        @media (max-width: 575.98px) {
            .bs-stepper-header {
                display: block;
            }

        }
    </style>
@stop

@section('js')

    <script>
        var input = document.querySelector('#telefono');

        window.intlTelInput(input, {
            initialCountry: '{{ Auth::user()->country }}',
            autoHideDialCode: true,
            separateDialCode: true,
            preferredCountries: ['mx', 'us', 'es'],
            hiddenInput: "full_phone",
            autoPlaceholder: '(000) 000 0000',
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js",
            geoIpLookup: function(callback) {
                fetch('https://ipinfo.io/json', {
                    cache: 'reload'
                }).then(response => {
                    if (response.ok) {
                        return response.json()
                    }
                    throw new Error('Failed: ' + response.status)
                }).then(ipjson => {
                    callback(ipjson.country);
                    pais();

                }).catch(e => {
                    callback('es')
                })
            }
        });

        var iti = window.intlTelInputGlobals.getInstance(input);
        iti.isValidNumber();
        var input2 = document.querySelector('#telefono2');

        window.intlTelInput(input2, {
            initialCountry: '{{ Auth::user()->country }}',
            autoHideDialCode: true,
            separateDialCode: true,
            preferredCountries: ['mx', 'us', 'es'],
            hiddenInput: "full_phone",
            autoPlaceholder: '(000) 000 0000',
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js",
            geoIpLookup: function(callback) {
                fetch('https://ipinfo.io/json', {
                    cache: 'reload'
                }).then(response => {
                    if (response.ok) {
                        return response.json()
                    }
                    throw new Error('Failed: ' + response.status)
                }).then(ipjson => {
                    callback(ipjson.country);
                    pais();

                }).catch(e => {
                    callback('es')
                })
            }
        });

        var iti = window.intlTelInputGlobals.getInstance(input2);
        iti.isValidNumber();
    </script>


@stop
