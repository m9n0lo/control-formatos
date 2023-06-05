@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">
            <form method="POST" action="{{ route('sst.guardar_inventarios') }}" enctype="multipart/form-data" class="form-floating">
                @csrf
                <div class="card-title">
                    <div class="row titulo title-background"><span>Inventario SST</span></div>
                </div>

                <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                    <div class="row">
                        <form id="inventario_sst_form" action="post">

                            <div class="row d-flex justify-content-center">

                                {{-- Sede --}}
                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                    <select class="js-example-basic-single" class="form-control" name="sede_i_sst"
                                        id="sede_i_sst" required>
                                        <option value="" disabled selected>-- Seleccione Sede --</option>
                                        @foreach ($array as $jef)
                                            <option value="{{ $jef }}">{{ $jef }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Fecha ingreso --}}
                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                    <div class="form-floating">
                                        <input required="" type="date" name="fecha_ingreso_i_sst"
                                            id="fecha_ingreso_i_sst" class="form-control" value="" required>
                                        <label class="user-label">Fecha ingreso:</label>
                                    </div>
                                </div>
                                {{-- Observaciones --}}
                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                                    <div class="form-floating">
                                        <input required="" type="text" name="observaciones_i_sst"
                                            id="observaciones_i_sst" class="form-control" value="" required>
                                        <label class="user-label">Observaciones:</label>
                                    </div>
                                </div>
                            </div>
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
                                    <table id="tabla_articulos_i_sst" class="table " style="width: 100%">
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

                            {{-- BOTON SELECCIONAR --}}
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1 d-flex justify-content-end">
                                <div class=" buttons_d ">
                                    <button type="submit" class="btn btn-success" name="boton_a_i_sst"
                                        id="boton_a_i_sst">
                                        <span class="nav-text">
                                            Confirmar
                                        </span>
                                        <i class="fa-solid fa-check-to-slot fa-bounce fa-lg"></i>
                                    </button>
                                </div>

                                <div class=" buttons_d ">
                                    <button  class="btn btn-danger" name="boton_a_sst" id="boton_a_sst">
                                        <span class="nav-text">
                                            Cancelar
                                        </span>
                                        <i class="fa-solid fa-trash-can fa-shake fa-lg"></i>
                                    </button>
                                </div>
                            </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
