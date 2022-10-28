@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <h3 class="m-0 text-dark ml-5">Hola, {{ Auth::user()->name }}</h3> --}}
    <a href="{{ route('resumen') }}" class="btn-flotante">Resumen de admisión</a>
@stop

@section('content')

    <div class="row justify-content-md-center pb-5">

        <div class="col-12 p-0">

            <div class="row"
                style="background-image: url({{ asset('img/fondo-master.png') }});  background-position: center;background-repeat: no-repeat; background-size: cover; height: 45vh;">

                <div class="container">
                    <div class="col-12" style="margin-top: 5rem !important;">
                        <i style="font-size:1.5em;color: white;font-weight: lighter;">
                            PROGRAMA MÁSTER PAD
                        </i>
                        <h1 id="titulo">{{ $Master->name }}</h1>
                    </div>
                </div>



            </div>


            <div id="beneficios" class="row mt-4 pb-5">

                <div class="col-md-4 col-12">

                    <div class="card p-4" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25); border-radius: 15px;">


                        <div class="card-body text-center" style="color: black">

                            <img src="{{ asset('img/master-icono3.png') }}" alt="DIMENSIÓN" style="width: 70px;"> <br><br>

                            <i>DIMENSIÓN</i>
                            <p> <b>Especialización en Ingeniería</b> </p>

                            <p>
                                Complementa tus conocimientos teóricos con <b>casos 100% prácticos,</b> totalmente
                                aplicables en campo desde el primer momento.
                            </p><br><br>

                        </div>

                    </div>

                </div>
                <div class="col-md-4 col-12">
                    <div class="card p-4" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25); border-radius: 15px;">


                        <div class="card-body text-center" style="color: black">

                            <img src="{{ asset('img/master-icono2.png') }}" alt="DIMENSIÓN" style="width: 70px;"> <br><br>

                            <i>DIMENSIÓN</i>
                            <p> <b> Desarrollo Directivo</b> </p>

                            <p>
                                Tus aptitudes técnicas no serán suficiente sino desarrollas capacidades y aplicas <b>nuevas
                                    herramientas </b> de auto-conocimiento personal y dirección de equipos.
                            </p><br>

                        </div>

                    </div>

                </div>
                <div class="col-md-4 col-12">

                    <div class="card p-4" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25); border-radius: 15px;">


                        <div class="card-body text-center" style="color: black">

                            <img src="{{ asset('img/master-icono1.png') }}" alt="DIMENSIÓN" style="width: 70px;"> <br><br>

                            <i>DIMENSIÓN</i>
                            <p> <b>Desarrollo internacional</b> </p>

                            <p>
                                Durante los últimos años, <b>la competencia entre profesionales se ha globalizado aún
                                    más.</b> El auge del teletrabajo y otros instrumentos colaborativos como la Metodología
                                BIM condicionan un mercado sin fronteras.
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            <div class="row"
                style="background-image: url({{ asset('img/fondo-master-2.webp') }});  background-position: center;background-repeat: no-repeat; background-size: cover;">

                <div class="container mt-2">


                    <div class="row mt-5 pl-5 pr-5 pt-5 pb-0">
                        <div class="col-md-6 col-12">

                            <img class="testimonio_img" src="{{ asset('img/testimonio.webp') }}"
                                alt="Testimoneo Paola Ortiz" height="100%">
                        </div>


                        <div class="col-md-6 col-12">

                            <img class="testimonio_tex" src="{{ asset('img/testimoneo2.webp') }}"
                                alt="Testimoneo Paola Ortiz" height="100%">
                        </div>

                    </div>


                    <div class="row ml-5 mr-5 mt-0 p-5 mb-5"
                        style="background: linear-gradient(180deg, #FFFFFF 0%, #EAFAFF 100%);border-radius: 15px;">

                        <div class="col-md-3 col-12">

                            <h3>Duración</h3>
                            <p>12 Meses</p>


                        </div>

                        <div class="col-md-3 col-12">

                            <h3>Crédito ECTS</h3>
                            <p>60 ECTS</p>

                        </div>


                        <div class="col-md-5 col-12">

                            <h3>Apostilla de la haya</h3>
                            <p>El alumno podrá solicitar la Apostilla de La Haya, que es una certificación que avala la
                                autenticidad del documento, en este caso del título, y permitir su uso y validez en el
                                extranjero.</p>
                        </div>

                        <div class="col-md-1 col-12">
                            <img src="{{ asset('img/apostilla-haya-1.webp') }}" alt=""
                                style="width: 10vh;margin-top: 2em;">
                        </div>
                    </div>



                    <div class="row justify-content-center mt-5 mb-5">

                        <h3 class="m-4">Folleto de {{ $Master->name }}</h3>




                        <object data="{{ $Master->folleto . '#page=3&zoom=60' }}" type="application/pdf"
                            style="height: 80vh;width: 100%;">
                            <embed src="{{ $Master->folleto . '#page=3&zoom=60' }}" type="application/pdf" />
                        </object>


                     <a class="mt-2" href="{{$Master->folleto}}" download>
                        <button type="button" class="btn btn-block btn-primary" style="background: linear-gradient(141.73deg, #54C8E8 20.22%, #0088C6 77.95%); border-radius: 15px; border-color: transparent">Descargar Folleto <i class="fas fa-cloud-download-alt"></i></button>
                    </a>  

                    </div>



                </div>


            </div>


        </div>
    </div>




@stop

@section('css')
    <style>
        h3 {
            color: #003DA6;
            font-weight: bold;
        }

        .testimonio_img {
            margin-left: 8rem !important;
            width: 70%;
        }

        .testimonio_tex {
            width: 100%;
        }

        #beneficios {
            margin: 0 5%;
            margin-top: -10vh !important;
        }



        #titulo {
            font-size: 3em;
            font-weight: 600;
            line-height: 0.9em;
            color: white;
        }

        .content {
            padding: 0 !important;
        }

        @media (max-width: 575.98px) {

            #beneficios {
                margin: 0 5%;
                margin-top: 5vh !important;
            }


            .testimonio_img {
                margin-left: 3rem !important;
                width: 70%;
            }


            #titulo {
                font-size: 2em !important;

            }
        }
    </style>
@stop

@section('js')




    <script>
        @isset($Steps)

            var steps = document.querySelectorAll('.nav li a i[class~="fa-circle"]');

            var setp1 = {{ $Steps->step1 == 'completado' ? 'true' : 'false' }};
            var setp2 = {{ $Steps->step2 == 'completado' ? 'true' : 'false' }};
            var setp3 = {{ $Steps->step3 == 'completado' ? 'true' : 'false' }};
            var setp4 = {{ $Steps->step4 == 'completado' ? 'true' : 'false' }};
            var setp5 = {{ $Steps->step5 == 'completado' ? 'true' : 'false' }};


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


            if (setp4) {
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
