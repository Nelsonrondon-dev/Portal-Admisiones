@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)

@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.js"
        integrity="sha512-oqSECbLRRAy3Sq2tJ0RmzbqXHprFS+n7WapvpI1t0V7CtV4vghscIQ8MYoQo6tp4MrJmih4SlOaYuCkPRi3j6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>
    <a href="{{ route('resumen') }}" class="btn-flotante">Resumen de admisión</a>
@stop


@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}


    <h3 id="saludos" class="m-0 text-dark">Hola, {{ Auth::user()->name }}</h3>
@stop

@section('content')
    <div class="row justify-content-md-center">


        <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecione la hora para su cita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h6>El horario programado es el correspondiente a tu país</h6>

                        <small class="mb-2"> su zona horaria es <span style="font-weight: bold;" id="zona-horaria">
                            </span>
                        </small> <br><br>

                        <div class="row mb-2">

                            <div id="hora1" class="col-6">
                                <button id="12:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">12:00</button>

                            </div>
                            <div class="col-6">
                                <button id="12:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">12:30</button>

                            </div>

                        </div>



                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="13:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">13:00</button>

                            </div>
                            <div class="col-6">
                                <button id="13:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">13:30</button>

                            </div>

                        </div>


                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="14:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">14:00</button>

                            </div>
                            <div class="col-6">
                                <button id="14:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">14:30</button>

                            </div>

                        </div>


                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="15:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">15:00</button>

                            </div>
                            <div class="col-6">
                                <button id="15:30<" type="button"
                                    class="btn btn-block hora btn-outline-primary">15:30</button>

                            </div>

                        </div>


                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="16:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">16:00</button>

                            </div>
                            <div class="col-6">
                                <button id="16:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">16:30</button>

                            </div>

                        </div>



                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="17:00<" type="button"
                                    class="btn btn-block hora btn-outline-primary">17:00</button>

                            </div>
                            <div class="col-6">
                                <button id="17:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">17:30</button>

                            </div>

                        </div>



                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="18:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">18:00</button>

                            </div>
                            <div class="col-6">
                                <button id="18:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">18:30</button>

                            </div>

                        </div>



                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="19:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">19:00</button>

                            </div>
                            <div class="col-6">
                                <button id="19:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">19:30</button>

                            </div>

                        </div>



                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="20:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">20:00</button>

                            </div>
                            <div class="col-6">
                                <button id="20:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">20:30</button>

                            </div>

                        </div>



                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="21:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">21:00</button>

                            </div>
                            <div class="col-6">
                                <button id="21:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">21:30</button>

                            </div>

                        </div>




                        <div class="row mb-2">

                            <div class="col-6">
                                <button id="22:00" type="button"
                                    class="btn btn-block hora btn-outline-primary">22:00</button>

                            </div>
                            <div class="col-6">
                                <button id="22:30" type="button"
                                    class="btn btn-block hora btn-outline-primary">22:30</button>

                            </div>

                        </div>






                        <input type="hidden" class="form-control" id="title" value="Asesoría personalizada">
                        <input type="hidden" class="form-control" id="star">
                        <input type="hidden" class="form-control" id="end">
                        <input type="hidden" class="form-control" id="hora">
                        <input type="hidden" class="form-control" id="horaespana">



                        <span id="titleError" class="text-danger"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="saveBtn" class="btn btn-primary">Guardar Cita</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-md-center pb-5">

            <div class="col-md-8 col-12">

                <div class="col-12">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="font-size: 1.3rem;font-weight: 600;">Agenda tu asesoría
                                    personalizada</h4>
                            </div>
                            <div class="card-body">

                                <p>Prepárate para realizar nuestra entrevista personal online, con un responsable del equipo
                                    de
                                    admisiones.</p>


                                <h3 class="card-title" style="font-weight: 600;">
                                    <i class="fas fa-list"></i>
                                    {{-- <i class="fas fa-text-width"></i> --}}
                                    Pasos:
                                </h3>
                                <ol class="card-text">
                                    <li>Elige una de las fechas disponibles del siguiente calendario</li>
                                    <li>Selecciona la hora que deseas que te llamemos</li>
                                    <li> Guarda para programar tu cita</li>
                                </ol>

                                <p class="card-text">Es importante asistas a tu asesoría, ya que esta sólo se podrá agendar
                                    una vez.</p>

                                <p class="card-text">Ten en cuenta que en esta sesión haremos un recorrido por tu
                                    trayectoria académica y profesional,
                                    que nos permitirá analizar tu perfil y determinar si eres apto para el programa que te
                                    interesa.
                                </p>




                            </div>

                        </div>


                    </div>
                </div>


                <div class="col-12">


                    <div class="card card-primary">
                        <div class="card-body p-0">

                            <div id="calendar">

                            </div>

                            <div id="cita"></div>

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




    </div>


@stop

@section('css')
    <style>

    </style>
@stop

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.js"
        integrity="sha512-oqSECbLRRAy3Sq2tJ0RmzbqXHprFS+n7WapvpI1t0V7CtV4vghscIQ8MYoQo6tp4MrJmih4SlOaYuCkPRi3j6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/demo.js') }}"></script>

    <script>
        $(function() {



            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var start_datep = moment().format('YYYY-MM-DD');
            var end_datep = moment().add(7, 'days').calendar(null, {
                sameElse: 'YYYY-MM-DD'
            });


            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            var horas = $(".hora");
            var zonaHoraria = moment.tz.guess();
            document.querySelector("#zona-horaria").innerHTML = zonaHoraria;


            function ConvertToDateFromUnixTimestamp(fecha) {
                var date = new Date(fecha);
                var timestampInMs = date.getTime();
                var unixTimestamp = Math.floor(date.getTime() / 1000);
                return unixTimestamp;
            }


            function ConvertToUnixTimestampFronDate(unix_timestamp) {

                // Create a new JavaScript Date object based on the timestamp
                // multiplied by 1000 so that the argument is in milliseconds, not seconds.
                var date = new Date(unix_timestamp * 1000);
                // Hours part from the timestamp
                var hours = date.getHours();
                // Minutes part from the timestamp
                var minutes = "0" + date.getMinutes();
                // Seconds part from the timestamp
                var seconds = "0" + date.getSeconds();
                // Will display time in 10:30:23 format
                var formattedTime = hours + ':' + minutes.substr(-2);
                //  console.log(formattedTime);
                return formattedTime;
            }

            var hoy = moment().format('YYYY-MM-DD');
            var fecha = hoy + ' ' + horas[0].innerText;
            var time = ConvertToDateFromUnixTimestamp(fecha);


            $.ajax({
                url: "https://api.timezonedb.com/v2.1/convert-time-zone",
                method: "GET",
                dataType: "json",
                data: {
                    format: "json",
                    key: '2UGIAH1JYG3F',
                    by: "zone",
                    from: 'Europe/Madrid',
                    to: zonaHoraria,
                    time: time,
                }
            }).then(result => {
                    console.log(result);

                    horas[0].innerText = ConvertToUnixTimestampFronDate(result.toTimestamp);
                    
                    // console.log(horaactual);

                    for (let index = 1; index < horas.length; index++) {
                        var fecha = hoy + ' ' + horas[index - 1].innerText;
                        horasS = moment(fecha).add(30, 'minutes');
                        horas[index].innerText = horasS.format('HH:mm');
                    }

                }, error => {
                    console.log('Función de rechazo llamada: ');
                }

            );


            $(".hora").click(function() {
                $('#hora').val($(this)[0].innerText);
                $('#horaespana').val($(this)[0].id);
                $(".hora").removeClass("active");
                $(this).addClass("active");
            });


            var booking = @json($events);

            // console.log(booking[0]['start']);

            @if ($events)

                var targetDiv = document.getElementById('cita');


                var mensaje = `<div class="callout callout-info m-3">
            
                    <h5>Recuerda!</h5>
                        <p>Es importante asistas a tu asesoría personalizada el, ` + booking[0]['start'] +
                            `</p><p>
                            <b>¿Tienes algún inconveniente?</b><br>
                            Si has tenido algún inconveniente con la fecha seleccionada, contacta a nuestro equipo de admisiones al correo: <a href="mailto:admisiones@eadic.es" target="_blank">admisiones@eadic.es</a>
                        </p>
                    </div>`;

                targetDiv.innerHTML += mensaje;

            @endif ()

            var calendar = new Calendar(calendarEl, {
                timeZone: 'local',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                validRange: {
                    start: start_datep,
                    end: end_datep,
                },
                hiddenDays: [0, 6],
                themeSystem: 'bootstrap',
                events: booking,
                selectable: true,
                selectHelper: true,

                dateClick: function(info) {
                    $('#bookingModal').modal('toggle');
                    var start_date = moment(info.dateStr).format('YYYY-MM-DD');
                    var end_date = moment(info.dateStr).format('YYYY-MM-DD');
                    $('#star').val(start_date);
                    $('#end').val(end_date);
                    $('#saveBtn').click(function(info) {
                        var title = $('#title').val();
                        var start_date = $('#star').val();
                        var end_date = $('#end').val();
                        var start_date = start_date + ' ' + $('#hora').val();
                        var mensaje ='Estas seguro de agendar tu asesoría personalizada para el ' + start_date + '';
                        var end_date = moment(start_date).add(30, 'minutes');
                        var start_date = moment(start_date).format('YYYY-MM-DDTHH:mm');
                        var end_date = moment(end_date).format('YYYY-MM-DDTHH:mm');
                        var zonaHoraria = moment.tz.guess();
                        var start_date_espana = $('#star').val() + ' ' + $('#horaespana').val();
                        var start_date_espana = moment(start_date_espana).format('YYYY-MM-DDTHH:mm');
                        var id = {{ Auth()->user()->id }};

                        swal({
                                title: mensaje,
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
                                        url: "{{ route('cita.store') }}",
                                        type: "POST",
                                        dataType: 'json',
                                        // headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                                        data: {
                                            title,
                                            start_date,
                                            end_date,
                                            id,
                                            start_date_espana,
                                        },
                                        success: function(response) {

                                            console.log(response.repetido);

                                            if (response.repetido == false) {

                                                $('#bookingModal').modal(
                                                    'hide');

                                                calendar.addEvent({
                                                    'title': response
                                                        .title,
                                                    'start': response
                                                        .start,
                                                    'end': response.end,
                                                    'color': response
                                                        .color
                                                });

                                                var targetDiv = document
                                                    .getElementById('cita');


                                                var mensaje = `<div class="callout callout-info m-3">

                                                    <h5>Recuerda!</h5>
                                                        <p>Es importante asistas a tu asesoría personalizada el ,` +
                                                    response.start +
                                                    `</p> <p>
                                                               <b>¿Tienes algún inconveniente?</b><br>
                                                                  Si has tenido algún inconveniente con la fecha seleccionada, contacta a nuestro equipo de admisiones al correo: <a href="mailto:admisiones@eadic.es" target="_blank">admisiones@eadic.es</a>
                                                             </p>
                                                    </div>`;
                                                targetDiv.innerHTML += mensaje;

                                               

                                                swal("¡Genial! Hemos agendado tu Asesoría personalizada con éxito, te hemos enviado un correo 📧 con la información de tu cita, recueda es importante asistas a tu asesoría, ya que esta sólo se podrá agendar una vez.", {
                                                    icon: "success",
                                                });


                                                setTimeout( function() { window.location.href = "https://eadic.org/portal-admisiones/public/finaliza"; }, 5000 );

                                            } else {
                                                $('#bookingModal').modal('hide');


                                                swal({
                                                    title: 'Disculpa, solo puedes agendar una asesoría personalizada',
                                                    text: 'Si deseas reprogramar tu cita envíanos un correo 📧 a admisiones@eadic.es',
                                                    icon: "warning",

                                                });



                                            }



                                        },
                                        error: function(error) {
                                            if (error.responseJSON.errors) {
                                                $('#titleError').html(error
                                                    .responseJSON.errors
                                                    .title);
                                            }
                                        },
                                    });



                                } else {}
                            });
                    });



                },

                editable: true,


                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });


            calendar.formatRange(start_datep, end_datep, {
                month: 'long',
                year: 'numeric',
                day: 'numeric',
                separator: ' to ',
                isExclusive: true
            })


            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function(e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })


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

            $("#llamameahora").click(function() {

                $("#netelip_c2c_button0").css("display", "none");
                $("#llamdasdiv").css("display", "block");
                $("#netelip_form_c2c0").css("display", "block");
            });

        })
    </script>
@stop
