@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12 pb-3">

            <div class="card  mt-3">
                <div class="card-header">
                    <h3 class="card-title float-none mt-3" style="font-weight: bold">Usuarios Registrados <a href="usuarios/create"><button type="button"
                                class="btn btn-success float-right">Agregar Usuarios</button></a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">


                            <table id="table_user" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><span class="badge bg-danger">{{ $user->id }}</span></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    {{ $role->name }}
                                                @endforeach

                                            </td>
                                            <td class="project-actions text-right">
                                                <a href="{{ route('usuarios.show', $user->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                    Ver
                                                </a>
                                                <a href="{{ route('usuarios.edit', $user->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Editar
                                                </a>
                                                <form class="btn pl-0 " action="{{ route('usuarios.destroy', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" href="" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        Borrar
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>
    </div>
    <!-- /.row -->
@stop

@section('css')



@stop

@section('js')



    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-buttons/js/buttons.colVis.min.js') }}"></script>



    <script>
        $(function() {
            $("#table_user").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table_user_wrapper .col-md-6:eq(0)');


        });
    </script>


@stop
