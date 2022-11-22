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
                        <h3 class="card-title">Agregar nueva oferta</h3>

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{ url('masters') }}" id="formulario-validado" role="form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">



                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nombre del Programa</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="name" class="form-control" value=""
                                                placeholder="Nombre" <div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>código</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="codigo" class="form-control" value=""
                                                placeholder="Código del programa">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Folletos</label>
                                <div class="input-group mb-3">

                                    <input name="folleto" type="tel" class="form-control" value=""
                                        placeholder="Url del folleto">

                                </div>
                            </div>




                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger float-right ml-2">Cancelar</button><button
                                type="submit" class="btn btn-success float-right">Agregar oferta</button>
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

    <script></script>


@stop
