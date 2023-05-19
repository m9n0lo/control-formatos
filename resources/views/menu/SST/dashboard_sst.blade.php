@extends('home.home')
@section('content')
    <section class="section">

        <div class="card card-spacing">

            <div>

                <table id="tabla_dashboard_sst" class="table " style="width:100%">
                    <thead>
                        <tr>

                            <th>Nombre Funcionario</th>
                            <th>Fecha Entrega</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Firma Recibido</th>
                            <th>Firma SGSST</th>


                        </tr>
                    </thead>

                    <script>
                         let entregasSST = {!! $entregas_sst->toJson() !!};

                    </script>

                </table>

            </div>
    </section>
@endsection
