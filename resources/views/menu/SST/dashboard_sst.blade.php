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

            <div id="container" style="width:100%; height:400px;"></div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const chart = Highcharts.chart('container', {
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Fruit Consumption'
                        },
                        xAxis: {
                            categories: ['Apples', 'Bananas', 'Oranges']
                        },
                        yAxis: {
                            title: {
                                text: 'Fruit eaten'
                            }
                        },
                        series: [{
                            name: 'Jane',
                            data: [1, 0, 4]
                        }, {
                            name: 'John',
                            data: [5, 7, 3]
                        }]
                    });
                });
            </script>
    </section>
@endsection
