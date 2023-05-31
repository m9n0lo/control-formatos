@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">
            <div class="card-title">
                <div class="row titulo title-background"><span>Articulos SST</span></div>
            </div>

            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="row">

                    <div class="row d-flex justify-content-center">
                        {{--  Articulos --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                            <div class="form-floating">
                                <input required="" type="text" name="nombre_a_i_sst" id="nombre_a_i_sst"
                                    class="form-control" required>
                                <label class="user-label">Nombre articulo:</label>
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
                            <div class="form-floating">
                                <input required="" type="text" name="sede_i_sst" id="sede_i_sst" class="form-control"
                                    value="" required>
                                <label class="user-label">Sede:</label>
                            </div>
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
                            <button type="submit" class="btn btn-primary" name="boton_a_sst" id="boton_a_sst">
                                <span class="nav-text">
                                    Añadir
                                </span>
                                <i class="fa-solid fa-eye fa-beat fa-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                        <table id="tabla_art_sst" class="table " style="width: 100%">
                            <thead>
                                <tr>

                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Nombre articulo</th>
                                    <th style="text-align: center">Cantidad</th>
                                    <th style="text-align: center">Sede</th>
                                    <th style="text-align: center">Fecha ingreso</th>
                                    <th style="text-align: center">Observaciones</th>

                                </tr>
                            </thead>

                        </table>
                    </div>
                    {{-- BOTON SELECCIONAR --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1 d-flex justify-content-end">
                        <div class=" buttons_d ">
                            <button type="submit" class="btn btn-success" name="boton_a_sst" id="boton_a_sst">
                                <span class="nav-text">
                                    Confirmar
                                </span>
                                <i class="fa-sharp fa-light fa-box-check fa-bounce fa-lg"></i>
                            </button>
                        </div>
                        <div class=" buttons_d ">
                            <button type="submit" class="btn btn-danger" name="boton_a_sst" id="boton_a_sst">
                                <span class="nav-text">
                                    Cancelar
                                </span>
                                <i class="fa-sharp fa-solid fa-box-check fa-bounce fa-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
