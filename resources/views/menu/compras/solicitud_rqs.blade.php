@extends('home.home')
@section('content')
    <script src="{{ asset('sitio/js/app_compras.js') }}"></script>
    <section class="section">

        <div class="card card-spacing">
            <form method="POST" action="{{ route('compras.solicitarrqs') }}" enctype="multipart/form-data"
                class="form-floating">
                @csrf
                <div class="card-title">
                    <div class="row titulo title-background"><span>REQUERIMIENTO DE CONTRATO DE SERVICIOS</span></div>
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
                                <input type="text" name="solicitado_por" id="solicitado_por" class="form-control"
                                    value="{{ auth()->user()->name }}" required />
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
                            <select class="js-example-basic-single" class="form-control" name="persona_id" id="persona_id"
                                required>
                                <option value="" disabled selected>-- Seleccione Jefe Inmediato --</option>
                                @foreach ($jefe as $jef)
                                    <option value="{{ $jef->id }}">{{ $jef->nombre_funcionario }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Fecha_Solicitud -->
                            <div class="form-floating">
                                <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control"
                                    required disabled value="<?php echo date('Y-m-d'); ?>" />
                                <label for="floatingInput">Fecha Solicitud</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Entrega_Esperada -->
                            <div class="form-floating">

                                <input type="date" name="fecha_esperada" id="fecha_esperada" class="form-control"
                                    required />
                                <label for="floatingInput">Fecha Esperada</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Tipo_Solicitud -->
                            <div class="form-floating">
                                <input type="text" name="tipo_solicitud" id="tipo_solicitud" class="form-control"
                                    required />
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
                                <input type="text" name="razon_social" id="razon_social" class="form-control" required />
                                <label for="floatingInput">Razon Social</label>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Correo Contacto-->
                            <div class="form-floating">
                                <input type="text" name="correo_contacto" id="correo_contacto" class="form-control"
                                    required />
                                <label for="floatingInput">Correo Contacto</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Telefono Contacto -->
                            <div class="form-floating">
                                <input type="text" name="telefono_contacto" id="telefono_contacto" class="form-control"
                                    required />
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
                    <div class="d-flex justify-content-end">
                        <a type="submit" type="button" id="addRow"class="btn btn-success"
                            style="margin-bottom: 3px">
                            <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>
                            <span class="nav-text">
                                Agregar
                            </span>
                        </a>
                        <a type="submit" type="button" id="removeRow"class="btn btn-danger"
                            style="margin-bottom: 3px">
                            <i class="fa-sharp fa-solid fa-circle-minus fa-lg"></i>
                            <span class="nav-text">
                                Eliminar
                            </span>
                        </a>
                    </div>

                    <table id="tabla_solicitudRQS" class="table table-bordered" style="width:100%">
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


                    </table>
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                            <!-- Detalle Solicitud -->
                            <div class="form-floating">
                                <input type="text" name="detalle_solicitud" id="detalle_solicitud"
                                    class="form-control" required />
                                <label for="floatingInput">Detalle Solicitud</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                            <!-- Costo Estimado Total -->
                            <div class="form-floating">
                                <input type="text" name="costo_estimado" id="costo_estimado" class="form-control"
                                    required />
                                <label for="floatingInput">Costo Estimado Total</label>
                            </div>
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
                                        <input name="cotizacion1" id="filer_input2" class="form-control" type="file"
                                            accept="image/jpeg,image/png/,.pdf">

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
                                        <input name="cotizacion2" id="filer_input2" class="form-control" type="file"
                                            accept="image/jpeg,image/png/,.pdf">

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
                                        <input name="cotizacion3" id="filer_input2" class="form-control" type="file"
                                            accept="image/jpeg,image/png/,.pdf">

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

                        <button  class="btn btn-success" id="guardar_RQS" name="guardar_RQS" value="Agregar" style="margin-bottom: 3px">
                            <i class="fa-solid fa-cart-plus fa-lg"></i>
                            <span class="nav-text">
                                Agregar RQS
                            </span>
                        </button>

                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection
