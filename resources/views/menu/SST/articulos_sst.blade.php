@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">

            <div class="card-title">
                <div class="row titulo title-background"><span>Articulos SST</span></div>
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
                                    Seleccionar
                                </span>
                                <i class="fa-solid fa-eye fa-beat fa-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
