@extends('home.home')
@section('content')
    <section class="section">
        <div class="card card-spacing">

            <div class="card-title">
                <div class="row titulo title-background"><span>Articulos SST</span></div>
            </div>

            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">
                <form action="{{ route('articulos.create') }}" method="post" class="form-floating">
                    @csrf
                    <div class="row">


                        {{--  Nombre persona --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                            <div class="form-floating">
                                <input required="" type="text" name="nombre_a_sst" id="nombre_a_sst"
                                    class="form-control" required>
                                <label class="user-label">Nombre articulo:</label>
                            </div>
                        </div>
                        {{-- Fecha Entrega --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3">
                            <div class="form-floating">
                                <input required="" type="text" name="descripcion_a_sst" id="descripcion_a_sst"
                                    class="form-control" value="" required>
                                <label class="user-label">Descripcion:</label>
                            </div>
                        </div>
                        {{-- BOTON SELECCIONAR --}}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-3 mt-3 d-flex align-items-center">
                            <div class=" buttons_d ">
                                <button type="submit" class="btn btn-primary" name="boton_a_sst" id="boton_a_sst">
                                    <span class="nav-text">
                                        Añadir
                                    </span>
                                    <i class="fa-solid fa-eye fa-beat fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <form action="{{ route('articulos.inactive') }}" method="post" class="form-floating">

                <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">

                    <table id="tabla_art_sst" class="table " style="width: 100%">
                        <thead>
                            <tr>

                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Articulo</th>
                                <th style="text-align: center">Descripcion</th>
                                <th style="text-align: center">Estado</th>


                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            @foreach ($articulos as $articulo)
                                <tr>
                                    <td>{{ $articulo->id }}</td>
                                    <td>{{ $articulo->nombre }}</td>
                                    <td>{{ $articulo->descripcion }}</td>
                                    <td>
                                        <input type="checkbox" class="estado-checkbox switch" data-id="{{ $articulo->id }}"
                                            {{ $articulo->estado == 1 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>


                </div>
            </form>
        </div>

    </section>
@endsection
