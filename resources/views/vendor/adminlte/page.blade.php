@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if ($layoutHelper->isLayoutTopnavEnabled())
    @php($def_container_class = 'container')
@else
    @php($def_container_class = 'container-fluid')
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('vendor/adminlte/dist/img/eadic-isotipo.png') }}" alt="EADIC"
                height="60" width="60">
        </div>


        {{-- Top Navbar --}}
        @if ($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if (!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            @hasSection('content_header')
                <div class="content-header">
                    <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                        @yield('content_header')
                    </div>
                </div>
            @endif

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
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
                    Teléf.:   +51 (1) 6429746<br>
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

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if (config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
