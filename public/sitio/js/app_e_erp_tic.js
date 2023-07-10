$(document).ready(function () {
    var t = $("#tabla_participantes_erp").DataTable({
        responsive: false,
        scrollY: "250px",
        scrollCollapse: true,
        paging: false,
        autoWidth: false,
        ordering: false,
        info: false,
        searching: false,
    });

    $("#addRow_part_erp").on("click", function () {
        var contador = 1;
        $.ajax({
            url: "/sst/datatable",
            type: "GET",
            dataType: "json",
            success: function (data) {
                // Generar el contenido del menú desplegable a partir de los datos obtenidos
                var opciones = "";

                $.each(data.data, function (i, opcion) {
                    opciones +=
                        "<option value='" +
                        opcion.id +
                        "'>" +
                        opcion.nombre +
                        "</option>";
                });
                t.row
                    .add([
                        "<input type='text' name='n_participantes[]' id='descripcion_servicio'class='form-control' value='" +
                            contador +
                            "'disabled />",
                        "<select  name='articulos_sst[]'" +
                            "id='articulos_sst' class='articulos_sst form-control' style='width: 200px' >" +
                            "<option disabled selected>-- Seleccione Articulo --</option>" +
                            opciones +
                            "</select>",
                        "<input type='text' name='firma_func_erp[]' id='firma_func_erp'class='form-control' />",
                    ])
                    .draw(false);
                contador++;
            },
            error: function (xhr, status, error) {
                console.log("Error al obtener las opciones: " + error);
            },
        });
    });

    $("#addRow_part_erp").click();

    $("#removeRow_part_erp").on("click", function () {
        var rowCount = t.rows().count();

        if (rowCount > 0) {
            t.rows(rowCount - 1)
                .remove()
                .draw(false);
        }
    });

    $("#removeRow_part_erp").click();
});

$(document).ready(function () {
    var t = $("#tabla_tareas_erp").DataTable({
        responsive: false,
        scrollY: "250px",
        scrollCollapse: true,
        paging: false,
        autoWidth: false,
        ordering: false,
        info: false,
        searching: false,
    });

    $("#addRow_tareas_erp").on("click", function () {
        $.ajax({
            url: "/sst/datatable",
            type: "GET",
            dataType: "json",
            success: function (data) {
                // Generar el contenido del menú desplegable a partir de los datos obtenidos
                var opciones = "";

                $.each(data.data, function (i, opcion) {
                    opciones +=
                        "<option value='" +
                        opcion.id +
                        "'>" +
                        opcion.nombre +
                        "</option>";
                });
                t.row
                    .add([
                        "<input type='text' name='descripcion_servicio[]' id='descripcion_servicio'class='form-control' />",
                        "<select  name='articulos_sst[]'" +
                            "id='articulos_sst' class='articulos_sst form-control' style='width: 200px' >" +
                            "<option disabled selected>-- Seleccione Articulo --</option>" +
                            opciones +
                            "</select>",
                        "<input type='text' name='firma_func_erp[]' id='firma_func_erp'class='form-control' />",
                        "<input type='text' name='firma_func_erp[]' id='firma_func_erp'class='form-control' />",
                        "<input type='text' name='firma_func_erp[]' id='firma_func_erp'class='form-control' />",
                    ])
                    .draw(false);
            },
            error: function (xhr, status, error) {
                console.log("Error al obtener las opciones: " + error);
            },
        });
    });

    $("#addRow_tareas_erp").click();

    $("#removeRow_tareas_erp").on("click", function () {
        var rowCount = t.rows().count();

        if (rowCount > 0) {
            t.rows(rowCount - 1)
                .remove()
                .draw(false);
        }
    });

    $("#removeRow_tareas_erp").click();
});
