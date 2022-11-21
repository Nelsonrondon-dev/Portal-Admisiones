@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
@stop

@section('content')
    <div class="container">


        <div class="row justify-content-md-center">
            <div class="col-lg-6">


                @if ($errors->any())

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atención!</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
            </div>
        </div>


        <!-- form start -->

        <form action="{{ route('registros.update', $user->id) }}" role="form" id="formulario-validado" method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="row justify-content-md-center pt-3">
                <div class="col-lg-10">

                    <div class="card card-info">

                        <!-- .card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Datos del Usuario</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- .card-body -->
                        <div class="card-body">


                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $user->name }}" placeholder="Nombre"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="lastname" class="form-control"
                                                value="{{ $user->lastname }}" placeholder="Apellido">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <div class="input-group mb-3">

                                            <input id="telefono0" name="phone" type="tel" class="form-control"
                                                value="{{ $user->phone }}" placeholder="Telefono">

                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="form-control" placeholder="Email"  disabled="">
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>País de residencia</label>

                                        <input type="hidden" name="country" id="pais-nombre" value="{{ $user->country }}">
                                        <select id="pais" name="countryid"
                                            class="js-example-basic-multiple form-control select2 "
                                            value="{{ $user->country }}">
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
                                            <option value="ES">España</option>
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
                                            <option value="MK">Macedonia, Ex-República Yugoslava de
                                            </option>
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
                                        <select id="master" name="master" class="form-control"
                                            value="{{ $user->master }}">

                                            @if (!$user->master)
                                                <option value="" selected disabled>Programa máster de Interés *
                                                </option>
                                            @endif


                                            <!-- Infraestructuras Civiles y de Transporte -->
                                            <option style="font-weight: bold;" value="" disabled="">
                                                Infraestructuras Civiles y de Transporte</option>

                                            <option value="MCARRE">- Máster en Diseño, Construcción y Mantenimiento de
                                                Carreteras </option>
                                            <option value="MTTSEG">- Máster Internacional en Tráfico, Transportes y
                                                Seguridad Vial </option>
                                            <option value="MAEROP">- Máster en Aeropuertos: Diseño, Construcción y
                                                Mantenimiento </option>
                                            <option value="MPUERT">- Máster en Diseño, Construcción y explotación de
                                                puertos, costas y obras marítimas especiales </option>
                                            <option value="MIFFCC">- Máster en Infraestructuras Ferroviarias </option>
                                            <option value="MTRANV">- Máster en Construcción, Mantenimiento y Explotación de
                                                Metros, Tranvías y Ferrocarriles Urbanos</option>
                                            <option value="MASOST">- Máster en Planificación, Construcción y Explotación de
                                                Infraestructuras Ambientalmente Sostenibles </option>

                                            <!-- Estructuras, Materiales y Geotecnia -->

                                            <option value="" style="font-weight: bold;" disabled="">Estructuras,
                                                Materiales y Geotecnia</option>

                                            <option value="MESTRU">- Máster en Cálculo de Estructuras de Obras Civiles
                                            </option>
                                            <option value="MGEOCI">- Máster en Geotecnia y Cimentaciones </option>
                                            <option value="MESTED">- Máster en Diseño, Cálculo y Reparación de Estructuras
                                                de Edificación </option>
                                            <option value="MREHEE">- Máster en Patología, Rehabilitación de estructuras y
                                                eficiencia y ahorro energético en edificación </option>
                                            <option value="MIMCON">- Máster en ingeniería de Materiales de construcción
                                            </option>

                                            <!-- Obras Hidráulicas e Ingeniería del Agua y Ambiental -->

                                            <option value="" style="font-weight: bold;" disabled="">Obras
                                                Hidráulicas e Ingeniería del Agua y Ambiental</option>

                                            <option value="MOOHH">- Máster en Diseño, Construcción y Explotación de Obras
                                                Hidráulicas </option>
                                            <option value="MIAMBI">- Máster Internacional en Ingeniería y gestión ambiental
                                            </option>
                                            <option value="MIAGUA">- Máster en Ingeniería del Agua: Tratamiento, Depuración
                                                y Gestión de Residuos </option>


                                            <!-- BIM -->

                                            <option value="" style="font-weight: bold;" disabled="">BIM</option>

                                            <option value="MBIMCI+">- Máster Internacional BIM Management en
                                                Infraestructura e Ingeniería Civil </option>

                                            <option value="MBIMCII">- International Master’s Degree in BIM Management for
                                                Infrastructures and Civil Engineering </option>

                                            <option value="MBIMMA+">- Máster Internacional en BIM Management </option>

                                            <option value="MBIMMAI">- International Master’s Degree in BIM Management
                                            </option>

                                            <option value="MBIMCR">- Máster BIM en Diseño y Construcción de Vías,
                                                Carreteras y Autopistas </option>


                                            {{-- <option value="MBIMCI">- Máster Internacional en BIM Management en Infraestructuras e Ingeniería Civil </option> --}}


                                            <option value="MBIMDIA">- Máster en Diseño de Interiores y gestión BIM de
                                                Proyectos de Arquitectura e Interiorismo </option>
                                            <option value="MBIMDA">- Máster BIM & Data Management (optimización,
                                                automatización y gestión de datos BIM)</option>
                                            <option value="MBIMCO">- Máster Internacional BIM Management especializado en
                                                ejecución y gestión de contratos en fase de construcción</option>
                                            <option value="MBIMST">- Máster BIM Management especializado en Proyectos
                                                Estructurales</option>



                                            <!-- Gestión y Financiación de Empresas y Proyectos -->

                                            <option value="" style="font-weight: bold;" disabled="">Gestión y
                                                Financiación de Empresas y Proyectos</option>


                                            <option value="MFINGE">- Máster en Financiación y Gestión de Infraestructuras
                                            </option>
                                            <option value="MBADEC">- Máster MBA en Dirección de Empresas y Gerencia de
                                                Proyectos de Ingeniería y Construcción </option>
                                            <option value="MBAGRO">- Máster MBA en Gestión de empresas agropecuarias y
                                                dirección de agronegocios </option>
                                            <option value="MBAMIN">- Máster MBA en Minería, Dirección y Gestión de empresas
                                                Mineras</option>
                                            <option value="MINPRO">- Máster Internacional en Project Management (Formación
                                                Permanente) </option>
                                            <option value="MTRLOG">- Máster en Logística y transporte </option>
                                            <option value="MGICSM">- Máster en Gestión Integrada de la Calidad, la
                                                Seguridad y el Medio Ambiente </option>
                                            <option value="MSEGST">- Máster Internacional en Seguridad y Salud en el
                                                trabajo y Prevención de Riesgos </option>
                                            <option value="MMAGIL">- Máster en Metodologías Ágiles </option>
                                            <option value="MGESRI">- Máster en Gestión de Riesgos y Compliance </option>


                                            <!-- Energía, Petróleo y Minas -->

                                            <option value="" style="font-weight: bold;" disabled="">Energía,
                                                Petróleo y Minas</option>

                                            <option value="MPEYGA">- Máster en Petróleo y Gas: Prospección, Transformación
                                                y Gestión </option>
                                            <option value="MERYEE">- Máster en Energías Renovables y Eficiencia Energética
                                            </option>
                                            <option value="MOPMIN">- Máster en Minería: Planificación y Gestión de Minas y
                                                Operaciones Mineras </option>

                                            <!-- Transformación Digital -->

                                            <option value="" style="font-weight: bold;" disabled="">
                                                Transformación Digital</option>

                                            <option value="MMADIG">- Máster en Marketing Digital </option>
                                            <option value="MBIGDA">- Máster en Big Data y Business Intelligence </option>
                                            <option value="MSEGIN">- Máster en Seguridad de la Información y Continuidad de
                                                Negocio (Ciberseguridad) </option>


                                            <!-- Ingeniería, Aplicaciones e Instalaciones Industriales -->

                                            <option value="" style="font-weight: bold;" disabled="">Ingeniería,
                                                Aplicaciones e Instalaciones Industriales</option>

                                            <option value="MPLAIN">- Máster en Diseño y Construcción de instalaciones y
                                                plantas industriales </option>
                                            <option value="MELECT">- Máster en Electrónica Industrial, Automatización y
                                                Control </option>
                                            <option value="MELECA">- Máster en Ingeniería Eléctrica aplicada </option>
                                            <option value="MMAIND">- Máster en Gerencia e Ingeniería del Mantenimiento
                                                Industrial</option>


                                            <option value="MINGIN">- Máster en Ingeniería Industrial</option>
                                            <option value="MINQUI">- Máster en Ingeniería Química</option>
                                            <option value="MINMEC">- Máster en Ingeniería Mecánica especializado en Diseño,
                                                Logística y Gerencia</option>
                                            <option value="MINBIO">- Máster en Ingeniería Biomédica</option>


                                            <!-- Arquitectura y Urbanismo -->

                                            <option value="" style="font-weight: bold;" disabled="">Arquitectura
                                                y Urbanismo</option>
                                            <option value="MARURB">- Máster en Arquitectura avanzada y urbanismos
                                                ambientalmente sostenibles </option>
                                            <option value="MSMART">- Máster en infraestructuras urbanas inteligentes y
                                                urbanismo sostenible: Smart Cities </option>





                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Actualizar Usuario</button>
                        </div> --}}


                    </div>
                </div>
            </div>



            <!-- PASO 2 -->

            <div class="row justify-content-md-center pt-3">

                <div class="col-lg-10">

                    <div class="card card-info">

                        <!-- .card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Diagnóstico EADIC</h3>
                        </div>

                        <!-- /.card-header -->


                        <!-- .card-body -->
                        <div class="card-body">


                        </div>
                        <!-- /.card-body -->



                    </div>
                </div>

            </div>




            <!-- PASO 3 -->


            <div class="row justify-content-md-center pt-3">

                <div class="col-lg-10">

                    <div class="card card-info">

                        <!-- .card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Asesoría Personalizada</h3>
                        </div>

                        <!-- /.card-header -->


                        <!-- .card-body -->
                        <div class="card-body">



                            <div class="row">

                                <div class="col-12">


                                    <div class="card-body">

                                        <div class="row">
                                            <table id="table_booking" class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Evento</th>
                                                        <th>Fecha Usuario</th>
                                                        <th>Zona Horaria Usuario</th>
                                                        <th>Fecha España</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($user->getbookings as $booking)
                                                        <tr>
                                                            <td>{{ $booking->title }}</td>
                                                            <td><span class="badge bg-success">{{ $booking->start_date }}
                                                            </td>
                                                            <td>{{ $booking->zona_horaria }}</span></td>
                                                            <td><span
                                                                    class="badge bg-success">{{ str_replace('T', ' ', $booking->start_date_espana) }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12">



                                                <div class="form-group">
                                                    <label>Fecha y hora:</label>
                                                    <div class="input-group date" id="reservationdatetime"
                                                        data-target-input="nearest">
                                                        <input id="star" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#reservationdatetime">
                                                        <div class="input-group-append" data-target="#reservationdatetime"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <a id="saveBtn" class="pl-3"><button type="button"
                                                                class="btn btn-success float-right">Programar asesoría
                                                                personalizada</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="required" for="timezone">Zona horaria del usuario</label>
                                                <select class="form-control" name="timezone" id="timezone">
                                                    @foreach (Helpers::getTimeZoneList() as $timezone => $timezone_gmt_diff)
                                                        <option value="{{ $timezone }}"
                                                            {{ $timezone === old('timezone', $user->timezone) ? 'selected' : '' }}>
                                                            {{ $timezone_gmt_diff }}
                                                        </option>
                                                    @endforeach

                                                    @foreach ($user->getbookings as $booking)
                                                        <option value="{{ $booking->zona_horaria }}" selected>
                                                            {{ $booking->zona_horaria }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>




                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- /.card-body -->



                    </div>
                </div>

            </div>

            <!-- PASO 4 -->





            <div class="row justify-content-md-center pt-3">

                <div class="col-lg-10">

                    <div class="card card-info">

                        <!-- .card-header -->
                        <div class="card-header">
                            <h3 class="card-title">CV y Recomendaciones</h3>
                        </div>

                        <!-- /.card-header -->


                        <!-- .card-body -->
                        <div class="card-body">


                            @if (count($user->getEnds) > 0)

                                @foreach ($user->getEnds as $ends)
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
                                                        value="{{ $ends->name_1 }}" placeholder="Nombre ...">
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
                                                        value="{{ $ends->lasname_1 }}" placeholder="Apellido">
                                                    <div></div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input id="telefono1" name="phone1" type="tel" class="form-control"
                                                    value="{{ $ends->phone_1 }}" placeholder="Telefono">

                                            </div>


                                            <div class="form-group">
                                                <label>¿Es antiguo alumno de EADIC?</label>
                                                <select id="alumno1" name="alumno1" class="form-control"
                                                    value="{{ $ends->alumno_eadic_1 }}">

                                                    @if ($ends->alumno_eadic_1 == '')
                                                        <option value="" selected="" disabled="">Selecione
                                                            una *
                                                        </option>
                                                    @endif

                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>




                                        </div>

                                        <div class="col-md-6 col-12">

                                            <p style="text-align: center;font-weight: bold;">Recomendación 1 </p>

                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" name="name2" class="form-control"
                                                        value="{{ $ends->name_2 }}" placeholder="Nombre ...">
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
                                                        value="{{ $ends->lasname_2 }}" placeholder="Apellido">
                                                    <div></div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input id="telefono2" name="phone2" type="tel" class="form-control"
                                                    value="{{ $ends->phone_2 }}" placeholder="Telefono">

                                            </div>


                                            <div class="form-group">
                                                <label>¿Es antiguo alumno de EADIC?</label>
                                                <select id="alumno2" name="alumno2" class="form-control"
                                                    value="{{ $ends->alumno_eadic_2 }}">

                                                    @if ($ends->alumno_eadic_2 == '')
                                                        <option value="" selected="" disabled="">Selecione
                                                            una *
                                                        </option>
                                                    @endif

                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>




                                        </div>

                                    </div>

                                    <div class="row mt-2 ml-3 mr-3">
                                        <div class="col-12">
                                            <label for="exampleInputFile">Agregar Curriculum Vitae</label>
                                            <br>

                                            <input type="file" name="file" id="">

                                        </div>
                                    </div>

                                    <div class="card-footer bg-white">
                                        <label for="exampleInputFile">Curriculum Actual</label>

                                        <ul id="nuevo"
                                            class="mailbox-attachments d-flex align-items-stretch clearfix">

                                            @if ($ends->curriculum)
                                                <li id='muestra-1'><span class="mailbox-attachment-icon"><i
                                                            class="far fa-file-pdf"></i></span>
                                                    <div class="mailbox-attachment-info">
                                                        <a href="{{ $ends->curriculum }}"
                                                            class="mailbox-attachment-name"><i
                                                                class="fas fa-paperclip"></i>
                                                            cv_{{ $user->name }}.pdf</a>
                                                        <span class="mailbox-attachment-size clearfix mt-1">
                                                            <span>1,245 KB</span>
                                                            <a href="{{ $ends->curriculum }}"
                                                                class="btn btn-default btn-sm float-right"><i
                                                                    class="fas fa-cloud-download-alt" download></i></a>
                                                        </span>
                                                    </div>

                                                </li>
                                            @endif


                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                <div class="row mt-3">

                                    <div class="col-md-6 col-12">

                                        <p style="text-align: center;font-weight: bold;">Recomendación 1 </p>

                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="name1" class="form-control" value=""
                                                    placeholder="Nombre ...">
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
                                                    value="" placeholder="Apellido">
                                                <div></div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input id="telefono1" name="phone1" type="tel" class="form-control"
                                                value="" placeholder="Telefono">

                                        </div>


                                        <div class="form-group">
                                            <label>¿Es antiguo alumno de EADIC?</label>
                                            <select id="alumno1" name="alumno1" class="form-control" value="">

                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>




                                    </div>

                                    <div class="col-md-6 col-12">

                                        <p style="text-align: center;font-weight: bold;">Recomendación 1 </p>

                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="name2" class="form-control" value=""
                                                    placeholder="Nombre ...">
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
                                                    value="" placeholder="Apellido">
                                                <div></div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input id="telefono2" name="phone2" type="tel" class="form-control"
                                                value="" placeholder="Telefono">

                                        </div>


                                        <div class="form-group">
                                            <label>¿Es antiguo alumno de EADIC?</label>
                                            <select id="alumno2" name="alumno2" class="form-control" value="">
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>




                                    </div>

                                </div>

                                <div class="row mt-2 ml-3 mr-3">
                                    <div class="col-12">
                                        <label for="exampleInputFile">Agregar Curriculum Vitae</label>
                                        <br>

                                        <input type="file" name="file" id="">

                                    </div>
                                </div>

                            @endif



                        </div>
                        <!-- /.card-body -->


                        {{-- <div class="card-footer">
                           <button type="submit" class="btn btn-success float-right">Actualizar Usuario</button>
                       </div> --}}

                    </div>
                </div>

            </div>

            <!-- PASO 5 -->




            <div class="row justify-content-md-center pt-3">

                <div class="col-lg-10">

                    <div class="card card-info">

                        <!-- .card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Finaliza la admision EADIC</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        @if (count($user->getSteps) > 0)


                        @foreach ($user->getSteps as $step)
                            
                        <div class="row">
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label>Ha completado el paso 1</label>
                                    <select id="step1" name="step1" value="{{$step->step1}}" class="form-control">
                                      
                                        @if ($step->step1 == '')
                                        <option value="" selected="" disabled="">Selecione *</option>
                                         @endif

                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>

                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Ha completado el paso 2</label>
                                    <select id="step2" name="step2" class="form-control" value="{{$step->step2}}">

                                        @if ($step->step2 == '')
                                        <option value="" selected="" disabled="">Selecione *</option>
                                         @endif

                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>


                                    </select>
                                </div>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label>Ha completado el paso 3</label>
                                    <select id="step3" name="step3" class="form-control" value="{{$step->step3}}">

                                        @if ($step->step3 == '')
                                        <option value="" selected="" disabled="">Selecione *</option>
                                         @endif

                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Ha completado el paso 4</label>
                                    <select id="step4" name="step4" class="form-control" value="{{$step->step4}}">

                                        @if ($step->step4 == '')
                                        <option value="" selected="" disabled="">Selecione *</option>
                                         @endif

                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>
                            </div>


                        </div>



                        <div class="row">
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label>Ha completado el paso 5</label>
                                    <select id="step5" name="step5" class="form-control" value="{{$step->step5}}">

                                        @if ($step->step5 == '')
                                        <option value="" selected="" disabled="">Selecione *</option>
                                         @endif

                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label>Ha completado el paso 5</label>
                                    <select id="step6" name="step6" class="form-control" value="{{$step->step6}}">
                                        <option value="" selected="" disabled="">Selecione *</option>
                                        <option value="opcion_1">Opción 1</option>
                                        <option value="opcion_2">Opción 2</option>
                                        <option value="opcion_3">Opción 3</option>
                                        <option value="opcion_4">Opción 4</option>
                                    </select>
                                </div>

                            </div>


                        </div>


                        @endforeach

                        @else

                        <div class="row">
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label>Ha completado el paso 1</label>
                                    <select id="step1" name="step1" class="form-control" value="">
                                        <option value="" selected="" disabled="">Selecione *</option>
                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Ha completado el paso 2</label>
                                    <select id="step2" name="step2" class="form-control" value="">
                                        <option value="" selected="" disabled="">Selecione *</option>
                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label>Ha completado el paso 3</label>
                                    <select id="step3" name="step3" class="form-control" value="">
                                        <option value="" selected="" disabled="">Selecione *</option>
                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Ha completado el paso 4</label>
                                    <select id="step4" name="step4" class="form-control" value="">
                                        <option value="" selected="" disabled="">Selecione *</option>
                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>
                            </div>


                        </div>



                        <div class="row">
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label>Ha completado el paso 5</label>
                                    <select id="step5" name="step5" class="form-control" value="">
                                        <option value="" selected="" disabled="">Selecione *</option>
                                        <option value="completado">Si</option>
                                        <option value="incompleto">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">

                                    
                                <div class="form-group">
                                    <label>Ha completado el paso 5</label>
                                    <select id="step6" name="step6" class="form-control" value="">
                                        <option value="" selected="" disabled="">Selecione *</option>
                                        <option value="opcion_1">Opción 1</option>
                                        <option value="opcion_2">Opción 2</option>
                                        <option value="opcion_3">Opción 3</option>
                                        <option value="opcion_4">Opción 4</option>

                                    </select>
                                </div>

                            </div>


                        </div>

                        @endif

                        <!-- .card-body -->
                     

  
                        </div>
                        <!-- /.card-body -->


                        {{-- <div class="card-footer">
                           <button type="submit" class="btn btn-success float-right">Actualizar Usuario</button>
                       </div> --}}

                    </div>
                </div>

            </div>




            <div class="row justify-content-md-center pt-4">

                <div class="col-10 mb-5">
                    
                    <button type="submit" class="btn btn-block btn-success btn-lg"><i class="fas fa-save mr-2"></i>Actualizar Registro</button>

                </div>

            </div>


        </form>


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
            width: 38rem !important;
            z-index: 16 !important;
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

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"
        integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA=="
        crossorigin="anonymous" /> --}}


    <link rel="stylesheet" href="{{ asset('/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">


@stop

@section('js')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>

    <script>
        // Inicializar el input de Telefonos input 0 
        var input0 = document.querySelector('#telefono0');
        window.intlTelInput(input0, {
            initialCountry: '{{ $user->country }}',
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

        var iti = window.intlTelInputGlobals.getInstance(input0);
        iti.isValidNumber();


        // Inicializar el input de Telefonos input 1 

        var input1 = document.querySelector('#telefono1');
        window.intlTelInput(input1, {
            initialCountry: '{{ $user->country }}',
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

        var iti = window.intlTelInputGlobals.getInstance(input1);
        iti.isValidNumber();


        var input2 = document.querySelector('#telefono2');

        window.intlTelInput(input2, {
            initialCountry: '{{ $user->country }}',
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


        $('.js-example-basic-multiple').select2({
            placeholder: "Seleciona un país",
            allowClear: true,
            //	containerCssClass: ':all:',
            value: 've'
        });

        $('#timezone').select2({
            placeholder: "Seleciona un país",
            allowClear: true,
            //	containerCssClass: ':all:',
        });



        function pais() {
            var pais = iti.getSelectedCountryData().iso2;
            $('.js-example-basic-multiple').val(pais.toUpperCase()).trigger('change');
            var pais2 = $("#pais").val();
            $("#pais-nombre").val($("#pais option[value='" + pais2 + "']")[0].text);

        }

        input0.addEventListener("countrychange", function(e) {
            pais();
        });

        $('.js-example-basic-multiple').change(function() {

            if ($(this)) {
                var pais2 = $(this);

                if (pais2.length > 1) {
                    $("#pais-nombre").val($("#pais option[value='" + pais2.val() + "']")[0].text);
                }

            }

        });

        $("#pais").val("{{ $user->country }}").trigger('change');
        $("#master").val("{{ $user->master }}").trigger('change');
    </script>



    <script type="text/javascript">
        $(function() {


            // Inicializar datapicker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: "YYYY-MM-DD HH:mm",
                locale: 'es',
            });


            function ConvertToDateFromUnixTimestamp(fecha) {
                var date = new Date(fecha);
                var timestampInMs = date.getTime();
                var unixTimestamp = Math.floor(date.getTime() / 1000);
                return unixTimestamp;
            }


            function ConvertToUnixTimestampFronDate(unix_timestamp) {

                // Create a new JavaScript Date object based on the timestamp
                // multiplied by 1000 so that the argument is in milliseconds, not seconds.
                var a = new Date(unix_timestamp * 1000);
                // Hours part from the timestamp
                var hours = a.getHours();
                // Minutes part from the timestamp
                var minutes = "0" + a.getMinutes();
                // Seconds part from the timestamp
                var seconds = "0" + a.getSeconds();
                // Will display time in 10:30:23 format
                var date = a.getDate();
                var year = a.getFullYear();
                var month = a.getMonth() + 1;
                var hour = a.getHours();
                var time = year + '-' + month + '-' + date + ' ' + hours + ':' + minutes.substr(-2);
                return time;
            }

            // registrar asesoria personalizada
            $('#saveBtn').click(function(info) {
                var title = 'Asesoría personalizada - reagendada';
                var start_date = $('#star').val();
                var end_date = $('#star').val();
                //  var start_date = start_date + ' ' + $('#hora').val();


                var zonaHoraria = $('#timezone').val();
                // convertir hora a hora 

                if (start_date && zonaHoraria) {

                    var time = ConvertToDateFromUnixTimestamp(start_date);
                    var end_date = moment(start_date).add(30, 'minutes');
                    var start_date = moment(start_date).format('YYYY-MM-DDTHH:mm');
                    var end_date = moment(end_date).format('YYYY-MM-DDTHH:mm');
                    var mensaje = 'Estas seguro de agendar la asesoría personalizada para el ' + moment(
                        start_date).format('l') + ' ' + moment(start_date).format('LTS') + '';
                    var id = {{ $user->id }};

                    $.ajax({
                        url: "https://api.timezonedb.com/v2.1/convert-time-zone",
                        method: "GET",
                        dataType: "json",
                        data: {
                            format: "json",
                            key: '2UGIAH1JYG3F',
                            by: "zone",
                            from: zonaHoraria,
                            to: 'Europe/Madrid',
                            time: time,
                        }
                    }).then(result => {

                            let start_date_espana = ConvertToUnixTimestampFronDate(result.toTimestamp);

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
                                            url: "{{ route('cita.storeAdmin', $user->id) }}",
                                            type: "POST",
                                            dataType: 'json',
                                            data: {
                                                title,
                                                start_date,
                                                end_date,
                                                id,
                                                start_date_espana,
                                                zonaHoraria,
                                            },
                                            success: function(response) {


                                                if (response.error == true) {

                                                    swal({
                                                        title: 'Error',
                                                        text: 'Disculpa, pero debe tener selecionado un programa de interes',
                                                        icon: "warning",
                                                    });

                                                } else {
                                                    var fila = "<tr><td>" + title +
                                                        '</td><td><span class="badge bg-success">' +
                                                        start_date +
                                                        '</span></td><td>' +
                                                        zonaHoraria +
                                                        '</td><td><span class="badge bg-success">' +
                                                        start_date_espana +
                                                        "</span></td></tr>";
                                                    var tr = document.createElement(
                                                        "TR");
                                                    tr.innerHTML = fila;
                                                    document.getElementById(
                                                            "table_booking")
                                                        .appendChild(tr);
                                                    swal("¡Genial! Hemos agendado la Asesoría personalizada con éxito, se  ha  enviado un correo 📧 con la información de la cita, al usuario.", {
                                                        icon: "success",
                                                    });
                                                }

                                            },
                                            error: function(error) {
                                                if (error.responseJSON.errors) {

                                                    swal(error.responseJSON.errors
                                                        .title, {
                                                            icon: "success",
                                                        });
                                                }
                                            },
                                        });



                                    } else {}
                                });




                        }, error => {
                            swal({
                                title: 'Error',
                                text: 'hubo un problema con la Api de conversión, recarge la pagina',
                                icon: "warning",
                            });
                        }

                    );

                } else {
                    swal({
                        title: 'Error',
                        text: 'Debes selecionar la fecha y la zona horaria',
                        icon: "warning",
                    });
                }






            });

        });
    </script>

@stop
