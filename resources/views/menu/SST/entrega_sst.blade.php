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
                            <input required="" type="text" name="fecha_entrega_sst" id="fecha_entrega_sst"
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

                <div class="row" name="lista_articulos_sst" id="lista_articulos_sst">

                    <div class="d-flex justify-content-end">
                        <a type="submit" type="button" id="addRow"class="btn btn-success" style="margin-bottom: 3px">
                            <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>
                            <span class="nav-text">
                                Agregar
                            </span>
                        </a>
                        <a type="submit" type="button" id="removeRow"class="btn btn-danger" style="margin-bottom: 3px">
                            <i class="fa-sharp fa-solid fa-circle-minus fa-lg"></i>
                            <span class="nav-text">
                                Eliminar
                            </span>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <table id="tabla_articulos_sst" ">
                            <thead >
                                <tr>

                                    <th>Articulo</th>
                                    <th>Cantidad</th>


                                </tr>
                            </thead>
                            <script>
                                let data = "{{ route('sst.data') }}";

                            </script>


                        </table>

                    </div>

                </div>

                <div class="row d-flex justify-content-center">


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
