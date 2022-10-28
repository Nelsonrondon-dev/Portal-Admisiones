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
                                <h4 class="card-title" style="font-size: 1.3rem;font-weight: 600;">Asiste a tu Asesoría Personalizada</h4>
                            </div>
                            <div class="card-body">

                                <div class="callout callout-info">
                                    <h5>Recuerda!</h5>
                                    <p>Es importante asistas a tu asesoría personalizada el events->start_date, ya que esta sólo se podrá agendar una vez. El volumen de solicitudes nos impide reprogramarla.
                                    </p>

                                    <p>
                                        <b>¿Tienes algún inconveniente?</b><br>
                                        Si has tenido algún inconveniente con la fecha seleccionada, contacta a nuestro equipo de admisiones al correo: <a href="mailto:admisiones@eadic.es" target="_blank">admisiones@eadic.es</a>
                                    </p>
                                             
                                    </div>
                                     <br>                      
        
        
        
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('finaliza') }}"><button type="button" class="btn btn-primary float-right">Continuar</button></a>  
                            </div>
    
        
                        </div>
        
        
                    </div>
               
        
        
              
        


            </div>

            <div class="col-md-3 col-12">

                <div class="sticky-top">
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

<script>

    $( "#llamameahora" ).click(function() {

    $( "#netelip_c2c_button0" ).css("display", "none");
    $( "#llamdasdiv" ).css("display", "block");
    $( "#netelip_form_c2c0" ).css("display", "block");
    });
</script>


@stop
