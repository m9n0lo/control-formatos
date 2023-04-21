@extends('home.home')
@section('content')
    <section class="section">

        @if ($compra->estado == 3 || $compra->estado == 2)
            <fieldset disabled>
        @endif
        <div class="card card-spacing">
            <div class="card-title">
                <div class="row titulo title-background"><span>{{ 'Detalle RQS - ' . $compra->id }}</span></div>
            </div>
            <div class="card-title d-flex justify-content-end">
                <div class="row title " style="margin-bottom: 5px">
                    @if ($compra->estado == 1)
                        <h3 class="estado_rqs " style="background-color: #e6c317">Pendiente</h3>
                    @elseif ($compra->estado == 2)
                        <h3 class="estado_rqs"style="background-color: green">
                            {{ 'Aprobado - ' . $compra->users_autorizado->name }}</h3>
                    @elseif ($compra->estado == 3)
                        <h3 class="estado_rqs"style="background-color: #e9003d">
                            {{ 'Rechazado - ' . $compra->users_autorizado->name }}</h3>
                    @endif


                </div>
            </div>
            <form id="DetalleRQS" action="{{ url("/Compras/dashboard/detalle/{$compra->id}/update") }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
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
                                    value="{{ $compraNombreU }}" class="form-control" disabled />
                                <label for="floatingInput">Solicitado Por</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Fecha_Elaboracion -->
                            <div class="form-floating">
                                <input type="date" name="fecha_elaboracion" id="fecha_elaboracion_DRQS"
                                    class="form-control" value="{{ $compra->fecha_elaboracion }}" disabled />
                                <label for="floatingInput">Fecha Elaboracion</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Jefe_Inmediato -->
                            <select class="js-example-basic-single" class="form-control" name="persona_id" id="persona_id"
                                required>
                                <option selected>{{ $compraNombreP }}</option>
                                @foreach ($jefe as $jef)
                                    <option value="{{ $jef->id }}">{{ $jef->nombre_funcionario }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Fecha_Solicitud -->
                            <div class="form-floating">
                                <input type="date" name="fecha_solicitud" id="fecha_solicitud_DRQS" class="form-control"
                                    value="{{ $compra->fecha_solicitud }}" disabled />
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
                        {{-- RAZON SOCIAL --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Razon Social -->
                            <div class="form-floating">
                                <input type="text" name="razon_social" id="razon_social_DRQS"
                                    value="{{ $compra->razon_social }}" class="form-control" />
                                <label for="floatingInput">Razon Social</label>
                            </div>
                        </div>

                        {{-- CORREO CONTACTO --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Correo Contacto-->
                            <div class="form-floating">
                                <input type="text" name="correo_contacto" value="{{ $compra->correo_electronico }}"
                                    id="correo_contacto_DRQS" class="form-control" />
                                <label for="floatingInput">Correo Contacto</label>
                            </div>
                        </div>

                        {{-- TELEFONO CONTACTO --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <!-- Telefono Contacto -->
                            <div class="form-floating">
                                <input type="text" pattern="[0-9]+" title="Ingrese solo números"
                                    name="telefono_contacto" value="{{ $compra->telefono_contacto }}"
                                    id="telefono_contacto_DRQS" class="form-control" />
                                <label for="floatingInput">Telefono Contacto </label>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- CARD BODY SERVICIOS --}}
                <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                    <div class="card-title">
                        <div class="row title"><span>Servicios</span></div>
                    </div>

                    {{-- TABLA SERVICIOS  --}}
                    <table id="tabla_detalleRQS" class="table " style="width:100%">
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
                            @php
                                $datos = json_decode($datosJson, true);
                            @endphp

                            @foreach ($datos as $servicio)
                                <tr>

                                    <td> <input type="text" name="descripcion_servicio[]" id="detalle_solicitud"
                                            class="form-control" value="{{ $servicio['descripcion_servicio'] }}" /></td>
                                    <td> <input type="text" name="centro_servicio[]" id="detalle_solicitud"
                                            class="form-control" value="{{ $servicio['centro_servicio'] }}" /></td>
                                    <td> <input type="text" name="area_servicio[]" id="detalle_solicitud"
                                            class="form-control" value="{{ $servicio['area_servicio'] }}" /></td>
                                    <td> <input type="text" name="cantidad_servicio[]" id="detalle_solicitud"
                                            class="form-control" value="{{ $servicio['cantidad_servicio'] }}"
                                            pattern="[0-9]+" title="Ingrese solo números" /></td>
                                    <td> <input type="text" name="um_servicio[]" id="detalle_solicitud"
                                            class="form-control" value="{{ $servicio['um_servicio'] }}" /></td>
                                    <td> <input type="text" name="observacion_servicio[]" id="detalle_solicitud"
                                            class="form-control" value="{{ $servicio['observacion_servicio'] }}" /></td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                    <div class="row">
                        {{-- DETALLE SOLICITUD --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                            <!-- Detalle Solicitud -->
                            <div class="form-floating">
                                <input type="text" name="detalle_solicitud" id="detalle_solicitud_DRQS"
                                    class="form-control" value="{{ $compra->detalle_solicitud }}" />
                                <label for="floatingInput">Detalle Solicitud</label>
                            </div>
                        </div>
                        {{-- COSTO ESTIMADO --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                            <!-- Costo Estimado Total -->
                            <div class="form-floating">
                                <input type="text" pattern="[0-9]+" title="Ingrese solo números"
                                    name="costo_estimado" id="costo_estimado_DRQS" class="form-control"
                                    value="{{ $compra->costo_estimado }}" />
                                <label for="floatingInput">Costo Estimado Total</label>
                            </div>
                        </div>
                    </div>

                </div>
                @if ($compra->estado == 3 || $compra->estado == 2)
                    </fieldset>
                @endif

                <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                    <div class="card-title">
                        <div class="row title"><span>Cotizaciones</span></div>
                    </div>
                    <div class="row">
                        @if (empty($compra->cotizacion1))
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4  mt-3">
                                <!-- Detalle Solicitud -->
                                <div class="input-group">
                                    <span class="input-group-text">Cotizacion 1:</span>
                                    <div class="form-control Neon Neon-theme-dragdropbox">
                                        <div class="Neon-input-dragDrop">
                                            <input name="cotizacion1" id="filer_input2" class="form-control"
                                                type="file" accept="image/jpeg,image/png/,.pdf"
                                                @if ($compra->estado == 2) required @endif>

                                            <div class="Neon-input-inner">
                                                <div class="Neon-input-icon"></div>
                                                <div class="Neon-input-text">
                                                    <h3>Seleccione la cotizacion</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4 mt-3">

                                <a class="button" href="{{ asset($compra->cotizacion1) }}" target="_blank"
                                    name="cotizacion1"
                                    style="color:black; text-decoration:none; margin: 10px 10px 10px 0;">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    <span class="nav-text">Visualizar PDF</span>
                                </a>
                            </div>
                        @endif
                        @if (empty($compra->cotizacion2))
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                <!-- Costo Estimado Total -->
                                <div class="input-group">
                                    <span class="input-group-text">Cotizacion 2:</span>
                                    <div class="form-control Neon Neon-theme-dragdropbox">
                                        <div class="Neon-input-dragDrop">
                                            <input name="cotizacion2" id="filer_input2" class="form-control"
                                                type="file" accept="image/jpeg,image/png/,.pdf"
                                                @if ($compra->estado == 2) required @endif>

                                            <div class="Neon-input-inner">
                                                <div class="Neon-input-icon"></div>
                                                <div class="Neon-input-text">
                                                    <h3>Seleccione la cotizacion</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4 mt-3">
                                <a class="button" name="cotizacion2" href="{{ asset($compra->cotizacion2) }}"
                                    target="_blank" style="color:black; text-decoration:none; margin: 10px 10px 0;">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    <span class="nav-text">Visualizar PDF</span>
                                </a>
                            </div>
                        @endif
                        @if (empty($compra->cotizacion3))
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                <!-- Costo Estimado Total -->
                                <div class="input-group">
                                    <span class="input-group-text">Cotizacion 3:</span>
                                    <div class="form-control Neon Neon-theme-dragdropbox">
                                        <div class="Neon-input-dragDrop">
                                            <input name="cotizacion3" id="filer_input2" class="form-control"
                                                type="file" accept="image/jpeg,image/png/,.pdf"
                                                @if ($compra->estado == 2) required @endif>

                                            <div class="Neon-input-inner">
                                                <div class="Neon-input-icon"></div>
                                                <div class="Neon-input-text">
                                                    <h3>Seleccione la cotizacion</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @else
                            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4 mt-3">
                                <a class="button" name="cotizacion3" href="{{ asset($compra->cotizacion3) }}"
                                    target="_blank" style="color:black; text-decoration:none; margin: 510x  10px 10px 0;">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    <span class="nav-text">Visualizar PDF</span>
                                </a>
                            </div>
                        @endif


                    </div>
                    @if ($compra->estado == 2 || $compra->estado == 3)
                    @else
                        <div class="card-footer bg-transparent  d-flex  justify-content-end" style="margin-top: 10px">


                            <div class=" buttons_d">
                                <button type="submit" class="btn btn-warning" style="margin-bottom: 3px">
                                    <i class="fa-solid fa-file-pen fa-lg"></i>
                                    <span class="nav-text">
                                        Editar RQS
                                    </span>
                                </button>
                            </div>

                            <div class="buttons_d">
                                <button type="button" class="btn btn-success "
                                    data-bs-toggle="modal"style="margin-bottom: 3px" data-bs-target="#AprobarRQS">
                                    <i class="fa-solid fa-circle-check fa-lg"></i>
                                    <span class="nav-text">
                                        Aprobar RQS
                                    </span>
                                </button>
                            </div>

                            <div class="buttons_d">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    style="margin-bottom: 3px" data-bs-target="#RechazarRQS">
                                    <i class="fa-solid fa-rectangle-xmark fa-lg"></i>
                                    <span class="nav-text">
                                        Rechazar RQS
                                    </span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($compra->estado == 2 && $compra->estado_gestion == 1)
                        <div class="card-footer bg-transparent  d-flex  justify-content-end" style="margin-top: 10px">
                            <div class=" buttons_d">
                                <button type="button" class="btn btn-primary" name="gestion_rqs" id="gestion_rqs"
                                    style="margin-bottom: 3px" onclick="validarFormulario(event)">
                                    <span class="nav-text">
                                        Continuar
                                    </span>
                                    <i class="fa-sharp fa-solid fa-circle-arrow-right fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    @else
                    @endif
                </div>

            </form>

            {{-- TABLA DE HISTORIAL DE CAMBIOS --}}
            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <table class="table " style="width:100%">
                    <thead>
                        <tr>

                            <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1 mt-3">#</th>
                            <th class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mt-3">Estado</th>
                            <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mt-3">Descripcion</th>
                            <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mt-3">Responsable y Fecha</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach ($c_history as $ch)
                            <tr>

                                <td> {{ $contador }}</td>

                                @if ($ch->estado == 1)
                                    <td>RQS Aprobado</td>
                                @elseif ($ch->estado == 2)
                                    <td>RQS Rechazada</td>
                                @elseif ($ch->estado == 3)
                                    <td>En gestion - compras</td>
                                @elseif ($ch->estado == 4)
                                    <td>Modificacion exitosa</td>
                                @endif

                                @if ($ch->descripcion == 1)
                                    <td> SE ANULA POR ERROR DE DIGITACION</td>
                                @elseif ($ch->descripcion == 2)
                                    <td> SE ANULA POR DUPLICADO</td>
                                @elseif ($ch->descripcion == 3)
                                    <td> SE ANULA POR PROBLEMAS DE CONFIGURACION</td>
                                @elseif ($ch->descripcion == 4)
                                    <td> SE ANULA POR PROBLEMAS DE CONSECUTIVO</td>
                                @elseif ($ch->descripcion == 5)
                                    <td> RECLASIFICACION DE BANCO</td>
                                @elseif ($ch->descripcion == 6)
                                    <td> PAGO NO APLICADO POR EL BANCO</td>
                                @else
                                    <td>{{ $ch->descripcion }}</td>
                                @endif
                                <td> {{ $ch->responsable }} - {{ $ch->fecha_cambio }}</td>


                            </tr>
                            @php
                                $contador++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        {{-- MODAL DE CONTINUAR RQS --}}
        <div class="modal fade" id="continuarRQS" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Desea continuar con la RQS?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST"action="{{ url("/Compras/dashboard/detalle/{$compra->id}") }}">
                        @csrf
                        @method('POST')
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">RQS:</label>
                                <input type="text" class="form-control" id="RQS_continuar" name="RQS_continuar"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-succes">Continuar</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>

        {{-- MODAL DE RECHAZO RQS --}}
        <div class="modal fade" id="RechazarRQS" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Desea Cancelar la RQS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST"action="{{ url("/Compras/dashboard/{$compra->id}/detalle/") }}">
                        @csrf
                        @method('POST')
                        <div class="modal-body">


                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Motivo:</label>
                                <select class="form-select" aria-label="Default select example" id="motivo_rechazo"
                                    name="motivo_rechazo" required>
                                    <option>Seleccione una opcion </option>
                                    <option value="1">SE ANULA POR ERROR DE DIGITACION</option>
                                    <option value="2">SE ANULA POR DUPLICADO</option>
                                    <option value="3">SE ANULA POR PROBLEMAS DE CONFIGURACION</option>
                                    <option value="4">SE ANULA POR PROBLEMAS DE CONSECUTIVO</option>
                                    <option value="5">RECLASIFICACION DE BANCO</option>
                                    <option value="6">PAGO NO APLICADO POR EL BANCO</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" id="apr_decl_rqs" name="apr_decl_rqs" class="btn btn-danger"
                                value="3">Confirmar</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>

        {{-- MODAL APROBADO RQS --}}
        <div class="modal fade modal-xl modal-dialog-scrollable" id="AprobarRQS" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="d-inline-flex " method="POST"
                    action="{{ url("/Compras/dashboard/{$compra->id}/detalle/") }}">
                    @csrf
                    @method('POST')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Resumen Aprobado</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <table id="tabla_detalleRQS" class="table " style="width:100%">
                                <thead style="background: rgb(74, 193, 248)">
                                    <tr>

                                        <th>Descripcion</th>
                                        <th>Centro Costo</th>
                                        <th>Area</th>
                                        <th>Cantidad</th>
                                        <th>Cantidad Aprobada</th>
                                        <th>U.M.</th>
                                        <th>Observacion</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $datos = json_decode($datosJson, true);
                                    @endphp

                                    @foreach ($datos as $servicio)
                                        <tr>

                                            <td> <input type="text" name="descripcion_servicio[]"
                                                    id="detalle_solicitud" class="form-control"
                                                    value="{{ $servicio['descripcion_servicio'] }}" disabled />
                                            </td>
                                            <td> <input type="text" name="centro_servicio[]" id="detalle_solicitud"
                                                    class="form-control" value="{{ $servicio['centro_servicio'] }}"
                                                    disabled />
                                            </td>
                                            <td> <input type="text" name="area_servicio[]" id="detalle_solicitud"
                                                    class="form-control" value="{{ $servicio['area_servicio'] }}"
                                                    disabled />
                                            </td>
                                            <td> <input type="text" name="cantidad_servicio[]" id="detalle_solicitud"
                                                    class="form-control" value="{{ $servicio['cantidad_servicio'] }}"
                                                    disabled />
                                            </td>
                                            <td> <input type="text" name="cantidad_aprobada[]" id="detalle_solicitud"
                                                    class="form-control" value="{{ $servicio['cantidad_servicio'] }}" />
                                            </td>
                                            <td> <input type="text" name="um_servicio[]" id="detalle_solicitud"
                                                    class="form-control" value="{{ $servicio['um_servicio'] }}"
                                                    disabled /></td>
                                            <td> <input type="text" name="observacion_servicio[]"
                                                    id="detalle_solicitud" class="form-control"
                                                    value="{{ $servicio['observacion_servicio'] }}" disabled />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                {{-- DETALLE SOLICITUD --}}
                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <!-- Detalle Solicitud -->
                                    <div class="form-floating">
                                        <input type="text" name="detalle_solicitud" id="detalle_solicitud_DRQS"
                                            class="form-control" value="{{ $compra->detalle_solicitud }}" disabled />
                                        <label for="floatingInput">Detalle Solicitud</label>
                                    </div>
                                </div>
                                {{-- COSTO ESTIMADO --}}
                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <!-- Costo Estimado Total -->
                                    <div class="form-floating">
                                        <input type="text" pattern="[0-9]+" title="Ingrese solo números"
                                            name="costo_aprobado" id="costo_aprobado_DRQS" class="form-control "
                                            value="{{ $compra->costo_estimado }}" />
                                        <label for="floatingInput">Costo Aprobado Total</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="apr_rqs" name="apr_rqs" class="btn btn-success"
                                value="2">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>




    </section>
@endsection
