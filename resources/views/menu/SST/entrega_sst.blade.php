@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">
            <form method="POST" action="{{ route('sst.create') }}" enctype="multipart/form-data" class="form-floating">
                @csrf
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
                                <input required="" type="date" name="fecha_entrega_sst" id="fecha_entrega_sst"
                                    class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
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
                        <div class="d-flex justify-content-center">
                            <table id="tabla_articulos_sst" class="table " style="width: 100%">
                                <thead>
                                    <tr>

                                        <th style="text-align: center">Articulo</th>
                                        <th style="text-align: center">Cantidad</th>


                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>


                            </table>

                        </div>

                    </div>

                    <div class="row d-flex justify-content-center">


                        {{-- Observaciones --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                            <div class="form-floating">
                                <input required="" type="text" name="observaciones_sst" id="observaciones_sst"
                                    class="form-control">
                                <label class="user-label">Observaciones:</label>
                            </div>
                        </div>

                        {{-- Firma Recibido --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                            <img id="draw-image" src="" alt="Tu Imagen aparecera Aqui!" />
                            <textarea id="draw-dataUrl" class="form-control" rows="5" hidden>Para los que saben que es esto:</textarea>


                        </div>

                        {{-- Firma SGSST --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                            <div class="form-floating">
                                <input required="" type="text" name="firma_SGSST_sst" id="firma_SGSST_sst"
                                    class="form-control" value="{{ auth()->user()->name }}" required>
                                <label class="user-label">Firma SGSST:</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" id="guardar_sst" name="guardar_sst" style="margin-bottom: 3px">
                    <i class="fa-solid fa-cart-plus fa-lg"></i>
                    <span class="nav-text">
                        Agregar Entrega
                    </span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                                <canvas id="draw_canvas_sst" width="420" height="160">
                                    No tienes un buen navegador.
                                </canvas>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Limpiar" id="draw_clearBtn_sst">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="draw_submitBtn_sst">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
