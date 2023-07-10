@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">

            <div class="card-title">
                <div class="row titulo title-background"><span>Entregas ERP</span></div>
            </div>
            <div class="card-title d-flex justify-content-end">
                <div class="row title " style="margin-bottom: 5px">
                    <h3 class="estado_rqs " style="background-color: #1793e6">Acta N°</h3>
                </div>
            </div>

            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <div class="row">
                    {{--  Proceso --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="nombre_a_sst" id="nombre_a_sst" class="form-control"
                                required>
                            <label class="user-label">Proceso/Grupo/Comite:</label>
                        </div>
                    </div>
                    {{--  Citado_por --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="nombre_a_sst" id="nombre_a_sst" class="form-control"
                                required>
                            <label class="user-label">Citado por:</label>
                        </div>
                    </div>
                    {{--  Fecha Inicio --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="datetime-local" name="nombre_a_sst" id="nombre_a_sst"
                                class="form-control" required>
                            <label class="user-label">Fecha inicio:</label>
                        </div>
                    </div>
                    {{--  Fecha Final --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="form-floating">
                            <input required="" type="datetime-local" name="nombre_a_sst" id="nombre_a_sst"
                                class="form-control" required>
                            <label class="user-label">Fecha fin:</label>
                        </div>
                    </div>

                </div>
                <br>

                <div class="d-flex justify-content-end" style="width: 90%">
                    <a type="submit" type="button" id="addRow_part_erp"class="btn btn-success" style="margin-bottom: 3px">
                        <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>

                    </a>
                    <a type="submit" type="button" id="removeRow_part_erp"class="btn btn-danger" style="margin-bottom: 3px">
                        <i class="fa-sharp fa-solid fa-circle-minus fa-lg"></i>

                    </a>
                </div>

                <div class="d-flex justify-content-center">

                    <table id="tabla_participantes_erp" class="table " style="width: 80%">
                        <thead>
                            <tr>

                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Firma</th>

                            </tr>
                        </thead>

                    </table>
                </div>

                <div class="row ">
                    {{--  Puntos de Discusion --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="nombre_a_sst" id="nombre_a_sst" class="form-control"
                                required>
                            <label class="user-label">Punto de discusion:</label>
                        </div>
                    </div>
                    {{--  Desarrollo de la reunion --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                        <div class="form-floating">
                            <input required="" type="text" name="nombre_a_sst" id="nombre_a_sst" class="form-control"
                                required>
                            <label class="user-label">Desarrollo de la reunion:</label>
                        </div>
                    </div>

                </div>
                <br>

                <div class="d-flex justify-content-end" style="width: 90%">
                    <a type="submit" type="button" id="addRow_tareas_erp"class="btn btn-success" style="margin-bottom: 3px">
                        <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>

                    </a>
                    <a type="submit" type="button" id="removeRow_tareas_erp"class="btn btn-danger" style="margin-bottom: 3px">
                        <i class="fa-sharp fa-solid fa-circle-minus fa-lg"></i>

                    </a>
                </div>
                <div class="d-flex justify-content-center">

                    <table id="tabla_tareas_erp" class="table " style="width: 80%">
                        <thead>
                            <tr>

                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Tarea</th>
                                <th style="text-align: center">Responsable</th>
                                <th style="text-align: center">Fecha Ejecucion</th>
                                <th style="text-align: center">Seguimiento</th>

                            </tr>
                        </thead>

                    </table>
                </div>
                {{--  Observaciones --}}
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                    <div class="form-floating">
                        <input required="" type="text" name="nombre_a_sst" id="nombre_a_sst" class="form-control"
                            required>
                        <label class="user-label">Observaciones:</label>
                    </div>
                </div>
            </div>




        </div>

    </section>
@endsection
