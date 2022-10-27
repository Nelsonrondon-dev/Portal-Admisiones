@extends('adminlte::master')

@php($dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home'))

@if (config('adminlte.use_route_url', false))
    @php($dashboard_url = $dashboard_url ? route($dashboard_url) : '')
@else
    @php($dashboard_url = $dashboard_url ? url($dashboard_url) : '')
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'sidebar-') . '-mini' }}@stop




@section('body')

    <div class="row  pl-5 pr-5"
        style="background: linear-gradient(293.45deg, rgba(0, 61, 166, 0.8) -39.94%, rgba(0, 47, 62, 0.194489) 60.08%, rgba(0, 0, 0, 0) 100%), #2F3542;">
        <div class="container p-0">
            <nav class="navbar navbar-expand navbar-primary navbar-dark p-0" style="background: transparent">
                <!-- Left navbar links -->
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a href="{{ url('/home') }}" class="brand-link">
                            <img src="{{ asset('img/Eadic-Online-Blanco.png') }}" alt="AdminLTE Logo"
                                class="brand-image mb-2 mt-2 ml-0" style="max-height: 8vh;">
                        </a>
                    </li>


                </ul>



                <ul class="navbar-nav ml-auto" style="text-align: center;">



                    <li class="nav-item">

                        <a style="color: #fafcff;text-decoration: none;background-color: transparent; font-size: 1em;"
                            href="/portal-admisiones/public/register#login">Registrarse</a> / <a
                            style="color: #fafcff;text-decoration: none;background-color: transparent; font-size: 1em;"
                            href="/portal-admisiones/public/login#login">Login</a>

                    </li>


                </ul>

            </nav>





            @if (session('info'))
                <div class="container mt-5">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('info') }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


        </div>

    </div>


    <div class=" pb-5 ml-3 mr-3" style="background: url('{{ asset('img/Fondo-home.png') }}');  background-size: cover;">




        <div>

            <div class="container pt-3">

                <div class="row pt-2 ml-3 mr-3">
                    <h4
                        style="font-style: normal; font-weight: 800; font-size: 2em; line-height: 127.5%;text-align: center;">

                        Únete a un programa retador y apasionante para profesionales talentosos y ambiciosos,<span style="color: #01385e"> siguiendo
                            estos pasos:</span>
                    </h4>
                </div>

                <div class="row pt-0">

                    <div class="col-md-6 col-sm-12 mt-0 mb-5">



                        <div class="contanier mt-5">


                            <div class="row">
                                <div class="attachment-block clearfix"
                                    style="background-color: transparent;border: transparent;">
                                    <img class="attachment-img p-3" src="{{ asset('img/1.png') }}" alt="Attachment Image">

                                    <div class="attachment-pushed"
                                        style="background: #F1F2F6;border-radius: 17.4065px;margin-left: 90px;padding: 1.1em;">
                                        <h6 class="attachment-heading login-logo"
                                            style="font-size: 1.3em;text-align: left;font-weight: 500;color: #01385e;font-weight: bold;">
                                            Crea tu cuenta</a></h4>





                                            <div class="attachment-text">
                                                Comienza tu proceso de admisión al Máster dándote de alta en este Portal.

                                            </div>
                                            <!-- /.attachment-text -->
                                    </div>
                                    <!-- /.attachment-pushed -->
                                </div>

                            </div>




                            <div class="row">
                                <div class="attachment-block clearfix"
                                    style="background-color: transparent;border: transparent;">
                                    <img class="attachment-img p-3" src="{{ asset('img/2.png') }}" alt="Attachment Image">

                                    <div class="attachment-pushed"
                                        style="background: #F1F2F6;border-radius: 17.4065px;margin-left: 90px;padding: 1.1em;">
                                        <h6 class="attachment-heading login-logo"
                                            style="font-size: 1.3em;text-align: left;font-weight: 500;color: #01385e;font-weight: bold;">
                                            Completa tu diagnóstico EADIC

                                            </a></h4>

                                            <div class="attachment-text">
                                                Desarrollemos juntos un mapa de acción claro para apoyarte en tu crecimiento
                                                profesional.
                                            </div>
                                            <!-- /.attachment-text -->
                                    </div>
                                    <!-- /.attachment-pushed -->
                                </div>

                            </div>


                            <div class="row">
                                <div class="attachment-block clearfix"
                                    style="background-color: transparent;border: transparent;">
                                    <img class="attachment-img p-3" src="{{ asset('img/3.png') }}" alt="Attachment Image">

                                    <div class="attachment-pushed"
                                        style="background: #F1F2F6;border-radius: 17.4065px;margin-left: 90px;padding: 1.1em;">
                                        <h6 class="attachment-heading login-logo"
                                            style="font-size: 1.3em;text-align: left;font-weight: 500;color: #01385e;font-weight: bold;">
                                            Agenda tu asesoría personalizada</a></h4>



                                            <div class="attachment-text">
                                                Programa tu orientación personalizada junto a nuestro equipo de admisiones.
                                            </div>
                                            <!-- /.attachment-text -->
                                    </div>
                                    <!-- /.attachment-pushed -->
                                </div>

                            </div>


                            <div class="row">
                                <div class="attachment-block clearfix"
                                    style="background-color: transparent;border: transparent;">
                                    <img class="attachment-img p-3" src="{{ asset('img/4.png') }}" alt="Attachment Image">

                                    <div class="attachment-pushed"
                                        style="background: #F1F2F6;border-radius: 17.4065px;margin-left: 90px;padding: 1.1em;">
                                        <h6 class="attachment-heading login-logo"
                                            style="font-size: 1.3em;text-align: left;font-weight: 500;color: #01385e;font-weight: bold;">
                                            Finaliza tu admisión</a></h4>

                                            <div class="attachment-text">
                                                Completa la información académica y personal requerida para finalizar tu
                                                proceso de admisión.
                                            </div>
                                            <!-- /.attachment-text -->
                                    </div>
                                    <!-- /.attachment-pushed -->
                                </div>

                            </div>


                            {{-- <div class="row">
                                    <div class="attachment-block clearfix"
                                        style="background-color: transparent;border: transparent;">
                                        <img class="attachment-img p-3" src="{{ asset('img/5.png') }}" alt="Attachment Image">

                                        <div class="attachment-pushed" style="background: #F1F2F6;border-radius: 17.4065px;margin-left: 90px;padding: 1.1em;">
                                            <h6 class="attachment-heading login-logo"
                                                style="font-size: 1.3em;text-align: left;font-weight: 500;color: #01385e;font-weight: bold;">
                                                Formaliza tu matriculación</a></h4>

                                                <div class="attachment-text">
                                                    Envía tu comprobante de pago al equipo de admisiones y prepárate para desplegar un nuevo mundo profesional.
                                                </div>
                                                <!-- /.attachment-text -->
                                        </div>
                                        <!-- /.attachment-pushed -->
                                    </div>

                                </div> --}}

                        </div>
                    </div>

                    <div id="login" class="col-md-6 col-sm-12 login-page pt-0 mb-5"
                        style="background-color: transparent;margin-top: 0vh !important;">



                        <div class="{{ $auth_type ?? 'login' }}-box " style="margin-top: 0vh;">

                            {{-- Logo --}}
                            <div class="{{ $auth_type ?? 'login' }}-logo">
                                <a href="{{ $dashboard_url }}">
                                    <img src="{{ asset(config('adminlte.logo_img')) }}" height="50">
                                    {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                                </a>
                            </div>

                            {{-- Card Box --}}
                            <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

                                {{-- Card Header --}}
                                @hasSection('auth_header')
                                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                                        <h3 class="card-title float-none text-center">
                                            @yield('auth_header')
                                        </h3>
                                    </div>
                                @endif

                                {{-- Card Body --}}
                                <div
                                    class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                                    @yield('auth_body')
                                </div>

                                {{-- Card Footer --}}
                                @hasSection('auth_footer')
                                    <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                                        @yield('auth_footer')
                                    </div>
                                @endif

                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>


        <div class="container mb-5">


            <div class="row" style="margin-top: 2vw !important;">

                <div class="col-md-6 col-12">

                    <h2 class="mb-4"
                        style="color:black;  font-size: 2.3em;font-style: normal;font-weight: 800;line-height: 103.5%;">
                        Sé parte de la próxima generación de <span style="color: #01385e"> profesionales de éxito</span>

                    </h2>

                    

                    <p> Estamos buscando candidatos con habilidades analíticas y de resolución de problemas, con las capacidades de comunicación y trabajo en equipo,
                        para unirse a una formación exclusiva y dinámica junto a los futuros profesionales de éxito del sector.
                    </p>

                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('img/chica-new.png') }}" alt="" style="width: 90%;">

                </div>
            </div>









            {{-- <div class="row mt-5">
            <div class="col-md-2 col-sm-6">
                <div class="btn btn-block btn-flat btn-primary">
                    Premium Edition
                </div>
            </div>
            <div class="col-md-2 col-sm-6">

            </div>

        </div>
        <div class="row mt-2">
            <h2 style="font-weight: bold;font-size: 2.5em;">Master BIM Management in Design,</br> Construction & Operation
            </h2>

            <p style="">Únete a un programa retador y apasionante para profesionales talentosos y ambiciosos. Estamos
                buscando candidatos con habilidades analíticas y de resolución de problemas, con las capacidades de
                comunicación y trabajo en equipo, para unirse a una formación exclusiva y dinámica junto a los futuros BIM
                Champions del sector.</p>
        </div> --}}
        </div>







    </div>

    <footer class="main-footer"
        style="position: absolute;background: black;margin: 0;width: 100%;border-top: solid 1px black;padding: 60px;">


        <div class="row justify-content-md-center">

            <div class="col-md-3 col-12 mb-4">
                <h5 class="mb-3" style="color: white"><b>¿Necesitas ayuda?</b></h5>

                <a href="" class="mb-2" style="color: white;font-size: 0.9em;">Te llamamos</a><br>
                <a href="https://api.whatsapp.com/send?phone=34623482659&text=Buen%20d%C3%ADa%20equipo%20EADIC.%20Necesito%20asesor%C3%ADa%20con%20mi%20proceso%20de%20admisi%C3%B3n%20al%20M%C3%A1ster%20"
                    class="mb-2"style="color: white;font-size: 0.9em">Escríbenos a WhatsApp</a><br>
                <a href="https://eadic.com/faqs/" class="mb-2" style="color: white;font-size: 0.9em">Preguntas
                    Frecuentes</a><br>


            </div>

            <div class="col-md-3 col-12">

                <h5 class="mb-3" style="color: white"><b>Contacto</b></h5>




                <p class="mb-4" style="color: white;font-size: 0.9em">
                    <b>ESPAÑA</b><br>
                    Calle Medea 4, 28037<br>
                    Madrid - España<br>
                    Teléf.: +34 (91) 3930319 / +34 (91) 9994787<br>
                </p>

                <p class="mb-2" style="color: white;font-size: 0.9em">
                    <b>COLOMBIA</b> <br>
                    Calle 41 #20-09<br>
                    Bogotá - Colombia<br>
                    Teléf.: +57 (601) 3814942<br>
                </p>







            </div>

            <div class="col-md-3 col-12">


                <h5 class="mb-3" style="color: black"><b>.</b></h5>



                <p class="mb-4" style="color: white;font-size: 0.9em">
                    <b>PERÚ</b><br>
                    Av. Javier Prado Este 996, oficina 302<br>
                    San isidro. Lima - Perú<br>
                    Teléf.: +51 (1) 6429746<br>
                </p>

                <p class="mb-2" style="color: white;font-size: 0.9em">
                    <b>MÉXICO</b> <br>
                    Camino viejo a San Pedro Mártir #304, Ejidos de San Pedro Mártir, Tlalpan. CDMX<br>
                    Teléf: +52 (55) 85264818<br>
                </p>


            </div>

            <div class="col-md-3 col-12">

            </div>


        </div>


        <div class="row justify-content-md-center mt-5">

            <div class="col-md-6 col-12">

                <nav migration_allowed="1" migrated="0" role="navigation"
                    class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal e--pointer-text e--animation-none">
                    <ul style="list-style: none;left: 0;padding-left: 0;">
                        <b style="float: left;padding: 5px;font-size: 0.8em;color: white;"> ® EADIC 2022 </b>
                        <li style="float: left;padding: 5px;font-size: 0.8em;color: white;">
                            Todos los derechos reservados.
                        </li>
                        <li style="float: left;padding: 5px;font-size: 0.8em;color: white;"><a
                                href="https://eadic.com/aviso-legal/"
                                style="color: #fff;text-decoration: none;background-color: transparent;"> | Aviso legal</a>
                        </li>
                        <li style="float: left;padding: 5px;font-size: 0.8em;color: white;"><a
                                href="https://eadic.com/politica-de-calidad-y-medio-ambiente/"
                                style="color: #fff;text-decoration: none;background-color: transparent;"> | Política de
                                Calidad y Medio Ambiente</a></li>
                        <li style="float: left;padding: 5px;font-size: 0.8em;color: white;">
                            <a href="https://eadic.com/politica-de-privacidad/"
                                style="color: #fff;text-decoration: none;background-color: transparent;"> | Política de
                                Privacidad</a>
                        </li>
                        <li style="float: left;padding: 5px;font-size: 0.8em;color: white;"><a
                                href="https://eadic.com/politica-de-cookies/"
                                style="color: #fff;text-decoration: none;background-color: transparent;">Política
                                de Cookies</a></li>
                        <li style="float: left;padding: 5px;font-size: 0.8em;color: white;"><a
                                href="https://eadic.com/terminos-y-condiciones-de-venta-online/"
                                style="color: #fff;text-decoration: none;background-color: transparent;"> | Términos y
                                Condiciones de Venta Online</a></li>
                    </ul>
                </nav>

            </div>


            <div class="col-md-6 col-12">

                <p class="mb-2" style="color: white;">Miembro de</p>

                <div class="row">
                    <div class="col-2">
                        <img src="{{ asset('img/aeen.png') }}" alt="" style="width: 100%;">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('img/Euphe.png') }}" alt="" style="width: 100%;">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('img/ADOK-Calidad.png') }}" alt="" style="width: 100%;">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('img/ADOK-Medio-ambiente.png') }}" alt="" style="width: 100%;">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('img/Anced.png') }}" alt="" style="width: 100%;">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('img/Apel.png') }}" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>

        </div>

    </footer>

    {{-- <footer class="main-footer m-0 p-0 " style="background-color: #01385e;">

  <div style="background-color: #01385e;" class="container pt-2 pb-2 ">
    <div class="row">

  <div class="col-md-4 col-sm-12 p-0">
    <a href="{{url("/home")}}" class="brand-link p-0">
      <img src="{{ asset('img/Eadic-Online-Blanco.png') }}" alt="AdminLTE Logo" class="brand-image mb-2 mt-2 p-0 ml-0" style="max-height: 8vh;" >
    </a>
 


</div>



<div class="col-md-4 col-sm-12 mt-3">

  <p class="mb-2 mt-2 ml-0" style="color: white">
    Copyright 2022 |  All Right Reserved
  </p>
</div>

<div class="col-md-4 col-sm-12 mt-sm-4 pl-5">

        <div class="elementor-social-icons-wrapper" style="display: flex;flex-direction: row-reverse;">
          <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-250f496" href="https://es-la.facebook.com/EADICEscuelaTecnica/" target="_blank">
      <span class="elementor-screen-only">Facebook</span>
      <i class="fab fa-facebook"></i>				</a>
          <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-55dd604" href="https://twitter.com/eadic" target="_blank">
      <span class="elementor-screen-only">Twitter</span>
      <i class="fab fa-twitter"></i>				</a>
          <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-repeater-item-e4fa800" href="https://www.youtube.com/EadicTV" target="_blank">
      <span class="elementor-screen-only">Youtube</span>
      <i class="fab fa-youtube"></i>				</a>
          <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-ec0796f" href="https://www.instagram.com/eadicescuelatecnica/" target="_blank">
      <span class="elementor-screen-only">Instagram</span>
      <i class="fab fa-instagram"></i>				</a>
          <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-6ccf876" href="https://www.linkedin.com/school/eadic/" target="_blank">
      <span class="elementor-screen-only">Linkedin</span>
      <i class="fab fa-linkedin"></i>				</a>
          <a class="elementor-icon elementor-social-icon elementor-social-icon-envelope elementor-repeater-item-2c10653" href="mailto: factoria@eadic.es" target="_blank">
      <span class="elementor-screen-only">Envelope</span>
      <i class="fas fa-envelope"></i>				</a>
      </div>
      </div>

</div>
</div>


</footer> --}}







@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
