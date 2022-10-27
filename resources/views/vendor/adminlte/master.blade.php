<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <title>Portal Admisiones EADIC</title>
    <meta name="title" content="Portal Admisiones EADIC">
    <meta name="description" content="Nuevo, portal de Admisiones de EADIC">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://eadic.org/portal-admisiones/public/login">
    <meta property="og:title" content="Portal Admisiones EADIC">
    <meta property="og:description" content="Nuevo, portal de Admisiones de EADIC">
    <meta property="og:image" content="{{ asset('img/SEO-Portal_admisiones.webp') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://eadic.org/portal-admisiones/public/login">
    <meta property="twitter:title" content="Portal Admisiones EADIC">
    <meta property="twitter:description" content="Nuevo, portal de Admisiones de EADIC">
    <meta property="twitter:image" content="{{ asset('img/SEO-Portal_admisiones.webp') }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        Portal Admisiones
        {{-- @yield('title', config('adminlte.title', 'AdminLTE 3')) --}}
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')

    {{-- Base Stylesheets --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.min.css" />


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" /> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.css">
    
    
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3JYPQD48DF"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3JYPQD48DF');
        </script>

    
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&display=swap" rel="stylesheet">         
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.min.css" />

    @endif

    {{-- Livewire Styles --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/favicon.ico') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">

    @endif


</head>

<body class="@yield('classes_body') container-fluid" @yield('body_data') style="padding-left: 0px !important;">

    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.js" integrity="sha512-oqSECbLRRAy3Sq2tJ0RmzbqXHprFS+n7WapvpI1t0V7CtV4vghscIQ8MYoQo6tp4MrJmih4SlOaYuCkPRi3j6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!--Start of Zendesk Chat Script-->
        <script type="text/javascript">
            window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="https://v2.zopim.com/?1ho5KjZ2ZHxpgshFixlIlqGhV48zEyL6";z.t=+new Date;$.
            type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
            </script>  

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Livewire Script --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

    <style>
        .btn-primary {
	color: #fff;
	background-color: #01385e;
	border-color: #01385e;
	box-shadow: none;
}

.elementor-social-icons-wrapper {
	font-size: 0;
}

 .elementor-social-icon {
	background-color: rgba(122, 122, 122, 0) !important;
	font-size: 18px;
}

.elementor-shape-circle .elementor-icon.elementor-social-icon {
	-webkit-border-radius: 50%;
	border-radius: 50%;
}
.elementor-screen-only, .screen-reader-text, .screen-reader-text span, .ui-helper-hidden-accessible {
	position: absolute;
	top: -10000em;
	width: 1px;
	height: 1px;
	margin: -1px;
	padding: 0;
	overflow: hidden;
	clip: rect(0,0,0,0);
	border: 0;
}
.elementor-social-icon i {
	color: #fff;
}
.elementor-social-icon {
	background-color: #818a91;
	font-size: 22px;
	text-align: center;
	padding: .2em;
	margin-right: 5px;
	cursor: pointer;
}

.btn-primary:hover {
	color: #fff;
	background-color: #01385ed6;
	border-color: #01385e;
}

.attachment-block .attachment-text {
	color: black;
}

.card-info:not(.card-outline) > .card-header {
	background-color: #000;
}



.active .bs-stepper-circle {
	background-color: #01385ed6;
}

.bg-info, .bg-gradient-info {
	background-color: white !important;
}

.bg-warning, .bg-gradient-warning {
	background-color: #5086be !important;
}

.bg-gradient-info {
	background: #003DA6 !important;
	color: #fff;
}
.bg-gradient-warning {
	background: #003DA6 !important;
	color: #fff;
}


.bg-gradient-info.btn:hover {
	background: #035aa6d9 linear-gradient(180deg,#035aa6bb,#035aa6d9) repeat-x !important;
	border-color: #117a8b;
	color: #ececec;
}


.bg-gradient-warning.btn:hover {
	background: #5085bee0 linear-gradient(180deg,#5085beb3,#5085bee0) repeat-x !important;
	border-color: #117a8b;
	color: #ececec;
}



.btn-success {
	color: #fff;
	background-color: #434343;
	border-color: #434343;
	box-shadow: none;
}

.btn-success:hover {
	color: #fff;
	background-color: #312f2f;
	border-color: #312f2f;
}

body {
    font-family: 'Raleway', sans-serif !important;
}


.btn-outline-primary {
	color: #003DA6;
	border-color: #003DA6;
}

.btn-outline-primary:not(:disabled):not(.disabled).active, .btn-outline-primary:not(:disabled):not(.disabled):active, .show > .btn-outline-primary.dropdown-toggle {
	color: #fff;
	background-color: #003DA6;
	border-color: #003DA6;
}

.btn-outline-primary:hover {
	color: #fff;
	background-color: #003DA6;
	border-color: #003DA6;
}

body:not(.layout-fixed) .main-sidebar {
	background: radial-gradient(100% 20.18% at 100% 3.17%, rgba(0, 194, 255, 0.2) 1.04%, rgba(0, 47, 62, 0.0486221) 71.77%, rgba(0, 0, 0, 0) 100%) , #2F3542 !important;
}


.nav-sidebar > .nav-item  > .nav-link{
	background: transparent;
	color: #fff;
    border: 1px solid #54C8E8;
    border-radius: 6.4px;
}


.sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active, .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
	background: #003DA6;
border-radius: 6.4px;
border: 1px solid #003DA6;

	color: #fff;
}

.nav-sidebar .nav-item > .nav-link {
	color: white;
    font-size: 0.8em;

}
.nav-sidebar > .nav-item {
	margin-bottom: 10px;
}

.card-primary:not(.card-outline) > .card-header {
	background-color: #003da6;
}

.bg-gradient-warning.btn.active, .bg-gradient-warning.btn:active, .bg-gradient-warning.btn:not(:disabled):not(.disabled).active, .bg-gradient-warning.btn:not(:disabled):not(.disabled):active {
	background: #17a2b8 linear-gradient(180deg,#358e9c,#117a8b) repeat-x !important;
	border-color: #10707f;
	color: #fff;
}


.bg-gradient-info.btn.active, .bg-gradient-info.btn:active, .bg-gradient-info.btn:not(:disabled):not(.disabled).active, .bg-gradient-info.btn:not(:disabled):not(.disabled):active {
	background: #17a2b8 linear-gradient(180deg,#358e9c,#117a8b) repeat-x !important;
	border-color: #10707f;
	color: #fff;
}

.zopim {
    
}

.fa-fw.fa-check.fas {
    color: #06ff06 !important;
}


.btn-success:not(:disabled):not(.disabled).active, .btn-success:not(:disabled):not(.disabled):active, .show > .btn-success.dropdown-toggle {
	color: #fff;
	background-color: #003DA6 ;
	border-color: #003DA6;
}

.btn-success.focus, .btn-success:focus {
	color: #fff;
	background-color: #003DA6;
	border-color: #003DA6;
}

.btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show > .btn-primary.dropdown-toggle {
	color: #fff;
	background-color: #003DA6;
	border-color: #003DA6;
}

.btn-primary.focus, .btn-primary:focus {
	color: #fff;
	background-color: #003DA6;
	border-color: #003DA6;
}

#saludos {
    margin-left:  3rem !important
}

@media (max-width: 575.98px) { 

    #saludos {
        margin-left: .5rem !important
}

}

</style>    
</body>

</html>
