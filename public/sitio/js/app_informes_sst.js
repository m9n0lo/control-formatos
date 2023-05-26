let div_i1 = document.getElementById("informe_1");

/* document.addEventListener("DOMContentLoaded", function () {
    let cargar_i1 = document.getElementById("boton_i1");
    if (cargar_i1) {
        cargar_i1.addEventListener("click", function () {
            var fecha_inicial = $("#fecha_inicial_i1").val();
            var fecha_final = $("#fecha_final_i1").val();

            fetch("/sst/informes")
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    // Actualizar la tabla DataTable con los datos obtenidos
                    div_i1.removeAttribute("hidden");
                    grafico_informe1(data);
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    }
}); */

$(document).ready(function () {
    $("#boton_i1").click(function () {
        var token = $('meta[name="csrf-token"]').attr('content');
        var fechaInicial = $("#fecha_inicial_i1").val();
        var fechaFinal = $("#fecha_final_i1").val();


        // Envía la solicitud AJAX
        $.ajax({
            url: "/sst/informes/informe1", // Reemplaza esto con la ruta correcta a tu controlador
            method: "POST",
            data: {
                fecha_inicial_i1: fechaInicial,
                fecha_final_i1: fechaFinal,
                _token: token
            },


            success: function (data) {

                // Maneja la respuesta del servidor

                div_i1.removeAttribute("hidden");
                grafico_informe1(data);
                // Aquí puedes utilizar la variable 'data' para mostrar el gráfico

            },
            error: function (xhr) {
                // Maneja los errores de la solicitud AJAX
                console.log(xhr.responseText);
            },
        });
    });
});
function grafico_informe1(data) {
    Highcharts.chart("informe_1", {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: "pie",
        },
        title: {
            text: "Cantidad Articulos Por Fecha Estipulada",
            align: "left",
        },
        tooltip: {
            pointFormat: "{series.name}: <b>{point.y}</b>",
        },
        accessibility: {
            point: {
                valueSuffix: "%",
            },
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    format: "<b>{point.name}</b>: {point.percentage:.1f} %",
                },
            },
        },
        series: [
            {
                name: "Cantidad",
                colorByPoint: true,
                data: data,
            },
        ],
    });
}


