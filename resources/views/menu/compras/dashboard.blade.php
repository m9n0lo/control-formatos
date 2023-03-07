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
                        <th>Acciones</th>


                    </tr>
                </thead>

                <script>
                    let dataformato = "{{ route('compras.data') }}";
                    let us = "{{ $nombreus }}";
                </script>

            </table>


            <!-- Modal -->
            <div class="modal fade" id="Modal_estado_rqs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" class="form-horizontal">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar RQS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Desea aprobar la RQS seleccionada
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" name="rechazar_button" id="rechazar_button" value="3"
                                    class="btn btn-danger">Rechazar</button>
                                <button type="button" name="aprobar_button" id="aprobar_button"
                                    value="2"class="btn btn-primary">Aprobar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
