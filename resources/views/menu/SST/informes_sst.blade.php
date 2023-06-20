@extends('home.home')
@section('content')
    <section class="section">

        <div class="card card-spacing">

            <div class="card-title">
                <div class="row titulo title-background"><span>Informes entregas SST</span></div>
            </div>
            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="card-title">
                    <div class="row title title-background"><span>Cantidad de articulos total en un rango de fecha</span>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Correo Contacto-->
                        <div class="form-floating">
                            <input type="date" name="fecha_inicial_i1" id="fecha_inicial_i1" class="form-control"
                                required />
                            <label for="floatingInput">Fecha inicial:</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Telefono Contacto -->
                        <div class="form-floating">
                            <input type="date" name="fecha_final_i1" id="fecha_final_i1" class="form-control" required />
                            <label for="floatingInput">Fecha final:</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3 d-flex align-items-center">
                        <div class=" buttons_d ">
                            <button type="button" class="btn btn-primary" name="boton_i1" id="boton_i1">
                                <span class="nav-text">
                                    Mostrar
                                </span>
                                <i class="fa-solid fa-eye fa-beat fa-lg"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <br>
                <div id="informe_1" style="width:100%; height:400px;" hidden></div>



            </div>
            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="card-title">
                    <div class="row title title-background"><span>Cantidad de articulos total en un rango de fecha</span>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <select class="js-example-basic-single" class="form-control" name="persona_id" id="persona_id"
                            required>
                            <option value="" disabled selected>-- Seleccione Funcionario --</option>
                            @foreach ($person as $jef)
                                <option value="{{ $jef->id }}">{{ $jef->nombre_funcionario }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Correo Contacto-->
                        <div class="form-floating">
                            <input type="date" name="fecha_inicial_i2" id="fecha_inicial_i2" class="form-control"
                                required />
                            <label for="floatingInput">Fecha inicial:</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Telefono Contacto -->
                        <div class="form-floating">
                            <input type="date" name="fecha_final_i2" id="fecha_final_i2" class="form-control" required />
                            <label for="floatingInput">Fecha final:</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3 d-flex align-items-center">
                        <div class=" buttons_d ">
                            <button type="button" class="btn btn-primary" name="boton_i2" id="boton_i2">
                                <span class="nav-text">
                                    Mostrar
                                </span>
                                <i class="fa-solid fa-eye fa-beat fa-lg"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <br>
                <div id="informe_2" style="width:100%; height:400px;" hidden></div>



            </div>

            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="card-title">
                    <div class="row title title-background"><span>Cantidad de articulos total en un rango de fecha</span>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <select class="js-example-basic-single" class="form-control" name="empresa_id" id="empresa_id"
                            required>
                            <option value="" disabled selected>-- Seleccione Funcionario --</option>
                            @foreach ($array as $jef)
                                <option value="{{ $jef }}">{{ $jef }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Correo Contacto-->
                        <div class="form-floating">
                            <input type="date" name="fecha_inicial_i3" id="fecha_inicial_i3" class="form-control"
                                required />
                            <label for="floatingInput">Fecha inicial:</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Telefono Contacto -->
                        <div class="form-floating">
                            <input type="date" name="fecha_final_i3" id="fecha_final_i3" class="form-control" required />
                            <label for="floatingInput">Fecha final:</label>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3 d-flex align-items-center">
                        <div class=" buttons_d ">
                            <button type="button" class="btn btn-primary" name="boton_i3" id="boton_i3">
                                <span class="nav-text">
                                    Mostrar
                                </span>
                                <i class="fa-solid fa-eye fa-beat fa-lg"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <br>
                <div id="informe_3" style="width:100%; height:400px;" hidden></div>



            </div>
            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="card-title">
                    <div class="row title title-background"><span>Informe total stock disponible vs ocupado por
                            fecha</span>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <select class="js-example-basic-single" class="form-control" name="empresa_id4" id="empresa_id4"
                            required>
                            <option value="" disabled selected>-- Seleccione Articulo --</option>
                            @foreach ($array as $jef)
                                <option value="{{ $jef }}">{{ $jef }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Correo Contacto-->
                        <div class="form-floating">
                            <input type="date" name="fecha_inicial_i4" id="fecha_inicial_i4" class="form-control"
                                required />
                            <label for="floatingInput">Fecha inicial:</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                        <!-- Telefono Contacto -->
                        <div class="form-floating">
                            <input type="date" name="fecha_final_i4" id="fecha_final_i4" class="form-control"
                                required />
                            <label for="floatingInput">Fecha final:</label>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3 d-flex align-items-center">
                        <div class=" buttons_d ">
                            <button type="button" class="btn btn-primary" name="boton_i4" id="boton_i4">
                                <span class="nav-text">
                                    Mostrar
                                </span>
                                <i class="fa-solid fa-eye fa-beat fa-lg"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <br>
                <div id="informe_4" style="width:100%; height:400px;" hidden></div>



            </div>


        </div>


    </section>
@endsection
