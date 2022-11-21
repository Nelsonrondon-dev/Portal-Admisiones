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
                    <h3 class="card-title float-none mt-3" style="font-weight: bold">Registros de Admisiones 
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">


                            <table id="table_user" class="table table-bordered" style="font-size: 0.7rem">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>País</th>
                                        <th>Máster</th>
                                        <th>Fecha Asesoría</th>
                                        <th>Curriculum</th>
                                        <th>Nombre recomendación 1</th>
                                        <th>Apellido recomendación 1</th>
                                        <th>Telefono recomendación 1</th>
                                        <th>Es antiguo Alumno EADIC 1</th>
                                        <th>Nombre recomendación 2</th>
                                        <th>Apellido recomendación 2</th>
                                        <th>Telefono recomendación 2</th>
                                        <th>Es antiguo Alumno EADIC 1</th>
                                        <th>Paso 1</th>
                                        <th>Paso 2</th>
                                        <th>Paso 3</th>
                                        <th>Paso 4</th>
                                        <th>Paso 5</th>
                                        <th>Opciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><span class="badge bg-danger">{{ $user->id }}</span></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->country }}</td>
                                            <td>{{ $user->master }}</td>

                                            <td>
                                                @foreach ($user->getbookings as $booking)
                                                    {{ $booking->start_date_espana }} - ESP
                                                    </br>
                                                    {{ $booking->start_date }} - User
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->curriculum }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->name1 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->lastname_1 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->phone_1 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->alumno_eadic_1 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->name2 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->lastname_2 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->phone_2 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getEnds as $End)
                                                    {{ $End->alumno_eadic_2 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getSteps as $Step)
                                                    {{ $Step->Step1 }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($user->getSteps as $Step)
                                                    {{ $Step->Step2 }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($user->getSteps as $Step)
                                                    {{ $Step->Step3 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getSteps as $Step)
                                                    {{ $Step->Step4 }}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($user->getSteps as $Step)
                                                    {{ $Step->Step5 }}
                                                @endforeach
                                            </td>





                                            <td class="project-actions text-right">
                                                {{-- <a href="{{ route('registro.show', $user->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i>

                                                </a> --}}
                                                <a href="{{ route('registros.edit', $user->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>

                                                </a>
                                                <form  class="delete btn pl-0 "
                                                    action="{{ route('registros.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" href="" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>

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
  

            $(".delete").on('submit', function(evt) {
                evt.preventDefault();
                var form = $(this)[0];
                var action = form.action;

                swal({
                        title: "Deseas eleminar este registro",
                        text: "",
                        icon: "warning",
                        buttons: ["No", {
                            text: "Si",
                            value: "true"
                        }],

                    })
                    .then((willDelete) => {

                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $(
                                        'meta[name="csrf-token"]').attr(
                                        'content')
                                }
                            });

                            $.ajax({
                                url: action,
                                type: "POST",
                                data: { 

                                },
                                dataType: 'json',
                                success: function(response) {
                                    swal(response.message, {
                                        icon: "success",
                                    });
                                    form.parentElement.parentElement.remove();
                                },
                                error: function(error) {
                                    swal('disculpe pero hubo un problema', {
                                        icon: "warning",
                                    });
                                },
                            });
                        };

                 });

            });


        $(function() {
            // Inicializar datatable
            $("#table_user").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "columnDefs": [{
                        "visible": false,
                        "targets": [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                    },

                ],
            }).buttons().container().appendTo('#table_user_wrapper .col-md-6:eq(0)');
        });
    </script>

@stop
