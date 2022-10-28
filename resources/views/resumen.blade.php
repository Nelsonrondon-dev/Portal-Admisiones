@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
<h3 id="saludos" class="m-0 text-dark">Hola, {{ Auth::user()->name }}</h3>
<a href="{{ route('resumen') }}" class="btn-flotante">Resumen de admisión</a>
@stop

@section('content')


    <div class="row justify-content-md-center pb-5">

        <div class="col-md-8 col-12">
            <p style=" color: #747D8C;"> </p>

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title text-center">Resumen de Admisión</h3>
                </div>


                <div class="card-body">

                    @isset($Steps)

                    <div id="stepper3" class="bs-stepper" bis_skin_checked="1">
                        <div class="bs-stepper-header" role="tablist" bis_skin_checked="1">


                            <div id="step1" class="step {{ (($Steps->step1 == 'completado') ? 'active' : "" )}}" data-target="#test-nlf-1" bis_skin_checked="1">
                                <button type="button" class="step-trigger" role="tab" id="stepper3trigger1"
                                    aria-controls="test-nlf-1" aria-selected="true">
                                    <span class="bs-stepper-circle">
                                        <span class="fas fa-check" aria-hidden="true"></span>
                                    </span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 01.2em;line-height: 0.8;font-style: initial;font-weight: 900;text-transform: uppercase;">Paso
                                        1</span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 0.8em;">Completa tus
                                        datos</span>


                                </button>
                            </div>


                            <div class="bs-stepper-line" bis_skin_checked="1"></div>


                            <div  id="step2" class="step {{ (($Steps->step2 == 'completado') ? 'active' : "" )}}" data-target="#test-nlf-2" bis_skin_checked="1">
                                <button type="button" class="step-trigger" role="tab" id="stepper3trigger2"
                                    aria-controls="test-nlf-2" aria-selected="false">
                                    <span class="bs-stepper-circle">
                                        <span class="fas fa-check" aria-hidden="true"></span>
                                    </span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 01.2em;line-height: 0.8;font-style: initial;font-weight: 900;text-transform: uppercase;">Paso
                                        2</span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 0.8em;">Completa tu diagnóstico
                                    </span>

                                </button>
                            </div>


                            <div class="bs-stepper-line" bis_skin_checked="1"></div>

                            <div id="step3" class="step {{ (($Steps->step3 == 'completado') ? 'active' : "" )}}" data-target="#test-nlf-3" bis_skin_checked="1">
                                <button type="button" class="step-trigger" role="tab" id="stepper3trigger3"
                                    aria-controls="test-nlf-3" aria-selected="false">
                                    <span class="bs-stepper-circle">
                                        <span class="fas fa-check" aria-hidden="true"></span>
                                    </span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 01.2em;line-height: 0.8;font-style: initial;font-weight: 900;text-transform: uppercase;">Paso
                                        3</span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 0.8em;">Agenda tu
                                        asesoría</span>

                                </button>
                            </div>

                            <div class="bs-stepper-line" bis_skin_checked="1"></div>

                            <div id="step4" class="step {{ (($Steps->step4 == 'completado') ? 'active' : "" )}}" data-target="#test-nlf-4" bis_skin_checked="1">
                                <button type="button" class="step-trigger" role="tab" id="stepper4trigger4"
                                    aria-controls="test-nlf-4" aria-selected="false">
                                    <span class="bs-stepper-circle">
                                        <span class="fas fa-check" aria-hidden="true"></span>
                                    </span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 01.2em;line-height: 0.8;font-style: initial;font-weight: 900;text-transform: uppercase;">Paso
                                        4</span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 0.8em;">Finaliza tu admisión
                                    </span>


                                </button>
                            </div>

                            <div class="bs-stepper-line" bis_skin_checked="1"></div>



                            <div id="step5" class="step {{ (($Steps->step5 == 'completado') ? 'active' : "" )}}" data-target="#test-nlf-5" bis_skin_checked="1">
                                <button type="button" class="step-trigger" role="tab" id="stepper5trigger5"
                                    aria-controls="test-nlf-5" aria-selected="false">
                                    <span class="bs-stepper-circle">
                                        <span class="fas fa-check" aria-hidden="true"></span>
                                    </span>


                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 01.2em;line-height: 0.8;font-style: initial;font-weight: 900;text-transform: uppercase;">Paso
                                        5</span>

                                    <span class="bs-stepper-label"
                                        style="display: block;margin: .25rem;font-size: 0.8em;">Formaliza tu
                                        matriculación </span>

                                </button>
                            </div>




                            


                        </div>
                    </div>


                 



                    <div class="row mt-5">
                        <div class="col-md-6">


                            <div class="card mb-2 bg-gradient-dark">
                                <img class="card-img-top" src="{{ asset('img/Banner-masters.png') }}" alt="Máster EADIC">
                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <h3 class="card-title text-primary text-white">
                                        @isset($nameMaster)  
                                         {{$nameMaster}}
                                         @endisset
                                </h3>
                                    
                                @isset(Auth::user()->master)  
                                   <a href="{{route('master', Auth::user()->master)}}"><button type="button" class="btn bg-gradient-warning btn-block">Más Información</button></a> 
                                @endisset

                                </div>
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="card card pl-3 pr-3">

                                <div class="overlay">
                                    <i class="fas fa-3x fa-sync-alt"></i>
                                    </div>

                                <div class="card-header">
                                    <h3 class="card-title">Resultados de tu diagnóstico</h3>
                                </div>
                                
                                <small class="p-2">Estamos procesando tus datos, pronto mostraremos tus resultados.</small>
                            
                                
                                    
                                   
                                    <table class="table table-sm">
                                    <thead>
                                    <tr>
                                    <th style="width: 10px">#</th>
                                    <th>DIMENSIÓN</th>
                                    <th>Tu PROGRESO</th>
                                    <th style="width: 40px">%</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <td>1.</td>
                                    <td>Desarrollo directivo
                                    </td>
                                    <td>
                                    <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                    </td>
                                    <td><span class="badge bg-danger">⌛%</span></td>
                                    </tr>
                                    <tr>
                                    <td>2.</td>
                                    <td>Especialización Técnica
                                    </td>
                                    <td>
                                    <div class="progress progress-xs">
                                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                                    </div>
                                    </td>
                                    <td><span class="badge bg-warning">⌛%</span></td>
                                    </tr>
                                    <tr>
                                    <td>3.</td>
                                    <td>Desarrollo internacional</td>
                                    <td>
                                    <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-primary" style="width: 30%"></div>
                                    </div>
                                    </td>
                                    <td><span class="badge bg-primary">⌛%</span></td>
                                    </tr>
                                    <tr>
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                    <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-success" style="width: 90%"></div>
                                    </div>
                                    </td>
                                    <td><span class="badge bg-success">⌛%</span></td>
                                    </tr>
                                    </tbody>
                                    </table>
                                  
                                    

                            </div>

                        </div>

                    </div>



                    @else




                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        Aun no has completado ninguno de los pasos de tu inscripción
                        </div>
        
        
                    @endisset


                </div>


            </div>
            <!-- /.card-header -->
         

        </div>




        <div class="col-md-3 col-12">

            <h5 class="mb-3"><b>¿Necesitas ayuda?</b> Contáctanos</h5>
            <div class="row">
                <div class="col-12 mb-1">

                    <div id="llamdasdiv" class="col-sm-12 col-md-6 text-left" style="max-width: 300px;display:none">
                        <script id="c2c-button"
                            src="//apps.netelip.com/clicktocall/api2/js/api2.js?btnid=3321&atk=066adab1f202431851e4ba3767324ba6"
                            type="text/javascript"></script>
                    </div>

                    <div class="info-box">
                        <span class="info-box-icon bg-info" style="padding: 12px;">
                            <img src="{{ asset('img/Recurso-5.png') }}" alt="">
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Te llamamos</span>

                            <button id="llamameahora" type="button"
                                class="btn btn-block bg-gradient-info btn-sm">Llámame
                                ahora</button>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->



                <!-- /.col -->
                <div class="col-12 mb-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-info" style="padding: 12px;">

                            <img src="{{ asset('img/Recurso-6.png') }}" alt="">

                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Escríbenos a WhatsApp</span>

                            <a href="https://api.whatsapp.com/send?phone=34919994787&text=Buen%20d%C3%ADa%20equipo%20EADIC.%20Necesito%20asesor%C3%ADa%20con%20mi%20proceso%20de%20admisi%C3%B3n%20al%20M%C3%A1ster"
                                target="_blank">
                                <button type="button" class="btn btn-block bg-gradient-warning btn-sm">Iniciar
                                    chat</button></a>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->





                <div class="col-12 mb-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-info" style="padding: 12px;">
                            <img src="{{ asset('img/Recurso-7.png') }}" alt="">
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Preguntas Frecuentes</span>
                            <a href="https://eadic.com/faqs/" target="_blank"><button type="button"
                                    class="btn btn-block bg-gradient-info btn-sm">Consultar FAQ</button>
                            </a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->


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

        .bs-stepper .step-trigger {
            display: -ms-inline-flexbox;
            display: inline-block;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 0px;
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.5;
            color: #6c757d;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: none;
            border-radius: .25rem;
            transition: background-color .15s ease-out, color .15s ease-out;
        }

        .bs-stepper .line,
        .bs-stepper-line {
            -ms-flex: 1 0 22px;
            flex: 1 0 1px;
            min-width: 0px;
            min-height: 1px;
            margin: auto;
            background-color: rgba(0, 0, 0, .12);
        }

        .bs-stepper-circle {
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-line-pack: center;
            align-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 5em;
            height: 5em;
            padding: .5em 0;
            margin: .25rem;
            line-height: 1em;
            color: #fff;
            background-color: #6c757d;
            border-radius: 2.5em;
        }


        .bs-stepper-circle span {
            font-size: 2em;
            margin: auto;
        }

        .bs-stepper .step-trigger:not(:disabled):not(.disabled) {
	cursor: none;
}

.active .bs-stepper-circle {
	background: #003da6;
}

.table {
	font-size: 0.8em !important;
}
    </style>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stepper = new Stepper(document.querySelector('.bs-stepper'))
        })


        window.stepper3 = new Stepper(document.querySelector('#stepper3'), {
            linear: false,
            animation: false
        })



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
