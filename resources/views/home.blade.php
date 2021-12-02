@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    <h3 class="m-0 text-dark">Bienvendio {{Auth::user()->name }}</h3>
@stop

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8 col-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title text-center">EADIC Pre-Admisión Oficial</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start           onsubmit="return false"
                  -->
          <form  class="form-horizontal" action="{{route('datas.update', Auth::user()) }}"  method="POST" enctype="multipart/form-data">
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



            <div id="stepper3" class="bs-stepper" bis_skin_checked="1">
              <div class="bs-stepper-header" role="tablist" bis_skin_checked="1">


                <div class="step active" data-target="#test-nlf-1" bis_skin_checked="1">
                  <button type="button" class="step-trigger" role="tab" id="stepper3trigger1" aria-controls="test-nlf-1" aria-selected="true">
                    <span class="bs-stepper-circle">
                      <span class="fas fa-user" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Datos Personales</span>
                  </button>
                </div>


                <div class="bs-stepper-line" bis_skin_checked="1"></div>


                <div class="step" data-target="#test-nlf-2" bis_skin_checked="1">
                  <button type="button" class="step-trigger" role="tab" id="stepper3trigger2" aria-controls="test-nlf-2" aria-selected="false">
                    <span class="bs-stepper-circle">
                      <i class="fab fa-youtube"></i>                    </span>
                    <span class="bs-stepper-label">Video de Youtube</span>
                  </button>
                </div>



                <div class="bs-stepper-line" bis_skin_checked="1"></div>

                <div class="step" data-target="#test-nlf-3" bis_skin_checked="1">
                  <button type="button" class="step-trigger" role="tab" id="stepper3trigger3" aria-controls="test-nlf-3" aria-selected="false">
                    <span class="bs-stepper-circle">
                      <i class="fas fa-envelope-open-text"></i>                    </span>
                    <span class="bs-stepper-label">Carta de Recomendación</span>
                  </button>
                </div>

                {{-- <div class="bs-stepper-line" bis_skin_checked="1"></div> --}}


                {{-- <div class="step" data-target="#test-nlf-4" bis_skin_checked="1">
                  <button type="button" class="step-trigger" role="tab" id="stepper3trigger4" aria-controls="test-nlf-4" aria-selected="false">
                    <span class="bs-stepper-circle">
                      <i class="far fa-file-alt"></i>                    </span>
                    <span class="bs-stepper-label">Examen</span>
                  </button>
                </div> --}}


                {{-- <div class="bs-stepper-line" bis_skin_checked="1"></div> --}}


                {{-- <div class="step" data-target="#test-nlf-5" bis_skin_checked="1">
                  <button type="button" class="step-trigger" role="tab" id="stepper3trigger5" aria-controls="test-nlf-5" aria-selected="false">
                    <span class="bs-stepper-circle">
                      <span class="fas fa-save" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Admmisión Final</span>
                  </button>
                </div> --}}






              </div>
              <div class="bs-stepper-content" bis_skin_checked="1">


                {{-- <form onsubmit="return false"> --}}

                  <div id="test-nlf-1" role="tabpanel" class="bs-stepper-pane fade dstepper-block active" aria-labelledby="stepper3trigger1" bis_skin_checked="1">
                 



                    <div>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nombre</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" value="{{Auth::user()->name }}" placeholder="Nombre ..." >
                                <div></div></div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Apellido</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="lastname" class="form-control"  value="{{Auth::user()->lastname }}" placeholder="Apellido" >
                              <div></div></div>
                          </div>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Correo</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" value="{{Auth::user()->email }}" placeholder="Email" disabled="" >
                              <div></div></div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Telefono</label>
                            <input id="telefono" name="phone" type="tel" class="form-control" value="{{Auth::user()->phone }}" placeholder="Telefono"  >
        
                          </div>
                        </div>
                      </div>
                      
        
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- select -->
                          <div class="form-group">
                            <label>País de residencia</label>
                            
                            <input type="hidden" name="country" id="pais-nombre" value="{{Auth::user()->country }}">
                            <select id="pais" name="countryid"  class="js-example-basic-multiple form-control select2 "  value="{{Auth::user()->country }}" >
                              <option value="AF">Afganistán</option>
                              <option value="AL">Albania</option>
                              <option value="DE">Alemania</option>
                              <option value="AD">Andorra</option>
                              <option value="AO">Angola</option>
                              <option value="AI">Anguilla</option>
                              <option value="AQ">Antártida</option>
                              <option value="AG">Antigua y Barbuda</option>
                              <option value="AN">Antillas Holandesas</option>
                              <option value="SA">Arabia Saudí</option>
                              <option value="DZ">Argelia</option>
                              <option value="AR">Argentina</option>
                              <option value="AM">Armenia</option>
                              <option value="AW">Aruba</option>
                              <option value="AU">Australia</option>
                              <option value="AT">Austria</option>
                              <option value="AZ">Azerbaiyán</option>
                              <option value="BS">Bahamas</option>
                              <option value="BH">Bahrein</option>
                              <option value="BD">Bangladesh</option>
                              <option value="BB">Barbados</option>
                              <option value="BE">Bélgica</option>
                              <option value="BZ">Belice</option>
                              <option value="BJ">Benin</option>
                              <option value="BM">Bermudas</option>
                              <option value="BY">Bielorrusia</option>
                              <option value="MM">Birmania</option>
                              <option value="BO">Bolivia</option>
                              <option value="BA">Bosnia y Herzegovina</option>
                              <option value="BW">Botswana</option>
                              <option value="BR">Brasil</option>
                              <option value="BN">Brunei</option>
                              <option value="BG">Bulgaria</option>
                              <option value="BF">Burkina Faso</option>
                              <option value="BI">Burundi</option>
                              <option value="BT">Bután</option>
                              <option value="CV">Cabo Verde</option>
                              <option value="KH">Camboya</option>
                              <option value="CM">Camerún</option>
                              <option value="CA">Canadá</option>
                              <option value="TD">Chad</option>
                              <option value="CL">Chile</option>
                              <option value="CN">China</option>
                              <option value="CY">Chipre</option>
                              <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                              <option value="CO">Colombia</option>
                              <option value="KM">Comores</option>
                              <option value="CG">Congo</option>
                              <option value="CD">Congo, República Democrática del</option>
                              <option value="KR">Corea</option>
                              <option value="KP">Corea del Norte</option>
                              <option value="CI">Costa de Marfíl</option>
                              <option value="CR">Costa Rica</option>
                              <option value="HR">Croacia (Hrvatska)</option>
                              <option value="CU">Cuba</option>
                              <option value="DK">Dinamarca</option>
                              <option value="DJ">Djibouti</option>
                              <option value="DM">Dominica</option>
                              <option value="EC">Ecuador</option>
                              <option value="EG">Egipto</option>
                              <option value="SV">El Salvador</option>
                              <option value="AE">Emiratos Árabes Unidos</option>
                              <option value="ER">Eritrea</option>
                              <option value="SI">Eslovenia</option>
                              <option value="ES" >España</option>
                              <option value="US">Estados Unidos</option>
                              <option value="EE">Estonia</option>
                              <option value="ET">Etiopía</option>
                              <option value="FJ">Fiji</option>
                              <option value="PH">Filipinas</option>
                              <option value="FI">Finlandia</option>
                              <option value="FR">Francia</option>
                              <option value="GA">Gabón</option>
                              <option value="GM">Gambia</option>
                              <option value="GE">Georgia</option>
                              <option value="GH">Ghana</option>
                              <option value="GI">Gibraltar</option>
                              <option value="GD">Granada</option>
                              <option value="GR">Grecia</option>
                              <option value="GL">Groenlandia</option>
                              <option value="GP">Guadalupe</option>
                              <option value="GU">Guam</option>
                              <option value="GT">Guatemala</option>
                              <option value="GY">Guayana</option>
                              <option value="GF">Guayana Francesa</option>
                              <option value="GN">Guinea</option>
                              <option value="GQ">Guinea Ecuatorial</option>
                              <option value="GW">Guinea-Bissau</option>
                              <option value="HT">Haití</option>
                              <option value="HN">Honduras</option>
                              <option value="HU">Hungría</option>
                              <option value="IN">India</option>
                              <option value="ID">Indonesia</option>
                              <option value="IQ">Irak</option>
                              <option value="IR">Irán</option>
                              <option value="IE">Irlanda</option>
                              <option value="BV">Isla Bouvet</option>
                              <option value="CX">Isla de Christmas</option>
                              <option value="IS">Islandia</option>
                              <option value="KY">Islas Caimán</option>
                              <option value="CK">Islas Cook</option>
                              <option value="CC">Islas de Cocos o Keeling</option>
                              <option value="FO">Islas Faroe</option>
                              <option value="HM">Islas Heard y McDonald</option>
                              <option value="FK">Islas Malvinas</option>
                              <option value="MP">Islas Marianas del Norte</option>
                              <option value="MH">Islas Marshall</option>
                              <option value="UM">Islas menores de Estados Unidos</option>
                              <option value="PW">Islas Palau</option>
                              <option value="SB">Islas Salomón</option>
                              <option value="SJ">Islas Svalbard y Jan Mayen</option>
                              <option value="TK">Islas Tokelau</option>
                              <option value="TC">Islas Turks y Caicos</option>
                              <option value="VI">Islas Vírgenes (EEUU)</option>
                              <option value="VG">Islas Vírgenes (Reino Unido)</option>
                              <option value="WF">Islas Wallis y Futuna</option>
                              <option value="IL">Israel</option>
                              <option value="IT">Italia</option>
                              <option value="JM">Jamaica</option>
                              <option value="JP">Japón</option>
                              <option value="JO">Jordania</option>
                              <option value="KZ">Kazajistán</option>
                              <option value="KE">Kenia</option>
                              <option value="KG">Kirguizistán</option>
                              <option value="KI">Kiribati</option>
                              <option value="KW">Kuwait</option>
                              <option value="LA">Laos</option>
                              <option value="LS">Lesotho</option>
                              <option value="LV">Letonia</option>
                              <option value="LB">Líbano</option>
                              <option value="LR">Liberia</option>
                              <option value="LY">Libia</option>
                              <option value="LI">Liechtenstein</option>
                              <option value="LT">Lituania</option>
                              <option value="LU">Luxemburgo</option>
                              <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                              <option value="MG">Madagascar</option>
                              <option value="MY">Malasia</option>
                              <option value="MW">Malawi</option>
                              <option value="MV">Maldivas</option>
                              <option value="ML">Malí</option>
                              <option value="MT">Malta</option>
                              <option value="MA">Marruecos</option>
                              <option value="MQ">Martinica</option>
                              <option value="MU">Mauricio</option>
                              <option value="MR">Mauritania</option>
                              <option value="YT">Mayotte</option>
                              <option value="MX">México</option>
                              <option value="FM">Micronesia</option>
                              <option value="MD">Moldavia</option>
                              <option value="MC">Mónaco</option>
                              <option value="MN">Mongolia</option>
                              <option value="MS">Montserrat</option>
                              <option value="MZ">Mozambique</option>
                              <option value="NA">Namibia</option>
                              <option value="NR">Nauru</option>
                              <option value="NP">Nepal</option>
                              <option value="NI">Nicaragua</option>
                              <option value="NE">Níger</option>
                              <option value="NG">Nigeria</option>
                              <option value="NU">Niue</option>
                              <option value="NF">Norfolk</option>
                              <option value="NO">Noruega</option>
                              <option value="NC">Nueva Caledonia</option>
                              <option value="NZ">Nueva Zelanda</option>
                              <option value="OM">Omán</option>
                              <option value="NL">Países Bajos</option>
                              <option value="PA">Panamá</option>
                              <option value="PG">Papúa Nueva Guinea</option>
                              <option value="PK">Paquistán</option>
                              <option value="PY">Paraguay</option>
                              <option value="PE">Perú</option>
                              <option value="PN">Pitcairn</option>
                              <option value="PF">Polinesia Francesa</option>
                              <option value="PL">Polonia</option>
                              <option value="PT">Portugal</option>
                              <option value="PR">Puerto Rico</option>
                              <option value="QA">Qatar</option>
                              <option value="UK">Reino Unido</option>
                              <option value="CF">República Centroafricana</option>
                              <option value="CZ">República Checa</option>
                              <option value="ZA">República de Sudáfrica</option>
                              <option value="DO">República Dominicana</option>
                              <option value="SK">República Eslovaca</option>
                              <option value="RE">Reunión</option>
                              <option value="RW">Ruanda</option>
                              <option value="RO">Rumania</option>
                              <option value="RU">Rusia</option>
                              <option value="EH">Sahara Occidental</option>
                              <option value="KN">Saint Kitts y Nevis</option>
                              <option value="WS">Samoa</option>
                              <option value="AS">Samoa Americana</option>
                              <option value="SM">San Marino</option>
                              <option value="VC">San Vicente y Granadinas</option>
                              <option value="SH">Santa Helena</option>
                              <option value="LC">Santa Lucía</option>
                              <option value="ST">Santo Tomé y Príncipe</option>
                              <option value="SN">Senegal</option>
                              <option value="SC">Seychelles</option>
                              <option value="SL">Sierra Leona</option>
                              <option value="SG">Singapur</option>
                              <option value="SY">Siria</option>
                              <option value="SO">Somalia</option>
                              <option value="LK">Sri Lanka</option>
                              <option value="PM">St Pierre y Miquelon</option>
                              <option value="SZ">Suazilandia</option>
                              <option value="SD">Sudán</option>
                              <option value="SE">Suecia</option>
                              <option value="CH">Suiza</option>
                              <option value="SR">Surinam</option>
                              <option value="TH">Tailandia</option>
                              <option value="TW">Taiwán</option>
                              <option value="TZ">Tanzania</option>
                              <option value="TJ">Tayikistán</option>
                              <option value="TF">Territorios franceses del Sur</option>
                              <option value="TP">Timor Oriental</option>
                              <option value="TG">Togo</option>
                              <option value="TO">Tonga</option>
                              <option value="TT">Trinidad y Tobago</option>
                              <option value="TN">Túnez</option>
                              <option value="TM">Turkmenistán</option>
                              <option value="TR">Turquía</option>
                              <option value="TV">Tuvalu</option>
                              <option value="UA">Ucrania</option>
                              <option value="UG">Uganda</option>
                              <option value="UY">Uruguay</option>
                              <option value="UZ">Uzbekistán</option>
                              <option value="VU">Vanuatu</option>
                              <option value="VE">Venezuela</option>
                              <option value="VN">Vietnam</option>
                              <option value="YE">Yemen</option>
                              <option value="YU">Yugoslavia</option>
                              <option value="ZM">Zambia</option>
                              <option value="ZW">Zimbabue</option>
                            </select>
        
        
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Programa máster de Interés</label>
                            <select id="master" name="master" class="form-control" value="{{Auth::user()->master}}" >

                              @if (!Auth::user()->master)
                              <option value="" selected disabled>Selecione un master  *</option>
                              @endif
                              <option value="MBIMCR">Máster BIM en diseño y construcción de vías, carreteras y autopistas </option>
                              <option value="MBIMCI">Máster Internacional en BIM Management en Infraestructuras e Ingeniería Civil </option>
                              <option value="MAEROP">Máster en Aeropuertos: Diseño, Construcción y Mantenimiento </option>
                              <option value="MARURB">Máster en Arquitectura avanzada y urbanismos ambientalmente sostenibles </option>
                              <option value="MBIGDA">Máster en Big Data y Business Intelligence </option>
                              <option value="MBIMMA">Máster Internacional en BIM Management </option>
                              <option value="MBIMDA">Máster BIM & Data Management (optimización, automatización y gestión de datos BIM)</option>
                              <option value="MBIMCO">Máster Internacional BIM Management especializado en ejecución y gestión de contratos en fase de construcción</option>
                              <option value="MESTRU">Máster en Cálculo de Estructuras de Obras Civiles </option>
                              <option value="MTRANV">Máster en Construcción, mantenimiento y Explotación de Metros,Tranvías y Ferrocarriles Urbanos </option>
                              <option value="MDIPRO">Máster en Dirección de Proyectos Internacionales – PMI® </option>
                              <option value="MBIMDIA">Master en Diseño de Interiores y gestión BIM de proyectos de Arquitectura e Interiorismo </option>
                              <option value="MPLAIN">Máster en Diseño y Construcción de instalaciones y plantas industriales </option>
                              <option value="MESTED">Máster en Diseño, Cálculo y Reparación de Estructuras de Edificación </option>
                              <option value="MOOHH">Máster en Diseño, Construcción y Explotación de Obras Hidráulicas </option>
                              <option value="MPUERT">Máster en Diseño, Construcción y explotación de puertos, costas y obras marítimas especiales </option>
                              <option value="MCARRE">Máster en Diseño, Construcción y Mantenimiento de Carreteras </option>
                              <option value="MELECT">Máster en Electrónica Industrial, Automatización y Control </option>
                              <option value="MERYEE">Máster en Energías Renovables y Eficiencia Energética </option>
                              <option value="MFINGE">Máster en Financiación y Gestión de Infraestructuras </option>
                              <option value="MGEOCI">Máster en Geotecnia y Cimentaciones </option>
                              <option value="MMAIND">Master en Gerencia e ingeniería del Mantenimiento industrial </option>
                              <option value="MGICSM">Máster en Gestión Integrada de la Calidad, la Seguridad y el Medio Ambiente </option>
                              <option value="MIFFCC">Máster en Infraestructuras Ferroviarias </option>
                              <option value="MSMART">Máster en infraestructuras urbanas inteligentes y urbanismo sostenible: Smart Cities </option>
                              <option value="MIMCON">Máster en ingeniería de Materiales de construcción </option>
                              <option value="MIAGUA">Máster en Ingeniería del Agua: Tratamiento, Depuración y Gestión de Residuos </option>
                              <option value="MELECA">Máster en Ingeniería Eléctrica aplicada </option>
                              <option value="MTRLOG">Máster en Logística y transporte </option>
                              <option value="MTRLOG">Máster en Marketing Digital </option>
                              <option value="MOPMIN">Máster en Minería: Planificación y Gestión de Minas y Operaciones Mineras </option>
                              <option value="MREHEE">Máster en Patología, Rehabilitación de estructuras y eficiencia y ahorro energético en edificación </option>
                              <option value="MPEYGA">Máster en Petróleo y Gas: Prospección, Transformación y Gestión </option>
                              <option value="MASOST">Máster en Planificación, Construcción y Explotación de Infraestructuras Ambientalmente Sostenibles </option>
                              <option value="MSEGIN">Máster en Seguridad de la Información y Continuidad de Negocio (Ciberseguridad) </option>
                              <option value="MIAMBI">Máster Internacional en Ingeniería y gestión ambiental </option>
                              <option value="MSEGST">Máster Internacional en Seguridad y Salud en el trabajo y Prevención de Riesgos </option>
                              <option value="MTTSEG">Máster Internacional en Tráfico, Transportes y Seguridad Vial </option>
                              <option value="MBADEC">Máster MBA en Dirección de Empresas y Gerencia de Proyectos de Ingeniería y Construcción </option>
                              <option value="MBAGRO">Máster MBA en Gestión de empresas agropecuarias y dirección de agronegocios </option>
                              <option value="MBAMIN">Máster MBA en Minería, Dirección y Gestión de empresas Mineras</option>
                            </select>
                          </div>
                        </div>
                      </div>
                     
                    </div>





                    <button type="button" class="btn btn-primary float-right" onclick="stepper3.next()">Siguiente</button>
                  </div>

                  <div id="test-nlf-2" role="tabpanel" class="bs-stepper-pane fade dstepper-block dstepper-none" aria-labelledby="stepper3trigger2" bis_skin_checked="1">
                    


                    <div class="row ">
                      <div class="col-md-7 col-12">
                        <div class="card card-primary">
                         
                          <div class="card-body p-0 pt-4">


                            <div class="timeline timeline-inverse">
                          
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-ellipsis-v  bg-primary "> 1</i>
                                <div class="timeline-item">
        
                                  <h3 class="timeline-header" style="font-weight: bold">Paso 1</h3>
        
                                  <div class="timeline-body">
                                    Inicia sesión en tu cuenta YouTube
                                  </div>
                              
                                </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-ellipsis-v  bg-primary "> 2</i>
        
                                <div class="timeline-item">
        
                                  <h3 class="timeline-header" style="font-weight: bold">Paso 2</h3>
                                  </h3>
                                  <div class="timeline-body">
                                    Sube el archivo del vídeo y configura sus detalles                                  </div>
                                </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-ellipsis-v  bg-primary "> 3</i>
        
                                <div class="timeline-item">
        
                                  <h3 class="timeline-header" style="font-weight: bold" style="font-weight: bold">Paso 3</h3>
        
                                  <div class="timeline-body">
                                    completa la información del vídeo y publícalo
                                  </div>
                              
                                </div>
                              </div>
                              <!-- END timeline item -->
                  
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-ellipsis-v  bg-primary "> 4</i>
        
                                <div class="timeline-item">
        
                                  <h3 class="timeline-header" style="font-weight: bold">Paso 4</h3>
        
                                  <div class="timeline-body">
                                   Copia el link  aquí.

                                   <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="youtube" class="form-control"  placeholder="URL ..." value="{{Auth::user()->youtube}}" >
                                    <div></div></div>
                              </div>

                                  </div>
                                  
                                </div>
                              <!-- END timeline item -->
                           
                            </div>


                          </div>
                          <!-- /.card-body -->
                        </div>
                      </div>
                      <div class="col-md-5 col-12 mb-3">

                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item"  width="560" height="315" src="https://www.youtube.com/embed/jq363d1mziw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>


                      </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary float-right" onclick="stepper3.next()">Siguiente</button>
                  </div>

                  <div id="test-nlf-3" role="tabpanel" class="bs-stepper-pane fade  dstepper-block dstepper-none" aria-labelledby="stepper3trigger3" bis_skin_checked="1">


                    <div class="row">
                      <div class="col-md-6 col-12">

                      
                        
                        <div class="form-group">
                          <label for="exampleInputFile">Carga tu carta de recomendación</label>
                          <div class="input-group">
                            <div class="custom-file">
                                @php
                                if ((Auth::user()->url)) {
                                  $url = url(Auth::user()->url);
                                }
                                else {
                                  $url = '';         
                                }

                                @endphp

                              <input type="file" class="custom-file-input" id="exampleInputFile" name="file" accept="application/pdf" value="{{$url}}">
                              <label class="custom-file-label" for="exampleInputFile">Cargar PDF</label>
                            </div>
                          </div>
                        </div>


                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                          <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
          
                            <div class="mailbox-attachment-info">
                              <a href="{{$url}}" class="mailbox-attachment-name"style="font-size: 0.8em;"><i class="fas fa-paperclip"></i> Carta-de-recomendación.pdf</a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                    <span class="text-danger">max 10mb</span>
                                    <a href="{{$url}}" download="Carta-de-recomendación-{{Auth::user()->name}}" class="btn btn-default btn-sm float-right"  ><i class="fas fa-cloud-download-alt" ></i></a>
                                  </span>
                            </div>
                          </li>
                   
                        </ul>

                      </div>

                      <div class="col-md-6 col-12">
                        

                          <div class="card mb-2">
                            <img class="card-img-top" src="{{ asset('img/recomendacion.jpg') }}" alt="Dist Photo 3">
                            <div class="card-img-overlay">
                              <h5 class="card-title text-primary">Carta de recomendación</h5>
                             
                            </div>
                          </div>
                        

                      </div>

                    </div>


                    <button type="submit" class="btn btn-success  float-right" onclick="stepper3.next()">Guardar</button>
                  </div>



              </div>
            </div>








          </div>
           
          </form>
        </div>
    </div>

    <div class="col-md-3 col-12">
      
      <div class="row">
        <div class="col-12 mb-1">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Raliza la reserva de plaza</span>

<button type="button" class="btn btn-block bg-gradient-info btn-xs">Más información</button>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



   <!-- /.col -->
   <div class="col-12 mb-1">
    <div class="info-box">
      <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Ir al Exame ahora</span>
<button type="button" class="btn btn-block bg-gradient-danger btn-xs">Más información</button>

      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->





        <div class="col-12 mb-1">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Solicita la Financiación</span>
<button type="button" class="btn btn-block bg-gradient-success btn-xs">Más información</button>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 mb-1">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pide Ayuda a un Asesor </span>
              <button type="button" class="btn btn-block bg-gradient-warning btn-xs">Más información</button>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
     
      </div>
    </div>

</div>


@stop

@section('css')
    <style>
         /* Requerimientos Plugin paises  */
         .iti__flag {background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/img/flags.png");}

@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
.iti__flag {background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/img/flags@2x.png");}
}
.iti { width: 100%; };

.custom-file-label::after {
	content: "Buscar" !important;
}

@media (max-width: 575.98px) {
  .bs-stepper-header {
	display: block;
}

}


    </style>
@stop

@section('js')
    <script> 
    
var input = document.querySelector('#telefono');



window.intlTelInput(input, {
 initialCountry: '{{Auth::user()->country}}',
 autoHideDialCode: true,
 separateDialCode: true,
 preferredCountries: ['mx','us','es'],
 hiddenInput: "full_phone",
 autoPlaceholder: '(000) 000 0000',    
 utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js",
 geoIpLookup: function(callback) {
         fetch('https://ipinfo.io/json', {
             cache: 'reload'
         }).then(response => {
             if ( response.ok ) {
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

$('.js-example-basic-multiple').select2({
placeholder: "Seleciona un país",
allowClear: true,
value:'ve'
});

function pais() {
      var pais =iti.getSelectedCountryData().iso2;
      $('.js-example-basic-multiple').val(pais.toUpperCase()).trigger('change');
      var  pais2 =  $("#pais").val();
      $("#pais-nombre").val($("#pais option[value='"+ pais2 +"']")[0].text);

    }

input.addEventListener("countrychange", function(e) {
  pais();
}); 


$('.js-example-basic-multiple').change(function(){

  if ($(this)) {
     var  pais2 =  $(this).val();
      $("#pais-nombre").val($("#pais option[value='"+ pais2 +"']")[0].text);
        
  }
 
    
    })


// document.addEventListener('DOMContentLoaded', function () {
//   var stepper = new Stepper(document.querySelector('.bs-stepper'))
// })


window.stepper3 = new Stepper(document.querySelector('#stepper3'), {
    linear: false,
    animation: false
  })


  $("#pais").val("{{Auth::user()->country}}").trigger('change');
  $("#master").val("{{Auth::user()->master}}").trigger('change');


    </script>
@stop
