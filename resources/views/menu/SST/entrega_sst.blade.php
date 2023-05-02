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
                        <div class="input-group">
                            <input required="" type="text" name="nombre_personal" id="nombre_personal"
                                class="input rounded">
                            <label class="user-label">Nombre Completo:</label>
                        </div>
                    </div>
                    {{-- Cargo --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="input-group">
                            <input required="" type="text" name="cargo" id="cargo" class="input rounded">
                            <label class="user-label">Cargo:</label>
                        </div>
                    </div>
                    {{-- Fecha Entrega --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="input-group">
                            <input required="" type="text" name="fecha_entrega" id="fecha_entrega"
                                class="input rounded">
                            <label class="user-label">Fecha Entrega:</label>
                        </div>
                    </div>

                    <table id="tabla_articulos" class="table " style="width:100%">
                        <thead>
                            @foreach ($articulos as $ar)
                                <tr>

                                    <th> {{ $ar}}</th>


                                </tr>
                            @endforeach
                        </thead>
                    </table>
                    {{-- Otro --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="input-group">
                            <input required="" type="text" name="otro" id="otro" class="input rounded">
                            <label class="user-label">Otro:</label>
                        </div>
                    </div>
                    {{-- Firma Recibido --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="input-group">
                            <input required="" type="text" name="firma_recibido" id="firma_recibido"
                                class="input rounded">
                            <label class="user-label">Firma Recibido:</label>
                        </div>
                    </div>
                    {{-- Observaciones --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="input-group">
                            <input required="" type="text" name="observaciones" id="observaciones"
                                class="input rounded">
                            <label class="user-label">Observaciones:</label>
                        </div>
                    </div>
                    {{-- Firma SGSST --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                        <div class="input-group">
                            <input required="" type="text" name="cargo" id="cargo " class="input rounded">
                            <label class="user-label">Firma SGSST:</label>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
