@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

    <h3 id="saludos" class="m-0 text-dark">Hola, {{ Auth::user()->name }}</h3>
    <a href="{{ route('resumen') }}" class="btn-flotante">Resumen de admisión</a>
@stop

@section('content')
    <div class="row justify-content-md-center pb-5">





            <div class="col-md-8 col-12">

               
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="font-size: 1.3rem;font-weight: 600;">Diagnóstico EADIC</h4>
                            </div>
                            <div class="card-body">
        
                                {{-- <div data-tf-widget="vd3tKbWf" data-tf-iframe-props="title=Valoración de Aptitud | Master BIM Premium Edition" data-tf-medium="snippet" style="width:100%;height:800px;"></div> --}}
                              
                                <div data-tf-widget="lWvjRXAE" data-tf-iframe-props="title=Diagnóstico EADIC | Máster Online" data-tf-medium="snippet" style="width:100%;height:800px;"></div>


        
                            </div>
        

                            <div class="card-footer">
                              <a href="{{ route('diagnostico.update', Auth::user()) }}"> <button type="button" class="btn btn-success float-right">Continuar</button></a>  
                            </div>


                        </div>
        
        
                    </div>
               
        
        
              
        


            </div>

            <div class="col-md-3 col-12">

                <div class="">
                    <h5 class="mb-3"><b>¿Necesitas ayuda?</b> Contáctanos</h5>
                    <div class="row">

                        
                        <div class="col-12 mb-1">

                            <div  id="llamdasdiv" class="col-sm-12 col-md-6 text-left" style="max-width: 300px;display:none" >
                                <script id="c2c-button" src="//apps.netelip.com/clicktocall/api2/js/api2.js?btnid=3321&atk=066adab1f202431851e4ba3767324ba6" type="text/javascript"></script>
                              </div>
        
                            <div class="info-box" >
                                <span class="info-box-icon bg-info" style="padding: 12px;">
                                    <img src="{{ asset('img/Recurso-5.png') }}" alt="">
                                </span>
        
                                <div class="info-box-content">
                                    <span class="info-box-text">Te llamamos</span>
                                   
                                        <button id="llamameahora" type="button" class="btn btn-block bg-gradient-info btn-sm">Llámame
                                            ahora</button>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
        
        
        
                        <!-- /.col -->
                        <div class="col-12 mb-1">
                            <div class="info-box">
                                <span class="info-box-icon bg-info" style="padding: 12px;">
        
                                    <img src="{{ asset('img/Recurso-6.png') }}" alt="">
        
                                </span>
        
                                <div class="info-box-content">
                                    <span class="info-box-text">Escríbenos a WhatsApp</span>
        
                                    <a href="https://api.whatsapp.com/send?phone=34919994787&text=Buen%20d%C3%ADa%20equipo%20EADIC.%20Necesito%20asesor%C3%ADa%20con%20mi%20proceso%20de%20admisi%C3%B3n%20al%20M%C3%A1ster" target="_blank">
                                        <button type="button"
                                            class="btn btn-block bg-gradient-warning btn-sm">Iniciar chat</button></a>
        
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
             







    </div>


@stop

@section('css')
    
@stop

@section('js')
<script src="//embed.typeform.com/next/embed.js"></script>

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

 $( "#llamameahora" ).click(function() {

    

$( "#netelip_c2c_button0" ).css("display", "none");
$( "#llamdasdiv" ).css("display", "block");
$( "#netelip_form_c2c0" ).css("display", "block");
});
</script>

@stop
