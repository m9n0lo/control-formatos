@extends('home.home')
@section('content')
    <section class="section">

        <div class="card card-spacing">
            <div class="card-title">
                <div class="row titulo title-background"><span>Solicitud RQS</span></div>
            </div>
            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="card-title">
                    <div class="row title"><span>Datos Solicitante</span></div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Area: -->
                        <div class="form-floating">
                            <input type="text" name="area" id="area" class="form-control" required />
                            <label for="floatingInput">Area</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Solicitado_por: -->
                        <div class="form-floating">
                            <input type="text" name="solicitado_por" id="solicitado_por" class="form-control" required />
                            <label for="floatingInput">Solicitado Por</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Fecha_Elaboracion -->
                        <div class="form-floating">
                            <input type="date" name="fecha_elaboracion" id="fecha_elaboracion" class="form-control"
                                required value="<?php echo date('Y-m-d'); ?>" disabled />
                            <label for="floatingInput">Fecha Elaboracion</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Jefe_Inmediato -->
                        <div class="form-floating">
                            <input type="text" name="jefe_inmediato" id="jefe_inmediato" class="form-control" required />
                            <label for="floatingInput">Jefe Inmediato</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Fecha_Solicitud -->
                        <div class="form-floating">
                            <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control" required
                                value="<?php echo date('Y-m-d'); ?>" disabled />
                            <label for="floatingInput">Fecha Solicitud</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Entrega_Esperada -->
                        <div class="form-floating">
                            @php
                                $fecha_actual = \Carbon\Carbon::now();
                                // sumar 8 días a la fecha actual
                                $nueva_fecha = $fecha_actual->addDays(8);

                            @endphp
                            <input type="text" name="entrega_esperada" id="entrega_esperada" class="form-control"
                                required value="<?php echo $nueva_fecha->format('d / m / Y'); ?>" disabled />
                            <label for="floatingInput">Fecha Esperada</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Tipo_Solicitud -->
                        <div class="form-floating">
                            <input type="text" name="tipo_solicitud" id="tipo_solicitud" class="form-control" required />
                            <label for="floatingInput">Tipo Solicitud</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Sede -->
                        <div class="form-floating">
                            <input type="text" name="sede" id="sede" class="form-control" required />
                            <label for="floatingInput">Sede</label>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            {{-- INICIO SEGUNDO CARD BODY --}}
            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="card-title">
                    <div class="row title"><span>Acreedores Propuestos</span></div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Razon Social -->
                        <div class="form-floating">
                            <input type="text" name="nombre_equipo" id="nombre_equipo" class="form-control" required />
                            <label for="floatingInput">Nombre Equipo</label>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Correo Contacto-->
                        <div class="form-floating">
                            <input type="text" name="nombre_equipo" id="nombre_equipo" class="form-control" required />
                            <label for="floatingInput">Nombre Equipo</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Telefono Contacto -->
                        <div class="form-floating">
                            <input type="text" name="nombre_equipo" id="nombre_equipo" class="form-control" required />
                            <label for="floatingInput">Nombre Equipo</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
