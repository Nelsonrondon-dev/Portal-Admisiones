@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'sidebar-') . '-mini' }}@stop




@section('body')


<div class="row">
    <div class="col-12 p-0">
        <nav class="navbar navbar-expand navbar-primary navbar-dark" style="background-color: #01385e;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a href="/" class="brand-link p-0">
                  <img src="https://www.eadic.info/wp-content/uploads/2021/08/Eadic-Online-Blanco.png" alt="AdminLTE Logo" class="brand-image mb-2 mt-2 ml-sm-5" style="max-height: 8vh;" >
                </a>
              </li>
             
            </ul>

            <!-- Right navbar links -->
            {{-- <ul class="navbar-nav ml-auto">
              <!-- Navbar Search -->
              <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" data-target="#navbar-search3" href="#" role="button">
                  <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block" id="navbar-search3">
                  <form class="form-inline">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Messages Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          Brad Diesel
                          <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can

                        </p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          John Pierce
                          <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          Nora Silvester
                          <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
              </li>
              <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                  <i class="fas fa-th-large"></i>
                </a>
              </li>
            </ul> --}}
          </nav>


          @if (session('info'))
          <div class="container mt-5">
              <div class="row">
                  <div class="col">
                      <div class="alert alert-danger" role="alert">
                          <strong>{{session('info')}}</strong>
                      </div>
                  </div>
              </div>
          </div>
          @endif


    </div>
    
</div>

<div class="container">
  <div class="row mt-5">
  <h1>Título</h1>
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga debitis beatae ipsum, odio ipsam est incidunt dolores sunt corporis quidem doloribus? Adipisci corrupti iusto facilis, ratione cupiditate qui nostrum laudantium.</p>
</div>
</div>

<div class="container">
  <div class="row ">

<div class="col-md-6 col-sm-12">
  <div class="contanier mt-5">
    <div class="row">
      <div class="attachment-block clearfix">
        <img class="attachment-img p-3" src="{{ asset('img/ico-users-2.png') }}" alt="Attachment Image">

        <div class="attachment-pushed">
          <h6 class="attachment-heading login-logo" style="font-size: 1.3em;text-align: left;font-weight: 500;"><a href="#">1. CREA TU CUENTA</a></h4>

          <div class="attachment-text">
            Description about the attachment can be placed here.
            Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
          </div>
          <!-- /.attachment-text -->
        </div>
        <!-- /.attachment-pushed -->
      </div>

    </div>
    <div class="row">
      <div class="attachment-block clearfix">
        <img class="attachment-img p-3" src="{{ asset('img/ico-register-2.png') }}" alt="Attachment Image">

        <div class="attachment-pushed">
          <h6 class="attachment-heading login-logo" style="font-size: 1.3em;text-align: left;font-weight: 500;"><a href="#">2. RELLENA EL FORMULARIO DE SOLICITUD</a></h4>

          <div class="attachment-text">
            Description about the attachment can be placed here.
            Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
          </div>
          <!-- /.attachment-text -->
        </div>
        <!-- /.attachment-pushed -->
      </div>
    </div>
    <div class="row">
      <div class="attachment-block clearfix">
        <img class="attachment-img p-3" src="{{ asset('img/ico-talk-2.png') }}" alt="Attachment Image">

        <div class="attachment-pushed">
          <h6 class="attachment-heading login-logo" style="font-size: 1.3em;text-align: left;font-weight: 500;"><a href="#">3. ENTREVISTA CON EL EQUIPO DE ADMISIONES</a></h4>

          <div class="attachment-text">
            Description about the attachment can be placed here.
            Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
          </div>
          <!-- /.attachment-text -->
        </div>
        <!-- /.attachment-pushed -->
      </div>
    </div>
  </div>
</div>

<div class="col-md-6 col-sm-12 login-page" style="background-color: white;">



  <div class="{{ $auth_type ?? 'login' }}-box " style="margin-top: -15vh;">

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
        <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
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




 
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
