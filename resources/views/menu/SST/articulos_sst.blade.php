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

            <div class="card-body rqs shadow p-3 mb-5 bg-body rounded">

                <table id="tabla_art_sst" class="table " style="width: 100%">
                    <thead>
                        <tr>

                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Articulo</th>
                            <th style="text-align: center">Descripcion</th>
                            <th style="text-align: center">Cantidad Disponible</th>
                            <th style="text-align: center">Estado</th>


                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($articulos as $articulo)
                            <tr>
                                <td>{{ $articulo->id }}</td>
                                <td>{{ $articulo->nombre }}</td>
                                <td>{{ $articulo->descripcion }}</td>
                                @if ($articulo->total == null)
                                <td style="color:red">Sin stock</td>
                                @else
                                <td>{{ $articulo->total }}</td>
                                @endif

                                @if ($articulo->total == 0)
                                <td>
                                    <input type="checkbox" class="estado-checkbox switch" data-id="{{ $articulo->id }}"
                                        {{ $articulo->estado == 2 ? 'checked' : '' }}>
                                </td>
                                @else
                                <td>
                                    <input type="checkbox" class="estado-checkbox switch" data-id="{{ $articulo->id }}"
                                        {{ $articulo->estado == 1 ? 'checked' : '' }}>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
