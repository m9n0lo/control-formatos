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
                            <input type="text" name="area" id="area" class="form-control" required disabled />
                            <label for="floatingInput">Area</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Solicitado_por: -->
                        <div class="form-floating">
                            <input type="text" name="solicitado_por" id="solicitado_por" class="form-control" required  disabled/>
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
                            <input type="text" name="jefe_inmediato" id="jefe_inmediato" class="form-control" required  disabled/>
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
                            <input type="text" name="tipo_solicitud" id="tipo_solicitud" class="form-control" required  disabled/>
                            <label for="floatingInput">Tipo Solicitud</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Sede -->
                        <div class="form-floating">
                            <input type="text" name="sede" id="sede" class="form-control" required  disabled/>
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
                            <input type="text" name="razon_social" id="razon_social" class="form-control" required  disabled/>
                            <label for="floatingInput">Razon Social</label>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Correo Contacto-->
                        <div class="form-floating">
                            <input type="text" name="correo_contacto" id="correo_contacto" class="form-control"
                                required  disabled/>
                            <label for="floatingInput">Correo Contacto</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <!-- Telefono Contacto -->
                        <div class="form-floating">
                            <input type="text" name="telefono_contacto" id="telefono_contacto" class="form-control"
                                required  disabled/>
                            <label for="floatingInput">Telefono Contacto </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="card-title">
                    <div class="row title"><span>Servicios</span></div>
                </div>
                <br>
                {{-- <div class="d-flex justify-content-end">
                    <a type="submit" type="button" class="btn btn-success" style="margin-bottom: 3px">
                        <i class="fa-thin fa-plus"></i>
                        <span class="nav-text">
                            Agregar
                        </span>
                    </a>
                </div> --}}

                <table id="tabla" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th >Descripcion</th>
                            <th >Centro Costo</th>
                            <th >Area</th>
                            <th >Cantidad</th>
                            <th >U.M.</th>
                            <th >Observacion</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud" class="form-control" value="prueba" disabled/></td>
                            <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud" class="form-control" value="prueba" disabled/></td>
                            <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud" class="form-control" value="prueba" disabled/></td>
                            <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud" class="form-control" value="prueba" disabled/></td>
                            <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud" class="form-control" value="prueba" disabled/></td>
                            <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud" class="form-control" value="prueba" disabled/></td>
                        </tr>

                    </tbody>

                </table>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                        <!-- Detalle Solicitud -->
                        <div class="form-floating">
                            <input type="text" name="detalle_solicitud" id="detalle_solicitud" class="form-control"
                                required disabled/>
                            <label for="floatingInput">Detalle Solicitud</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                        <!-- Costo Estimado Total -->
                        <div class="form-floating">
                            <input type="text" name="costo_estimado" id="costo_estimado" class="form-control"
                                required disabled/>
                            <label for="floatingInput">Costo Estimado Total</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-transparent  d-flex justify-content-end" style="margin-top: 10px">
                    <a type="submit" type="button" class="btn btn-danger" style="margin-bottom: 3px">
                        <i class="fa-solid fa-file-pen"></i>
                        <span class="nav-text">
                            Editar RQS
                        </span>
                    </a>

                </div>
            </div>
        </div>

    </section>
@endsection