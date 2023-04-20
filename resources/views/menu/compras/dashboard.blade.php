@extends('home.home')

@section('content')
    <script src="{{ asset('sitio/js/app_dahsboardRQS.js') }}"></script>

    <div class="card card-spacing">

        <div>

            <table id="tabla_dashboard" class="table " style="width:100%">
                <thead>
                    <tr>

                        <th>RQS</th>
                        <th>Solicitante</th>
                        <th>Centro Operacion</th>
                        <th>Centro Costo</th>
                        <th>Fecha Solicitud</th>
                        <th>Tipo Solicitud</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th>Estado Gestion</th>
                        <th>Acciones</th>


                    </tr>
                </thead>

                <script>
                    let dataformato = "{{ route('compras.data') }}";
                    let us = "{{ $nombreus }}";
                </script>

            </table>

        </div>

    </div>
@endsection
