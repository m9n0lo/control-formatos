jQuery(document).ready(function ($) {
    $("#empresa_id").select2({
        closeOnSelect: true,
    });
});
jQuery(document).ready(function ($) {
    $("#empresa_id4").select2({
        closeOnSelect: true,
    });
});

let div_i1 = document.getElementById("informe_1");
let div_i2 = document.getElementById("informe_2");
let div_i3 = document.getElementById("informe_3");
let div_i4 = document.getElementById("informe_4");

var prueba = document.getElementById("persona_id");
if(prueba){
var nombreSeleccionado = prueba.options[prueba.selectedIndex].innerText;
}
var boton2 = document.getElementById("boton_i2");
var token = $('meta[name="csrf-token"]').attr("content");

$(document).ready(function () {
    $("#boton_i1").click(function () {
        var fechaInicial = $("#fecha_inicial_i1").val();
        var fechaFinal = $("#fecha_final_i1").val();

        // Envía la solicitud AJAX
        $.ajax({
            url: "/sst/informes/informe1", // Reemplaza esto con la ruta correcta a tu controlador
            method: "POST",
            data: {
                fecha_inicial_i1: fechaInicial,
                fecha_final_i1: fechaFinal,
                _token: token,
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


$(document).ready(function () {
    $("#boton_i2").click(function () {
        var persona_id = $("#persona_id").val();
        var fechaInicial2 = $("#fecha_inicial_i2").val();
        var fechaFinal2 = $("#fecha_final_i2").val();

        // Envía la solicitud AJAX
        $.ajax({
            url: "/sst/informes/informe2", // Reemplaza esto con la ruta correcta a tu controlador
            method: "POST",
            data: {
                persona_id: persona_id,
                fecha_inicial_i2: fechaInicial2,
                fecha_final_i2: fechaFinal2,
                _token: token,
            },
            success: function (data) {
                // Maneja la respuesta del servidor

                div_i2.removeAttribute("hidden");
                grafico_informe2(data);
                // Aquí puedes utilizar la variable 'data' para mostrar el gráfico
            },
            error: function (xhr) {
                // Maneja los errores de la solicitud AJAX
                console.log(xhr.responseText);
            },
        });
    });
});

function grafico_informe2(data) {
    Highcharts.chart("informe_2", {
        chart: {
            type: "column",
        },
        title: {
            align: "left",
            text: "Cantidad total entregada por persona seleccionada ",
        },
        accessibility: {
            announceNewData: {
                enabled: true,
            },
        },
        xAxis: {
            type: "category",
        },
        yAxis: {
            title: {
                text: "Total articulos entregados",
            },
        },
        legend: {
            enabled: false,
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: "{point.y}",
                },
            },
        },

        tooltip: {
            headerFormat:
                '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat:
                '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>',
        },

        series: [
            {
                name: "Articulo",
                colorByPoint: true,
                data: data,
            },
        ],
    });
}

$(document).ready(function () {
    $("#boton_i3").click(function () {
        var empresa_id = $("#empresa_id").val();
        var fechaInicial3 = $("#fecha_inicial_i3").val();
        var fechaFinal3 = $("#fecha_final_i3").val();


        // Envía la solicitud AJAX
        $.ajax({
            url: "/sst/informes/informe3", // Reemplaza esto con la ruta correcta a tu controlador
            method: "POST",
            data: {
                persona_id: empresa_id,
                fecha_inicial_i3: fechaInicial3,
                fecha_final_i3: fechaFinal3,
                _token: token,
            },
            success: function (data) {
                // Maneja la respuesta del servidor
                div_i3.removeAttribute("hidden");
                grafico_informe3(data);
                // Aquí puedes utilizar la variable 'data' para mostrar el gráfico
            },
            error: function (xhr) {
                // Maneja los errores de la solicitud AJAX
                console.log(xhr.responseText);
            },
        });
    });
});


function grafico_informe3(data) {
    Highcharts.chart("informe_3", {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: "pie",
        },
        title: {
            text: "Cantidad Articulos Por sede",
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

$(document).ready(function () {
    $("#boton_i4").click(function () {
        var empresa_id4 = $("#empresa_id4").val();
        var fechaInicial4 = $("#fecha_inicial_i4").val();
        var fechaFinal4 = $("#fecha_final_i4").val();


        // Envía la solicitud AJAX
        $.ajax({
            url: "/sst/informes/informe4", // Reemplaza esto con la ruta correcta a tu controlador
            method: "POST",
            data: {
                persona_id4: empresa_id4,
                fecha_inicial_i4: fechaInicial4,
                fecha_final_i4: fechaFinal4,
                _token: token,
            },
            success: function (data) {
                // Maneja la respuesta del servidor
                div_i4.removeAttribute("hidden");
                grafico_informe4(data);
                // Aquí puedes utilizar la variable 'data' para mostrar el gráfico
            },
            error: function (xhr) {
                // Maneja los errores de la solicitud AJAX
                console.log(xhr.responseText);
            },
        });
    });
});

function grafico_informe4(data){
    Highcharts.chart('informe_4', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Disponible VS Entregado',
            align: 'left'
        },

        xAxis: {
            categories: ['Bpack', 'Toncacipa', 'Barranquilla','Medellin']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Count medals'
            }
        },

        tooltip: {
            format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                'Total: {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal'
            }
        },

        series: [{
            name: 'Disponible',
            data: [148, 133, 124,25],
            stack: 'Europe'
        }, {
            name: 'Entregado',
            data: [102, 98, 65,60],
            stack: 'Europe'
        }]
    });

}

