@extends('home.home')
@section('content')
    <script src="{{ asset('sitio/js/app_compras.js') }}"></script>
    <section class="section">

        <div class="card card-spacing">
            <form method="post" id="sample_form" class="form-horizontal">
                <div class="card-title">
                    <div class="row titulo title-background"><span>Solicitud RQS</span></div>
                </div>
                <div class="card-title d-flex justify-content-end">
                    <div class="row title  " style="margin-bottom: 5px">
                        <h3 style="background-color: yellow">Pendiente</h3>
                    </div>
                </div>
                <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                    <div class="card-title">
                        <div class="row title"><span>Datos Solicitante</span></div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Area: -->
                            <div class="form-floating">
                                <input type="text" name="area" id="area_DRQS" class="form-control"
                                    value="{{ $compra->area }}" />
                                <label for="floatingInput">Area</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Solicitado_por: -->
                            <div class="form-floating">
                                <input type="text" name="solicitado_por" id="solicitado_por_DRQS"
                                    value="{{ $compra->solicitado_por }}" class="form-control" />
                                <label for="floatingInput">Solicitado Por</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Fecha_Elaboracion -->
                            <div class="form-floating">
                                <input type="date" name="fecha_elaboracion" id="fecha_elaboracion_DRQS"
                                    class="form-control" value="{{ $compra->fecha_elaboracion }}" />
                                <label for="floatingInput">Fecha Elaboracion</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Jefe_Inmediato -->
                            <div class="form-floating">
                                <input type="text" name="jefe_inmediato" id="jefe_inmediato_DRQS"
                                    value="{{ $compraNombre }}" class="form-control" />
                                <label for="floatingInput">Jefe Inmediato</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Fecha_Solicitud -->
                            <div class="form-floating">
                                <input type="date" name="fecha_solicitud" id="fecha_solicitud_DRQS" class="form-control"
                                    value="{{ $compra->fecha_solicitud }}" />
                                <label for="floatingInput">Fecha Solicitud</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Entrega_Esperada -->
                            <div class="form-floating">
                                <input type="date" name="entrega_esperada" id="entrega_esperada_DRQS"
                                    class="form-control" value="{{ $compra->fecha_esperada }}" />
                                <label for="floatingInput">Fecha Esperada</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Tipo_Solicitud -->
                            <div class="form-floating">
                                <input type="text" name="tipo_solicitud" id="tipo_solicitud_DRQS"
                                    value="{{ $compra->tipo_solicitud }}" class="form-control" />
                                <label for="floatingInput">Tipo Solicitud</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Sede -->
                            <div class="form-floating">
                                <input type="text" name="sede" id="sede_DRQS" value="{{ $compra->sede }}"
                                    class="form-control" />
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
                                <input type="text" name="razon_social" id="razon_social_DRQS"
                                    value="{{ $compra->razon_social }}" class="form-control" />
                                <label for="floatingInput">Razon Social</label>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Correo Contacto-->
                            <div class="form-floating">
                                <input type="text" name="correo_contacto" value="{{ $compra->correo_electronico }}"
                                    id="correo_contacto_DRQS" class="form-control" />
                                <label for="floatingInput">Correo Contacto</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Telefono Contacto -->
                            <div class="form-floating">
                                <input type="text" name="telefono_contacto" value="{{ $compra->telefono_contacto }}"
                                    id="telefono_contacto_DRQS" class="form-control" />
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

                                <th>Descripcion</th>
                                <th>Centro Costo</th>
                                <th>Area</th>
                                <th>Cantidad</th>
                                <th>U.M.</th>
                                <th>Observacion</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud"
                                        class="form-control" value="prueba" /></td>
                                <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud"
                                        class="form-control" value="prueba" /></td>
                                <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud"
                                        class="form-control" value="prueba" /></td>
                                <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud"
                                        class="form-control" value="prueba" /></td>
                                <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud"
                                        class="form-control" value="prueba" /></td>
                                <td> <input type="text" name="detalle_solicitud" id="detalle_solicitud"
                                        class="form-control" value="prueba" /></td>
                            </tr>

                        </tbody>

                    </table>
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                            <!-- Detalle Solicitud -->
                            <div class="form-floating">
                                <input type="text" name="detalle_solicitud" id="detalle_solicitud_DRQS"
                                    class="form-control" value="{{ $compra->detalle_solicitud }}" />
                                <label for="floatingInput">Detalle Solicitud</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                            <!-- Costo Estimado Total -->
                            <div class="form-floating">
                                <input type="text" name="costo_estimado" id="costo_estimado_DRQS"
                                    class="form-control" value="{{ $compra->costo_estimado }}" />
                                <label for="floatingInput">Costo Estimado Total</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                        <div class="card-title">
                            <div class="row title"><span>Cotizaciones</span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4  mt-3">
                                <!-- Detalle Solicitud -->
                                <div class="input-group">
                                    <span class="input-group-text">Firmar a continuación:</span>
                                    <div class="form-control Neon Neon-theme-dragdropbox">
                                        <div class="Neon-input-dragDrop">
                                            <input name="cotizacion1" id="cotizacion1_DRQS"
                                                class="form-control filer_input2" type="file"
                                                accept="image/jpeg,image/png">

                                            <div class="Neon-input-inner">
                                                <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                                <div class="Neon-input-text">
                                                    <h3>Seleccione la firma</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                <!-- Costo Estimado Total -->
                                <div class="input-group">
                                    <span class="input-group-text">Firmar a continuación:</span>
                                    <div class="form-control Neon Neon-theme-dragdropbox">
                                        <div class="Neon-input-dragDrop">
                                            <input name="cotizacion2" id="cotizacion2_DRQS"
                                                class="form-control filer_input2" type="file"
                                                accept="image/jpeg,image/png">

                                            <div class="Neon-input-inner">
                                                <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                                <div class="Neon-input-text">
                                                    <h3>Seleccione la firma</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                <!-- Costo Estimado Total -->
                                <div class="input-group">
                                    <span class="input-group-text">Firmar a continuación:</span>
                                    <div class="form-control Neon Neon-theme-dragdropbox">
                                        <div class="Neon-input-dragDrop">
                                            <input name="cotizacion3" id="cotizacion3_DRQS"
                                                class="form-control filer_input2" type="file"
                                                accept="image/jpeg,image/png">

                                            <div class="Neon-input-inner">
                                                <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                                <div class="Neon-input-text">
                                                    <h3>Seleccione la firma</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
            </form>
    </section>
@endsection
