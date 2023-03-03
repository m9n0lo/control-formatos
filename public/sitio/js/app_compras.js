$(document).ready(function () {
    var t = $("#tabla_solicitudRQS").DataTable({
        responsive: true,
        scrollY: "250px",
        scrollCollapse: true,
        paging: false,
        autoWidth: false,
        ordering: false,
        info: false,
        search: false,
    });

    /* var informacionCampo = t
    .column('descripcion_servicio')
    .data()
    .toArray(); */

    $("#addRow").on("click", function () {
        t.row
            .add([
                "<input type='text' name='descripcion_servicio[]' id='descripcion_servicio'class='form-control' />",
                "<input type='text' name='centro_servicio[]' id='centro_servicio'class='form-control' />",
                "<input type='text' name='area_servicio[]' id='area_servicio'class='form-control' />",
                "<input type='text' name='cantidad_servicio[]' id='cantidad_servicio'class='form-control' />",
                "<input type='text' name='um_servicio[]' id='um_servicio'class='form-control' />",
                "<input type='text' name='observacion_servicio[]' id='observacion_servicio'class='form-control' />",
            ])
            .draw(false);
    });

    // Automatically add a first row of data
    /* var informacionTabla = JSON.stringify(t); */

    $("#addRow").click();

    $("#removeRow").on("click", function () {
        t.row().remove().draw(false);
    });
    $("#removeRow").click();

    /*  $("#addRQS").on("click", function () {
        console.log(informacionCampo);
    }); */
    $("#addRQS").click();
});

$(document).ready(function () {
    startDataTable({
        idTable: "tabla_dashboard",
        dataSource: dataformato,
        responsive: true,
        scrollX: false,
        autoWidth: false,

        columns: [
            { data: "id" },
            { data: "users.name" },
            { data: "sede" },
            { data: "area" },
            { data: "fecha_solicitud" },
            { data: "tipo_solicitud" },
            { data: "detalle_solicitud" },
            {
                data: "estado",
                render: function (estado) {
                    if (estado == 1) {
                        return "<td class='td-green'>Aprobado</td>";
                    } else {
                        return "<td class='td-blue'>Pendiente</td>";
                    }
                },
            },
            {
                data: "estado_gestion",
                render: function (estado_gestion) {
                    if (estado_gestion == 1) {
                        return "<td style='background-color: green' value='1'>Aprobado</td>";
                    } else {
                        return "<td style='background-color: green' value='1'>Pendiente</td>";
                    }
                },
            },
            {
                data: null,
                name: "action",
                render: function (data, type, full, meta) {
                    if (us == "m9n0lo" || us == "ramiro.rojas") {
                        return (
                            "<button type='submit' id='" +
                            data.id +
                            "' class='form btn btn-primary btn-xs aprobar_rqs_d ' ><i class='fa-solid fa-eye'></i></button>"
                        );
                    } else {
                        return "<button type='submit' class='form btn btn-primary btn-xs edit ' disabled><i class='fa-solid fa-eye'></i></button>";
                    }
                },
            },
        ],
    });
});





