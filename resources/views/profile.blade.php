@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    <h3 class="m-0 text-dark">Bienvendio {{Auth::user()->name }}</h3>
@stop

@section('content')

<div class="row justify-content-md-center">
  <div class="col-md-8">

    <div class="row">
<div class="col-6">  <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="{{Auth()->user()->adminlte_image()}}" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{Auth::user()->name }}</h3>

        <p class="text-muted text-center">Usuario</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Nombre</b> <a class="float-right">{{Auth()->user()->name}}</a>
          </li>
          <li class="list-group-item">
            <b>Apellido</b> <a class="float-right">{{Auth()->user()->lastname}}</a>
          </li>
          <li class="list-group-item">
            <b>Correo</b> <a class="float-right">{{Auth()->user()->email}}</a>
          </li>
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
      </div>
      <!-- /.card-body -->
    </div></div>
<div class="col-6">  <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">About Me</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong><i class="fas fa-book mr-1"></i> Education</strong>

        <p class="text-muted">
          B.S. in Computer Science from the University of Tennessee at Knoxville
        </p>

        <hr>

        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

        <p class="text-muted">Malibu, California</p>

        <hr>

        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

        <p class="text-muted">
          <span class="tag tag-danger">UI Design</span>
          <span class="tag tag-success">Coding</span>
          <span class="tag tag-info">Javascript</span>
          <span class="tag tag-warning">PHP</span>
          <span class="tag tag-primary">Node.js</span>
        </p>

        <hr>

        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card --></div>

    </div>
  
  
  </div>

</div>

@stop

@section('css')
 
@stop

@section('js')
  
@stop
