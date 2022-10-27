@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

    <h3 id="saludos" class="m-0 text-dark">Hola, {{ Auth::user()->name }}</h3>
@stop

@section('content')
    <div class="row justify-content-md-center pb-5">




        <div class="col-md-8 col-12">


            <div class="sticky-top mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="font-size: 1.3rem;font-weight: 600;">Finaliza tu admisión y completa los
                            datos de recomendacion profesional</h4>
                    </div>


                    <div class="row mt-5 ml-3 mr-3">
                        <div class="col-12">
                            <label for="exampleInputFile">Curriculum Vitae</label>


                            <form action="{{ route('admin.files.store') }}" method="POST" class="dropzone mt-2 mb-"
                                id="my-awesome-dropzone">

                            </form>


                            <ul>
                                <li>El nombre del archivo debe ser: CV_Nombre y apellidos del aspirante.
                                </li>
                                <li>Peso max. 2MB.</li>
                                <li>El CV debe estar en formato PDF.</li>
                                <li>No más de cuatro (4) hojas</li>
                            </ul>



                            <h6><b><a href="{{ asset('pdf/CV_Pedro_Perez.pdf') }}" target="_blank">Ver
                                        Ejemplo</a> </b></h6>

                        </div>
                    </div>
                    {{-- <div id="nuevo" class="row row-cols-1 row-cols-md-3 m-3 justify-content-md-center">

                     </div> --}}





                    <div class="card-footer bg-white">
                        <ul id="nuevo" class="mailbox-attachments d-flex align-items-stretch clearfix">

                            @if (isset($End))
                                
                            <li id='muestra-1'><span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                                <div class="mailbox-attachment-info">
                                <a href="{{$End->curriculum}}" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> cv_{{ Auth::user()->name}}.pdf</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1,245 KB</span>
                                <a href="{{$End->curriculum}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt" download></i></a>
                                </span>
                                </div>
                              
                                </li> 

                            @endif


                        </ul>
                    </div>





                    <div>


                        @php
                            
                            if (isset($End)) {
                                $id = $End->id;
                                $curriculum = $End->curriculum;
                                $name_1 = $End->name_1;
                                $lasname_1 = $End->lasname_1;
                                $phone_1 = $End->phone_1;
                                $alumno_eadic_1 = $End->alumno_eadic_1;
                            
                                $name_2 = $End->name_2;
                                $lasname_2 = $End->lasname_2;
                                $phone_2 = $End->phone_2;
                                $alumno_eadic_2 = $End->alumno_eadic_2;
                            } else {
                                $id = '';
                                $curriculum = '';
                            
                                $name_1 = '';
                                $lasname_1 = '';
                                $phone_1 = '';
                                $alumno_eadic_1 = '';
                            
                                $name_2 = '';
                                $lasname_2 = '';
                                $phone_2 = '';
                                $alumno_eadic_2 = '';
                            }
                            
                        @endphp



                        <form class="form-horizontal" action="{{ route('finalizas.updatefinaliza', Auth::user()) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="card-body">




                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            


                                <div class="row mt-4 tab-custom-content">
                                    <div class="col-12 mt-3">
                                        <label>Recomendación profesional <small class="danger">(opcional) </small> </label>
                                        <p>Indicanos dos personas que puedan recomendar tu perfil profesional:</p>

                                    </div>
                                </div>


                                <div class="row mt-3">

                                    <div class="col-md-6 col-12">

                                        <p style="text-align: center;font-weight: bold;">Recomendación 1 </p>

                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="name1" class="form-control"
                                                    value="{{ $name_1 }}" placeholder="Nombre ...">
                                                <div></div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="lastname1" class="form-control"
                                                    value="{{ $lasname_1 }}" placeholder="Apellido">
                                                <div></div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input id="telefono" name="phone1" type="tel" class="form-control"
                                                value="{{ $phone_1 }}" placeholder="Telefono">

                                        </div>


                                        <div class="form-group">
                                            <label>¿Es antiguo alumno de EADIC?</label>
                                            <select id="alumno1" name="alumno1" class="form-control"
                                                value="{{ $alumno_eadic_1 }}">

                                                @if ($alumno_eadic_1 == '')
                                                    <option value="" selected="" disabled="">Selecione una *
                                                    </option>
                                                @endif

                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>




                                    </div>

                                    <div class="col-md-6 col-12">

                                        <p style="text-align: center; font-weight: bold;">Recomendación 2 </p>


                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="name2" class="form-control"
                                                    value="{{ $name_2 }}" placeholder="Nombre ...">
                                                <div></div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="lastname2" class="form-control"
                                                    value="{{ $lasname_2 }}" placeholder="Apellido">
                                                <div></div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input id="telefono2" name="phone2" type="tel" class="form-control"
                                                value="{{ $phone_1 }}" placeholder="Telefono">

                                        </div>


                                        <div class="form-group">
                                            <label>¿Es antiguo alumno de EADIC?</label>
                                            <select id="alumno2" name="alumno2" class="form-control"
                                                value="{{ $alumno_eadic_2 }}">

                                                @if ($alumno_eadic_2 == '')
                                                    <option value="" selected="" disabled="">Selecione una *
                                                    </option>
                                                @endif

                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>



                                    </div>

                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Guardar y Continuar</button>
                            </div>


                        </form>







                    </div>

                </div>

            </div>

        </div>









            <div class="col-md-3 col-12">

                <div class="sticky-top">
                    <h5 class="mb-3"><b>¿Necesitas ayuda?</b> Contáctanos</h5>
                    <div class="row">


                        <div class="col-12 mb-1">

                            <div id="llamdasdiv" class="col-sm-12 col-md-6 text-left"
                                style="max-width: 300px;display:none">
                                <script id="c2c-button"
                                    src="//apps.netelip.com/clicktocall/api2/js/api2.js?btnid=3321&atk=066adab1f202431851e4ba3767324ba6"
                                    type="text/javascript"></script>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon bg-info" style="padding: 12px;">
                                    <img src="{{ asset('img/Recurso-5.png') }}" alt="">
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Te llamamos</span>

                                    <button id="llamameahora" type="button"
                                        class="btn btn-block bg-gradient-info btn-sm">Llámame
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

                                    <a href="https://api.whatsapp.com/send?phone=34919994787&text=Buen%20d%C3%ADa%20equipo%20EADIC.%20Necesito%20asesor%C3%ADa%20con%20mi%20proceso%20de%20admisi%C3%B3n%20al%20M%C3%A1ster"
                                        target="_blank">
                                        <button type="button" class="btn btn-block bg-gradient-warning btn-sm">Iniciar
                                            chat</button></a>

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

        <style>
            /* Requerimientos Plugin paises  */
            .iti__flag {
                background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/img/flags.png");
            }

            @media (-webkit-min-device-pixel-ratio: 2),
            (min-resolution: 192dpi) {
                .iti__flag {
                    background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/img/flags@2x.png");
                }
            }

            .iti {
                width: 100%;
            }

            ;

            .custom-file-label::after {
                content: "Buscar" !important;
            }

            @media (max-width: 575.98px) {
                .bs-stepper-header {
                    display: block;
                }

            }

            .dropzone {
            position: relative !important !important;
            z-index: 16 !important;
            width: 38rem !important;
            height: 14rem !important;
            margin: 1rem auto !important;
            padding: 0 0 1.6rem !important;
            color: #40444f !important;
            border: .2rem dashed #616778 !important;
            border-radius: 1.5rem !important;
            cursor: pointer !important;
            -webkit-transition: color 0.2s ease-out, border-color 0.2s ease-out !important;
            -moz-transition: color 0.2s ease-out, border-color 0.2s ease-out !important;
            -o-transition: color 0.2s ease-out, border-color 0.2s ease-out !important;
            -ms-transition: color 0.2s ease-out, border-color 0.2s ease-out !important;
            transition: color 0.2s ease-out, border-color 0.2s ease-out !important;
            }

        .dropzone .dz-message {
            text-align: center !important;
            margin: 6em 0 !important;
        }


        @media (max-width: 575.98px) {
            .dropzone {
                width: 16rem !important;
            }

        }

      

        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"
            integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA=="
            crossorigin="anonymous" />

    @stop

    @section('js')

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


            var input = document.querySelector('#telefono');

            window.intlTelInput(input, {
                initialCountry: '{{ Auth::user()->country }}',
                autoHideDialCode: true,
                separateDialCode: true,
                preferredCountries: ['mx', 'us', 'es'],
                hiddenInput: "full_phone",
                autoPlaceholder: '(000) 000 0000',
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js",
                geoIpLookup: function(callback) {
                    fetch('https://ipinfo.io/json', {
                        cache: 'reload'
                    }).then(response => {
                        if (response.ok) {
                            return response.json()
                        }
                        throw new Error('Failed: ' + response.status)
                    }).then(ipjson => {
                        callback(ipjson.country);
                        pais();

                    }).catch(e => {
                        callback('es')
                    })
                }
            });

            var iti = window.intlTelInputGlobals.getInstance(input);
            iti.isValidNumber();
            var input2 = document.querySelector('#telefono2');

            window.intlTelInput(input2, {
                initialCountry: '{{ Auth::user()->country }}',
                autoHideDialCode: true,
                separateDialCode: true,
                preferredCountries: ['mx', 'us', 'es'],
                hiddenInput: "full_phone",
                autoPlaceholder: '(000) 000 0000',
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js",
                geoIpLookup: function(callback) {
                    fetch('https://ipinfo.io/json', {
                        cache: 'reload'
                    }).then(response => {
                        if (response.ok) {
                            return response.json()
                        }
                        throw new Error('Failed: ' + response.status)
                    }).then(ipjson => {
                        callback(ipjson.country);
                        pais();

                    }).catch(e => {
                        callback('es')
                    })
                }
            });

            var iti = window.intlTelInputGlobals.getInstance(input2);
            iti.isValidNumber();

            $("#llamameahora").click(function() {

                $("#netelip_c2c_button0").css("display", "none");
                $("#llamdasdiv").css("display", "block");
                $("#netelip_form_c2c0").css("display", "block");
            });


            $("#alumno1").val("{{ $alumno_eadic_1 }}").trigger('change');
            $("#alumno2").val("{{ $alumno_eadic_2 }}").trigger('change');
            $("#exampleInputFile").val("{{ $curriculum }}").trigger('change');
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                paramName: "file",
                dictDefaultMessage: "Click aquí o  arrastre su  PDF hasta este recuadro",
                acceptedFiles: "application/pdf",
                maxFilesize: 15,
                maxFiles: 1,
                timeout: 180000,

                success: function(file, response) {
                    if (file.status = 'success') {
                        handleDropzoneFileUpload.handleSuccess(response);
                    } else {
                        handleDropzoneFileUpload.handleError(response);
                    }
                },
                error: function(file, response) {
                    console.log(file);
                    console.log(response);
                    var message = response;

                    
                    swal("¡Lo siento! ha ocurrido el siguiente error: "+message , {
                                                    icon: "warning",
                                                });
                    $(file.previewElement).find('.dz-error-message').text(message);
                    $(file.previewElement).removeClass('dz-complete');
                    $(file.previewElement).addClass('dz-error');
                }
            };
            var handleDropzoneFileUpload = {
                handleError: function(response) {
                    console.log(response);
                    alert('handleError');
                },
                handleSuccess: function(response) {

                    if ($('#muestra-1')[0]) {
                        $('#nuevo')[0].removeChild($('#muestra-1')[0]);
                    }

                    $('#nuevo').append(
                        `<li id='muestra-1'><span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                        <div class="mailbox-attachment-info">
                        <a href="` + response + `" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> cv_{{ Auth::user()->name}}.pdf</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                        <span>1,245 KB</span>
                        <a href="` + response + `" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt" download></i></a>
                        </span>
                        </div>
                        </div>
                        </li> `);


                        swal("¡Genial! Hemos recibido con éxito tu CV", {
                                                    icon: "success",
                                                });


                }
            }


           


        </script>

    @stop
