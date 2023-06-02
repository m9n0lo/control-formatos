var token = $('meta[name="csrf-token"]').attr("content");

function guardarEnBD() {
    var data = [];
    $("#tabla_art_sst tbody tr").each(function () {
        var rowData = {};
        $(this)
            .find("td")
            .each(function () {
                var columnName = $(this)
                    .closest("table")
                    .find("th")
                    .eq($(this).index())
                    .text()
                    .trim();
                rowData[columnName] = $(this).text().trim();
            });
        data.push(rowData);
    });

    $.ajax({
        url: "/sst/inventarios/guardar",
        method: "POST",
        data: {
            data: data,
            _token: token,
        },

        success: function (data) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Guardado Exitosamente!",
                showConfirmButton: false,
                timer: 1500,
            });
            location.reload();
            var formulario = document.getElementById("inventario_sst_form");
            formulario.reset();
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

let load_i_sst = document.getElementById("boton_a_sst");
if (load_i_sst) {
    load_i_sst.addEventListener("click", function () {
        let nombre_a_i_sst = $("#nombre_a_i_sst").val();
        let cantidad_i_sst = $("#cantidad_i_sst").val();
        let sede_i_sst = $("#sede_i_sst").val();
        let fecha_ingreso_i_sst = $("#fecha_ingreso_i_sst").val();
        let observaciones_i_sst = $("#observaciones_i_sst").val();

        if (
            nombre_a_i_sst === "" ||
            cantidad_i_sst === "" ||
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
            var formData = $("#inventario_sst_form").serializeArray();
            var newRow = $("<tr>");

            $.each(formData, function (index, field) {
                newRow.append($("<td>").text(field.value));
            });

            $("#tabla_art_sst tbody").append(newRow);
            var formulario = document.getElementById("inventario_sst_form");
            formulario.reset();
        }
    });
}
