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

                            <select class="js-example-basic-single" class="form-control" name="persona_id" id="persona_id"
                                required>
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
                            <button type="button" class="btn btn-primary" name="gestion_rqs" id="gestion_rqs">
                                <span class="nav-text">
                                    Seleccionar
                                </span>
                                <i class="fa-sharp fa-solid fa-circle-arrow-right fa-lg"></i>
                            </button>
                        </div>
                    </div>
                    <table id="tabla_articulos" class="table " style="width:100%">
                        <thead>

                            <tr>
                                <th></th>
                                @foreach ($articulos as $ar)
                                    <th> {{ $ar->descripcion }}(Und)</th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody>
                            <th>
                                @foreach ($articulos as $ar)
                            <th><input type='text' class='form-control'></th>
                            @endforeach
                            </tr>
                        </tbody>

                    </table>
                    {{-- Otro --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="otro" id="otro" class="form-control">
                            <label class="user-label">Otro:</label>
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
                    {{-- Observaciones --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="observaciones" id="observaciones"
                                class="form-control">
                            <label class="user-label">Observaciones:</label>
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
