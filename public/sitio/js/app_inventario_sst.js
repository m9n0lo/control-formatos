var token = $('meta[name="csrf-token"]').attr("content");

let load_i_sst = document.getElementById("boton_a_i_sst");
if (load_i_sst) {
    load_i_sst.addEventListener("click", function () {
        let nombre_a_i_sst = $("#nombre_a_i_sst").val();
        let articulos_i_sst = $("#articulos_i_sst").val();
        let cantidad_articulos_d_i = $("#cantidad_articulos_d_i").val();
        let sede_i_sst = $("#sede_i_sst").val();
        let fecha_ingreso_i_sst = $("#fecha_ingreso_i_sst").val();
        let observaciones_i_sst = $("#observaciones_i_sst").val();

        if (
            nombre_a_i_sst === "" ||
            articulos_i_sst === "" ||
            cantidad_articulos_d_i === "" ||
            sede_i_sst === "" ||
            fecha_ingreso_i_sst === "" ||
            fecha_ingreso_i_sst === "" ||
            observaciones_i_sst === ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Existen campos vacios, valida nuevamente!",
            });
        } else {

        }
    });
}

$(document).ready(function () {
    var t = $("#tabla_articulos_i_sst").DataTable({
        paging: false,
        autowidth: true,
        ordering: false,
        info: false,
        searching: false,
    });

    // Agregar una nueva fila cada vez que se presione el botón
    $("#addRow").on("click", function () {
        // Realizar una petición AJAX para obtener los datos de la base de datos
        $.ajax({
            url: "/sst/inventarios/datatable",
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

                // Agregar una nueva fila a la tabla con el menú desplegable generado
                t.row
                    .add([
                        "<select  name='articulos_i_sst[]'" +
                            "id='articulos_i_sst' class='form-control' style='width: 200px' >" +
                            "<option disabled selected>-- Seleccione Articulo --</option>" +
                            opciones +
                            "</select>",
                        "<input type='text' name='cantidad_articulos_d_i[]'style='width: 100px' id='cantidad_articulos_d_i'class='form-control' />",
                    ])
                    .draw(false);
            },
            error: function (xhr, status, error) {
                console.log("Error al obtener las opciones: " + error);
            },
        });
    });
    $("#addRow").click();

    $("#removeRow").on("click", function () {
        var rowCount = t.rows().count();

        if (rowCount > 0) {
            t.rows(rowCount - 1)
                .remove()
                .draw(false);
        }
    });

    $("#removeRow").click();

    /*  $("#addRQS").on("click", function () {
        console.log(informacionCampo);
    }); */
    $("#addRQS").click();
});
