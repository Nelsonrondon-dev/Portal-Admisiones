@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Select2', true)
@section('content_header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    <h3 id="saludos" class="m-0 text-dark">Hola, {{ Auth::user()->name }}</h3>
    <a href="{{ route('resumen') }}" class="btn-flotante">Resumen de admisión</a>
@stop

@section('content')
    <div class="row justify-content-md-center pb-5">





        <div class="col-md-8 col-12">


            <div class="sticky-top mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="font-size: 1.3rem;font-weight: 600;">Formaliza tu matriculación</h4>
                    </div>

                    <div class="card-body">



                        <img src="{{ asset('img/formas-pago.png') }}" alt=""
                            style="width: 100%;background-size: contain;">





                        <div class="row  mt-5">

                            <div class="col-12">


                                <h6 class="mb-5" style="text-align: center">
                                    <b> FORMAS DE PAGO | TITULACIÓN EADIC + TITULO
                                        ESPAÑOL</b>
                                </h6>

                                <div id="accordion">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Precio Oficial
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show " data-parent="#accordion">
                                            <div class="card-body">

                                                <div class="table-responsive-sm" style="overflow: auto;">
                                                    <table class="table" style="overflow-x: auto;" width="70%"
                                                        cellspacing="2" cellpadding="2" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <th style="text-align: center;" colspan="6"
                                                                    valign="middle" height="23" bgcolor="#939292"
                                                                    align="center"><span style="color: #ffffff;">OPCIONES DE
                                                                        PAGO</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;">Planes de Pago</span></th>
                                                                <th style="text-align: center;" width="82"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;">Pago Inicial</span></th>
                                                                <th style="text-align: center;" width="85"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;">Monto Cuotas</span></th>
                                                                <th style="text-align: center;" width="60"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;">N° Cuotas</span></th>
                                                                <td style="text-align: center;" width="105"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;"><strong>Pago
                                                                            Total</strong></span></td>
                                                                <td style="text-align: center;" width="75"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;"><strong>Cuándo se paga la
                                                                            cuota</strong></span></td>
                                                            </tr>
                                                            <tr bgcolor="#AF9F9F">
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#f3f3f3" align="center">
                                                                    <strong><span style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/opcion1r500c10i4485/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    1</strong></a></span></strong><br><span
                                                                        style="color: #000000; font-size: 13px;">A 10
                                                                        CUOTAS</span>
                                                                </th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">500,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">448,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">10</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">4.985,00 €</span><br> <span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion1r500c10i4485/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Mensualmente</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#ECECEC" align="center">
                                                                    <strong><span style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/opcion2r500c5i897/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 2
                                                                                </strong></a></span></strong><br><span
                                                                        style="color: #000000; font-size: 13px;">A 5
                                                                        CUOTAS</span>
                                                                </th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">500,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">897,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">5</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">4.985,00 €</span><br> <span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion2r500c5i897/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">Mensualmente</span></td>
                                                            </tr>
                                                            <tr bgcolor="#8C7171">
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #003da6;"><strong><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/opcion3r350c1i4635/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    3</strong></a></strong></span><br> <span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">350,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">4.635,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">1</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">4.985,00 €</span><br> <span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion3r350c1i4635/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Mes siguiente al primer
                                                                        pago</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><strong><span
                                                                            style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/opcion4r1000c1i3985/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    4</strong></a></span></strong><br> <span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1.000,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">3.985,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">4.985,00 €</span><br> <a
                                                                        href="https://www.eadic-becas.com/producto/opcion4r1000c1i3985/"
                                                                        target="_blank" rel="noopener"><span
                                                                            style="color: #003da6;">(Clic para
                                                                            pagar)</span></a></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">3 meses después del pago
                                                                        inicial</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><strong><span
                                                                            style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/opcion5contado_ui4985/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    5</strong></a></span></strong><br> <span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">4.985,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">0 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">0</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">4.985,00 €</span><br> <span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion5contado_ui4985/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Contado</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                                    Beca de 40%
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body">

                                                <div class="table-responsive-sm" style="overflow: auto;">
                                                    <table class="table" style="overflow-x: auto;" width="70%"
                                                        cellspacing="2" cellpadding="2" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <th style="text-align: center;" colspan="6"
                                                                    valign="middle" height="23" bgcolor="#939292"
                                                                    align="center"><span style="color: #ffffff;">OPCIONES
                                                                        DE PAGO</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;">Planes de Pago</span></th>
                                                                <th style="text-align: center;" width="82"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">Pago Inicial</span>
                                                                </th>
                                                                <th style="text-align: center;" width="85"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">Monto Cuotas</span>
                                                                </th>
                                                                <th style="text-align: center;" width="60"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">N° Cuotas</span>
                                                                </th>
                                                                <td style="text-align: center;" width="105"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;"><strong>Pago
                                                                            Total</strong></span>
                                                                </td>
                                                                <td style="text-align: center;" width="75"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;"><strong>Cuándo se paga la
                                                                            cuota</strong></span>
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#AF9F9F">
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#f3f3f3" align="center">
                                                                    <strong><span style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/r500c10i250/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    1</strong></a></span></strong> <br>
                                                                    <span style="color: #000000; font-size:13px">A 10
                                                                        CUOTAS</span>
                                                                </th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">500,00 € <br> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/r500c10i250/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">250,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">10</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">3.000,00 €</span> <span
                                                                        style="color: #003da6;"><br> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/r500c10i250/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Mensual</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#ECECEC" align="center">
                                                                    <strong><span style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/r500c5i500/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 2
                                                                                </strong></a></span></strong> <br> <span
                                                                        style="color: #000000; font-size:13px">A 5
                                                                        CUOTAS</span>
                                                                </th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">500,00 € <br> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/r500c5i500/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">500,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">5</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">3.000,00 €</span> <br>
                                                                    <span style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/r500c5i500/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span>
                                                                </td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">Mensual</span></td>
                                                            </tr>
                                                            <tr bgcolor="#8C7171">
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #003da6;"><strong><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/r500c2i1250/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 3
                                                                                </strong></a></strong></span> <br> <span
                                                                        style="color: #000000; font-size:13px">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">500,00 € <br> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/r500c2i1250/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">1.250,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">2</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">3.000,00 €</span> <br>
                                                                    <span style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/r500c2i1250/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span>
                                                                </td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Trimestral</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><strong><span
                                                                            style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/ui2991/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 4
                                                                                </strong></a></span></strong><span
                                                                        style="color: #000000;font-size:13px"> <br> Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">2.991,00 € <br> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/ui2991/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">Contado</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">0</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">2.991,00 €</span> <br> <a
                                                                        href="https://www.eadic-becas.com/producto/ui2991/"
                                                                        target="_blank" rel="noopener"><span
                                                                            style="color: #003da6;">(Clic para
                                                                            pagar)</span></a></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">Contado</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                                    Beca del 60%
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">

                                                <table class="table" style="overflow-x: auto;" width="70%"
                                                    cellspacing="2" cellpadding="2" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <th style="text-align: center;" colspan="6"
                                                                valign="middle" height="23" bgcolor="#939292"
                                                                align="center"><span style="color: #ffffff;">OPCIONES DE
                                                                    PAGO</span></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;" valign="middle"
                                                                bgcolor="#D9D9D9" align="center"><span
                                                                    style="color: #000000;">Planes de Pago</span></th>
                                                            <th style="text-align: center;" width="82"
                                                                valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                    style="color: #000000;">Pago Inicial</span></th>
                                                            <th style="text-align: center;" width="85"
                                                                valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                    style="color: #000000;">Monto Cuotas</span></th>
                                                            <th style="text-align: center;" width="60"
                                                                valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                    style="color: #000000;">N° Cuotas</span></th>
                                                            <td style="text-align: center;" width="105"
                                                                valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                    style="color: #000000;"><strong>Pago
                                                                        Total</strong></span></td>
                                                            <td style="text-align: center;" width="75"
                                                                valign="middle" bgcolor="#D9D9D9" align="center"><span
                                                                    style="color: #000000;"><strong>Cuándo se paga la
                                                                        cuota</strong></span></td>
                                                        </tr>
                                                        <tr bgcolor="#AF9F9F">
                                                            <th style="text-align: center;" width="93"
                                                                valign="middle" bgcolor="#f3f3f3" align="center">
                                                                <strong><span style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion1_r500c10i165/"
                                                                            target="_blank" rel="noopener"><strong>OPCIÓN
                                                                                1</strong></a></span></strong><br> <span
                                                                    style="color: #000000; font-size: 13px;">A 10
                                                                    CUOTAS</span>
                                                            </th>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">500,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">165,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">10</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">2.150,00 €</span><br> <span
                                                                    style="color: #003da6;"><a style="color: #003da6;"
                                                                        href="https://www.eadic-becas.com/producto/opcion1_r500c10i165/"
                                                                        target="_blank" rel="noopener">(Clic para
                                                                        pagar)</a></span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">Mensualmente</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;" width="93"
                                                                valign="middle" bgcolor="#ECECEC" align="center">
                                                                <strong><span style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion2r500c5i320/"
                                                                            target="_blank" rel="noopener"><strong>OPCIÓN
                                                                                2 </strong></a></span></strong><br> <span
                                                                    style="color: #000000; font-size: 13px;">A 5
                                                                    CUOTAS</span>
                                                            </th>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">500,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">320,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">5</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">2.100,00 €</span><br> <span
                                                                    style="color: #003da6;"><a style="color: #003da6;"
                                                                        href="https://www.eadic-becas.com/producto/opcion2r500c5i320/"
                                                                        target="_blank" rel="noopener">(Clic para
                                                                        pagar)</a></span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">Mensualmente</span></td>
                                                        </tr>
                                                        <tr bgcolor="#8C7171">
                                                            <th style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #003da6;"><strong><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion3r350c1i1700/"
                                                                            target="_blank" rel="noopener"><strong>OPCIÓN
                                                                                3</strong> </a></strong></span><br> <span
                                                                    style="color: #000000; font-size: 13px;">Acceso Gratis
                                                                    a Programa Superior</span></th>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">350,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">1.700,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">1</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">2.050,00 €</span><br> <span
                                                                    style="color: #003da6;"><a style="color: #003da6;"
                                                                        href="https://www.eadic-becas.com/producto/opcion3r350c1i1700/"
                                                                        target="_blank" rel="noopener">(Clic para
                                                                        pagar)</a></span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">Mes siguiente al primer
                                                                    pago</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><strong><span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion4r1000c1i1000/"
                                                                            target="_blank" rel="noopener"><strong>OPCIÓN
                                                                                4</strong> </a></span></strong><br> Acceso
                                                                Gratis a Programa Superior</th>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">1.000,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">1.000,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">1</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">2.000,00 €</span><br> <a
                                                                    href="https://www.eadic-becas.com/producto/opcion4r1000c1i1000/"
                                                                    target="_blank" rel="noopener"><span
                                                                        style="color: #003da6;">(Clic para
                                                                        pagar)</span></a></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#ECECEC" align="center"><span
                                                                    style="color: #000000;">3 meses después del pago
                                                                    inicial</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><strong><span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion5ui1950/"
                                                                            target="_blank" rel="noopener"><strong>OPCIÓN
                                                                                5</strong></a></span></strong><br> <span
                                                                    style="color: #000000; font-size: 13px;">Acceso Gratis
                                                                    a Programa Superior | Descuento Extra</span></th>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">1.950,00 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">0 €</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">0</span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">1.950,00 €</span><br> <span
                                                                    style="color: #003da6;"><a style="color: #003da6;"
                                                                        href="https://www.eadic-becas.com/producto/opcion5ui1950/"
                                                                        target="_blank" rel="noopener">(Clic para
                                                                        pagar)</a></span></td>
                                                            <td style="text-align: center;" valign="middle"
                                                                bgcolor="#f3f3f3" align="center"><span
                                                                    style="color: #000000;">Contado (Ahorra 44 €)</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div> --}}
                                </div>





                                <div class="callout callout-warning">
                                   
                                    <p>si has solicitado una ayuda a estudio o becas de formación consulta con tu asesor al correo <a href="mailto:admisiones@eadic.es" target="_blank">admisiones@eadic.es</a></p>

                                  
                                             
                                    </div>





                            </div>





                        </div>



                        <div style="display: none" class="row mt-5">

                            <div class="col-12">
                                <h6 class="mb-5" style="text-align: center"><b>FORMAS DE PAGO | TITULACIÓN EADIC +
                                        TITULO
                                        ESPAÑOL</b></h6>




                                <div id="accordion2">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Precio Oficial
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion2">
                                            <div class="card-body">

                                                <div class="table-responsive-sm" style="overflow: auto;">
                                                    <table class="table" style="overflow-x: auto;" width="70%"
                                                        cellspacing="2" cellpadding="2" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <th style="text-align: center;" colspan="6"
                                                                    valign="middle" height="23" bgcolor="#939292"
                                                                    align="center"><span style="color: #ffffff;">OPCIONES
                                                                        DE PAGO</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;">Planes de Pago</span></th>
                                                                <th style="text-align: center;" width="82"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">Pago Inicial</span></th>
                                                                <th style="text-align: center;" width="85"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">Monto Cuotas</span></th>
                                                                <th style="text-align: center;" width="60"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">N° Cuotas</span></th>
                                                                <td style="text-align: center;" width="105"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;"><strong>Pago
                                                                            Total</strong></span></td>
                                                                <td style="text-align: center;" width="75"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;"><strong>Cuándo se paga la
                                                                            cuota</strong></span></td>
                                                            </tr>
                                                            <tr bgcolor="#AF9F9F">
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#f3f3f3" align="center">
                                                                    <strong><span style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/titulacion_oficial_opcion1r500c10i5585/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    1</strong></a></span></strong><br><span
                                                                        style="color: #000000; font-size: 13px;">A 10
                                                                        CUOTAS</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">500,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">558,50 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">10</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">6.385,00 €</span><br> <span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/titulacion_oficial_opcion1r500c10i5585/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Mensualmente</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#ECECEC" align="center">
                                                                    <strong><span style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/titulacion_oficial_opcion2r500c5i1177/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 2
                                                                                </strong></a></span></strong><br><span
                                                                        style="color: #000000; font-size: 13px;">A 5
                                                                        CUOTAS</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">500,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1.177,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">5</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">6.385,00 €</span><br> <span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/titulacion_oficial_opcion2r500c5i1177/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">Mensualmente</span></td>
                                                            </tr>
                                                            <tr bgcolor="#8C7171">
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #003da6;"><strong><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/titulacion_oficial_r1000c1i5385/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 3</strong>
                                                                            </a></strong></span><br> <span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">350,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">6.035,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">1</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">6.385,00 €</span><br> <span
                                                                        style="color: #003da6;"><a style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/titulacion_oficial_r1000c1i5385/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Mes siguiente al primer
                                                                        pago</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><strong><span
                                                                            style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/titulacion_oficial_r1000c1i5385/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 4</strong>
                                                                            </a></span></strong><br> <span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1.000,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">5.385,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">6.385,00 €</span><br> <a
                                                                        href="https://www.eadic-becas.com/producto/titulacion_oficial_r1000c1i5385/"
                                                                        target="_blank" rel="noopener"><span
                                                                            style="color: #003da6;">(Clic para
                                                                            pagar)</span></a></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">3 meses después del pago
                                                                        inicial</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><strong><span
                                                                            style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/titulacion_oficial_contado_ui6385/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    5</strong></a></span></strong><br> <span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">6.385,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">0 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">0</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">6.385,00 €</span><br>
                                                                    <span style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/titulacion_oficial_contado_ui6385/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Contado</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                                    Beca de 40%
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion2">
                                            <div class="card-body">

                                                <div class="table-responsive-sm" style="overflow: auto;">
                                                    <table class="table" style="overflow-x: auto;" width="70%"
                                                        cellspacing="2" cellpadding="2" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <th style="text-align: center;" colspan="6"
                                                                    valign="middle" height="23" bgcolor="#939292"
                                                                    align="center"><span
                                                                        style="color: #ffffff;">OPCIONES DE PAGO</span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#D9D9D9" align="center"><span
                                                                        style="color: #000000;">Planes de Pago</span></th>
                                                                <th style="text-align: center;" width="82"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">Pago Inicial</span></th>
                                                                <th style="text-align: center;" width="85"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">Monto Cuotas</span></th>
                                                                <th style="text-align: center;" width="60"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;">N° Cuotas</span></th>
                                                                <td style="text-align: center;" width="105"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;"><strong>Pago
                                                                            Total</strong></span></td>
                                                                <td style="text-align: center;" width="75"
                                                                    valign="middle" bgcolor="#D9D9D9" align="center">
                                                                    <span style="color: #000000;"><strong>Cuándo se paga
                                                                            la cuota</strong></span></td>
                                                            </tr>
                                                            <tr bgcolor="#AF9F9F">
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#f3f3f3" align="center">
                                                                    <span style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion1_r500c10i165/"
                                                                            target="_blank"
                                                                            rel="noopener"><strong>OPCIÓN
                                                                                1</strong></a></span><br><span
                                                                        style="color: #000000; font-size: 13px;">A 10
                                                                        CUOTAS</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">750,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">275,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">10</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">3.500,00 €</span><br><span
                                                                        style="color: #003da6;"> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/op1_teuesead_r750c10i275/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Mensualmente</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" width="93"
                                                                    valign="middle" bgcolor="#ECECEC" align="center">
                                                                    <span style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion2r500c5i320/"
                                                                            target="_blank"
                                                                            rel="noopener"><strong>OPCIÓN 2
                                                                            </strong></a></span><br><span
                                                                        style="color: #000000; font-size: 13px;">A 5
                                                                        CUOTAS</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">750,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">545,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">5</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">3.475,00 €</span><br><span
                                                                        style="color: #003da6;"> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/op2_teuesead_r750c5i545/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">Mensualmente</span></td>
                                                            </tr>
                                                            <tr bgcolor="#8C7171">
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/opcion3r350c1i1700/"
                                                                            target="_blank"
                                                                            rel="noopener"><strong>OPCIÓN 3
                                                                            </strong></a></span><br><span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">500,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">2.950,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">1</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">3.450,00 €</span><br><span
                                                                        style="color: #003da6;"> <a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/op3_teuesead_r500c1i2950/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Mes siguiente al primer
                                                                        pago</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><strong><span
                                                                            style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/opcion4r1000c1i1000/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN 4
                                                                                </strong></a></span></strong><br><span
                                                                        style="color: #000000; font-size: 13px;"> <span
                                                                            style="color: #000000; font-size: 13px;">Acceso
                                                                            Gratis a Programa Superior</span></span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1.700,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1.700,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">1</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">3.400,00 €</span><br><a
                                                                        href="https://www.eadic-becas.com/producto/op4_teuesead_r1700c1i1700/"
                                                                        target="_blank" rel="noopener"><span
                                                                            style="color: #003da6;">(Clic para
                                                                            pagar)</span></a></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#ECECEC" align="center"><span
                                                                        style="color: #000000;">3 meses después del pago
                                                                        inicial</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><strong><span
                                                                            style="color: #003da6;"><a
                                                                                style="color: #003da6;"
                                                                                href="https://www.eadic-becas.com/producto/opcion5ui1950/"
                                                                                target="_blank"
                                                                                rel="noopener"><strong>OPCIÓN
                                                                                    5</strong></a></span></strong><br><span
                                                                        style="color: #000000; font-size: 13px;">Acceso
                                                                        Gratis a Programa Superior | Descuento
                                                                        Extra</span></th>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">3.350,00 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">0 €</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">0</span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">3.350,00 €</span><br><span
                                                                        style="color: #003da6;"><a
                                                                            style="color: #003da6;"
                                                                            href="https://www.eadic-becas.com/producto/ui3350/"
                                                                            target="_blank" rel="noopener">(Clic para
                                                                            pagar)</a></span></td>
                                                                <td style="text-align: center;" valign="middle"
                                                                    bgcolor="#f3f3f3" align="center"><span
                                                                        style="color: #000000;">Contado (Ahorra 50
                                                                        €)</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>
                                    </div>



                                </div>









                            </div>


                        </div>



                        <div class="row">


                        </div>


                    </div>


                    <div class="card-footer">
                       <a href="{{ route('resumen') }}"><button type="button" class="btn btn-success float-right">Ver tu resumen de admisión</button>  </a>  
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
        .callout a:hover {
	color: #003DA6 ;
}

    </style>
@stop

@section('js')

    <script>
        $("#llamameahora").click(function() {

            $("#netelip_c2c_button0").css("display", "none");
            $("#llamdasdiv").css("display", "block");
            $("#netelip_form_c2c0").css("display", "block");
        });




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

    </script>

@stop
