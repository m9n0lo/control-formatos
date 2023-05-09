@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">
            <div class="card-title">
                <div class="row titulo title-background"><span>Entrega de elementos de proteccion personal</span></div>
            </div>
            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="row">
                    {{--  Nombre persona --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">

                            <select class="js-example-basic-single" class="form-control" name="persona_id_sst"
                                id="persona_id_sst" required>
                                <option value="" disabled selected>-- Seleccione Operario --</option>
                                @foreach ($person as $jef)
                                    <option value="{{ $jef->id }}">{{ $jef->nombre_funcionario }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Fecha Entrega --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="fecha_entrega" id="fecha_entrega"
                                class="form-control">
                            <label class="user-label">Fecha Entrega:</label>
                        </div>
                    </div>
                    {{-- BOTON SELECCIONAR --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3 d-flex align-items-start">
                        <div class=" buttons_d ">
                            <button type="button" class="btn btn-primary" name="boton_operario" id="boton_operario">
                                <span class="nav-text">
                                    Agregar
                                </span>
                                <i class="fa-sharp fa-solid fa-circle-arrow-right fa-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded div_registro " id="div_registro"
                style="display: none">
                <div class="row">
                    {{-- Articulos --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">

                            <select class="js-example-basic-single" class="form-control" name="articulos_sst"
                                id="articulos_sst" required>
                                <option value="" disabled selected>-- Seleccione Articulo --</option>
                                @foreach ($articulos as $art)
                                    <option value="{{ $art->id }}">{{ $art->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    {{-- Cantidad --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="otro" id="otro" class="form-control">
                            <label class="user-label">Cantidad:</label>
                        </div>
                    </div>
                    {{-- BOTON AGREGAR ARTICULO --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3 d-flex align-items-start">
                        <div class=" buttons_d ">
                            <button type="button" class="btn btn-success" name="boton_operario" id="boton_operario">
                                <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="row">


                    {{-- Observaciones --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="observaciones" id="observaciones"
                                class="form-control">
                            <label class="user-label">Observaciones:</label>
                        </div>
                    </div>

                    {{-- Firma Recibido --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="firma_recibido" id="firma_recibido"
                                class="form-control">
                            <label class="user-label">Firma Recibido:</label>
                        </div>
                    </div>

                    {{-- Firma SGSST --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="cargo" id="cargo " class="form-control">
                            <label class="user-label">Firma SGSST:</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
