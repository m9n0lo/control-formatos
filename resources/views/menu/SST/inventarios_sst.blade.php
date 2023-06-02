@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">
            <div class="card-title">
                <div class="row titulo title-background"><span>Inventario SST</span></div>
            </div>

            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="row">
                    <form id="inventario_sst_form" action="post">

                        <div class="row d-flex justify-content-center">
                            {{--  Articulos --}}
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                <div class="form-floating">
                                    <select class="js-example-basic-single" class="form-control" name="nombre_a_i_sst"
                                        id="nombre_a_i_sst" required>
                                        <option value="" disabled selected>-- Seleccione Articulo --</option>
                                        @foreach ($articulos as $arti)
                                            <option value="{{ $arti->id }}">{{ $arti->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- Cantidad Disponible --}}
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                <div class="form-floating">
                                    <input required="" type="text" name="cantidad_i_sst" id="cantidad_i_sst"
                                        class="form-control" value="" required>
                                    <label class="user-label">Cantidad:</label>
                                </div>
                            </div>
                            {{-- Sede --}}
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                <select class="js-example-basic-single" class="form-control" name="sede_i_sst"
                                    id="sede_i_sst" required>
                                    <option value="" disabled selected>-- Seleccione Funcionario --</option>
                                    @foreach ($array as $jef)
                                        <option value="{{ $jef }}">{{ $jef }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            {{-- Fecha ingreso --}}
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                <div class="form-floating">
                                    <input required="" type="date" name="fecha_ingreso_i_sst" id="fecha_ingreso_i_sst"
                                        class="form-control" value="" required>
                                    <label class="user-label">Fecha ingreso:</label>
                                </div>
                            </div>
                            {{-- Observaciones --}}
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                <div class="form-floating">
                                    <input required="" type="text" name="observaciones_i_sst" id="observaciones_i_sst"
                                        class="form-control" value="" required>
                                    <label class="user-label">Observaciones:</label>
                                </div>
                            </div>
                        </div>
                        {{-- BOTON SELECCIONAR --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1 d-flex justify-content-end"
                            style="width: 85.7%">
                            <div class=" buttons_d ">
                                <button type="button" class="btn btn-success" name="boton_a_sst"
                                    id="boton_a_sst">
                                    <span class="nav-text">
                                        Añadir
                                    </span>
                                    <i class="fa-solid fa-briefcase-medical fa-beat fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                        <table id="tabla_art_sst" class="table " style="width: 100%">
                            <thead>
                                <tr>


                                    <th style="text-align: center">Nombre articulo</th>
                                    <th style="text-align: center">Cantidad</th>
                                    <th style="text-align: center">Sede</th>
                                    <th style="text-align: center">Fecha ingreso</th>
                                    <th style="text-align: center">Observaciones</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    {{-- BOTON SELECCIONAR --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1 d-flex justify-content-end">
                        <div class=" buttons_d ">
                            <button type="submit" onclick="guardarEnBD()"class="btn btn-success" name="boton_a_sst"
                                id="boton_a_sst">
                                <span class="nav-text">
                                    Confirmar
                                </span>
                                <i class="fa-solid fa-check-to-slot fa-bounce fa-lg"></i>
                            </button>
                        </div>

                        <div class=" buttons_d ">
                            <button type="submit" class="btn btn-danger" name="boton_a_sst" id="boton_a_sst">
                                <span class="nav-text">
                                    Cancelar
                                </span>
                                <i class="fa-solid fa-trash-can fa-shake fa-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
