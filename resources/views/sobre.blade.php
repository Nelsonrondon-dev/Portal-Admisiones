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
                style="background-image: url({{ asset('img/banner-sobre-eadic.webp') }});  background-position: center;background-repeat: no-repeat; background-size: cover; height: 45vh;">

                <div class="container">
                    <div class="col-12" style="margin-top: 5rem !important;text-align: center;">

                        <h1 id="titulo-c">Conoce Más <span style="font-weight: bold;">EADIC</span> </h1>
                    </div>
                </div>



            </div>


            



            <div class="row" style="background: #F1F2F6">

                <div class="container mt-2">


                    <div class="row mt-5 mb-5">
                        <div class="col-12" style="text-align: center"> 

                            <h3 style="color: #2F3542; font-weight:300">El alumno, el centro de toda</h3>
                            <h2 style="font-size:2.5em;font-weight: 800;line-height: 0.9em;color: #003DA6;">NUESTRA
                                METODOLOGÍA</h2>

                        </div>
                    </div>


                    <div class="row" id="vimeo1">
                        <iframe src="https://player.vimeo.com/video/760147417?h=58c7e255ec&title=0&controls=1&autoplay=1" width="100%" height="500px"
                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

                    </div>

                    <div class="row m-5">
                        <div class="col-sm-3 col-12">
                            <a href="{{ asset('img/Foto-1.webp') }}" data-toggle="lightbox"
                                data-title="sobre EADIC" data-gallery="gallery">
                                <img src="{{ asset('img/Foto-1.webp') }}" class="img-fluid mb-2"
                                    alt="sobre EADIC">
                            </a>
                        </div>
                        <div class="col-sm-3 col-12">
                            <a href="{{ asset('img/Foto-2.webp') }}" data-toggle="lightbox"
                                data-title="sobre EADIC" data-gallery="gallery">
                                <img src="{{ asset('img/Foto-2.webp') }}" class="img-fluid mb-2"
                                alt="sobre EADIC">
                            </a>
                        </div>
                        <div class="col-sm-3 col-12">
                            <a href="{{ asset('img/Foto-3.webp')}}" data-toggle="lightbox"
                                data-title="sobre EADIC" data-gallery="gallery">
                                <img src="{{ asset('img/Foto-3.webp') }}" class="img-fluid mb-2"
                                alt="sobre EADIC">
                            </a>
                        </div>
                        <div class="col-sm-3 col-12">
                            <a href="{{ asset('img/Foto-4.webp') }}" data-toggle="lightbox"
                                data-title="sobre EADIC" data-gallery="gallery">
                                <img src="{{ asset('img/Foto-4.webp') }}" class="img-fluid mb-2"
                                alt="sobre EADIC">
                            </a>
                        </div>
                        
                    </div>


                   


                    

                </div>

            </div>


            <div class="row p-5" style="background: #003DA6">


                    <div class="col-md-2 col-12">
                        <img  id="play"  class="mt-5 ml-5"  src="{{ asset('img/play.webp') }}" alt="play" style="width: 5vw;">
                    </div>

                    <div class="col-md-8 col-12">

                        <h3 style="color: white; font-size:1.5em">Título pendiente</h3>
                        <h4 style="color: white; font-size:1em" >Eslogan pendiente</h4>

                        <img id="ondas" src="{{ asset('img/ondas.webp') }}" alt="ondas"  style="width: 45vw;">

                    </div>

                    <div class="col-md-2 col-12">
                        <img id="microfono" class="mt-5 mr-5" src="{{ asset('img/microfono.webp') }}" alt="microfono" style="width: 5vw;" >

                    </div>




            </div>







            <div class="row pb-5" id="col-videos">

                <div class="col-md-4 col-12" >
    
                    <div class="card p-4" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25); border-radius: 15px;">
                        
    
                        <div class="card-body text-center" style="color: black">
                           
                            <iframe class="mb-3" width="100%" height="auto" src="https://www.youtube.com/embed/MFHbj9xWfZs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
                         <h3  style="color: black; font-size: 1.3em;margin-bottom: 1em;">Conoce el programa definitivo para convertirte 
                            en un BIM Champion</h3>
                            <a href="https://www.youtube.com/watch?v=MFHbj9xWfZs" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-block btn-primary" style="background: linear-gradient(141.73deg, #54C8E8 20.22%, #0088C6 77.95%);
                            border-radius: 15px; border-color: transparent">Ver Video</button></a> 
                        </div>
    
                    </div>
    
                </div>
                <div class="col-md-4 col-12">
                    <div class="card p-4" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25); border-radius: 15px;">
                        
    
                        <div class="card-body text-center" style="color: black">
                           
                            <iframe class="mb-3" width="100%" height="auto" src="https://www.youtube.com/embed/sNn4FKLqKpA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h3  style="color: black; font-size: 1.3em;margin-bottom: 1em;">Metodología BIM, la innovación que marca el rumbo de la construcción</h3>

                                <a href="https://www.youtube.com/watch?v=sNn4FKLqKpA&t=88s" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-block btn-primary" style="background: linear-gradient(141.73deg, #54C8E8 20.22%, #0088C6 77.95%);
                                border-radius: 15px; border-color: transparent">Ver Video</button></a> 
    
                        </div>
    
                    </div>
    
                </div>
                <div class="col-md-4 col-12">
    
                    <div class="card p-4" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25); border-radius: 15px;">
                        
    
                        <div class="card-body text-center" style="color: black">
                           
                            <iframe class="mb-3" width="100%" height="auto" src="https://www.youtube.com/embed/JsZMJmu2u70" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
                            <h3  style="color: black; font-size: 1.3em;margin-bottom: 1em;">Conoce el programa definitivo para convertirte 
                                en un BIM Champion</h3>

                                <a href="https://www.youtube.com/watch?v=JsZMJmu2u70&t=67s" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-block btn-primary" style="background: linear-gradient(141.73deg, #54C8E8 20.22%, #0088C6 77.95%);
                                border-radius: 15px; border-color: transparent">Ver Video</button></a> 
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    





        </div>
    </div>











@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/ekko-lightbox/ekko-lightbox.css') }}">

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


        #microfono{
               width: 5vw;
            }

            #play {
                width: 45vw;
            }

            #ondas {
                width: 5vw;

            }

            .card {
                background: #F6F6F6 !important;
                border-radius: 35px !important;
            }


            #titulo-c{
               font-size:4em;
               font-weight: 300;
               line-height: 1em;
               color: white;
               margin-top: 2em;
            }


            #col-videos {
                margin: 3rem !important;
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

            #microfono{
                width: 20vw !important;
                margin: 15px 25vw !important;

            }

            #play {
                width: 20vw !important;
            margin: 15px 25vw !important;
            }

            #ondas {
                margin: 0px !important;
                width: 70vw !important;

            }

            #vimeo1 {
              
                margin-top: -20vh !important;
                margin-bottom: -10vh !important;
                margin-left: 2vw !important;
                margin-right: 2vw !important;
            }


            #titulo-c{
               font-size:3.5em;
               font-weight: 300;
               line-height: 1em;
               color: white;
               margin-top: 14vh;
            }

            #col-videos {
                margin: 1rem !important;
            }


        }
    </style>


@stop

@section('js')

<script src="{{ asset('vendor/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

<script>
    
    $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });    });


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
