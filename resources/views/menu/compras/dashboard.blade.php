@extends('home.home')

@section('content')
<script src="{{ asset('sitio/js/app_compras.js') }}"></script>
    <div class="card card-spacing">

        <div>

            <table id="tabla_dashboard" class="table table-bordered " style="width:100%">
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


                    </tr>
                </thead>

                <script>
                    let dataformato = "{{ route('compras.data') }}";
                </script>
                {{-- <tbody>


                    <tr>

                        <td> <a href="">RQS-9</a></td>
                        <td>Solicitante</td>
                        <td>Centro Operacion</td>
                        <td>Centro Costo</td>
                        <td>Fecha Solicitud</td>
                        <td>Tipo Solicitud</td>
                        <td>Detalle</td>
                        @if (0)
                            <td style="background-color: green" value="1">Aprobado</td>
                        @else
                            <td style="background-color: orange" value="0">Pendiente</td>
                        @endif

                        @if (0)
                            <td style="background-color: green" value="1">Gestionado</td>
                        @else
                            <td style="background-color: orange" value="0">Sin gestionar</td>
                        @endif

                    </tr>

                </tbody> --}}

            </table>

        </div>

    </div>
@endsection
