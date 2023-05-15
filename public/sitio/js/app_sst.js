jQuery(document).ready(function ($) {
    $("#persona_id_sst").select2({
        closeOnSelect: true,
    });
});

let load_sst = document.getElementById("guardar_sst");
if (load_sst) {
    load_sst.addEventListener("click", function () {
        let funcionario = $("#persona_id_sst").val();
        let fecha_entrega = $("#fecha_entrega_sst").val();
        let observaciones = $("#observaciones_sst").val();
        let firma_recibido = $("#firma_recibido_sst").val();
        let firma_sgsst = $("#firma_SGSST_sst").val();

        if (
            funcionario === "" ||
            fecha_entrega === "" ||
            observaciones === "" ||
            firma_recibido === "" ||
            firma_sgsst === ""
        ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Existen campos vacios, valida nuevamente!',

              })
        } else {
            console.log(funcionario,fecha_entrega,observaciones,firma_recibido,firma_sgsst);
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Guardado Exitosamente!",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

let boton = document.getElementById("boton_operario");
let div = document.getElementById("div_registro");

if (boton) {
    boton.addEventListener("click", function () {
        let persona_id_stt = $("#persona_id_sst").val();
        let fecha_entrega = $("#fecha_entrega_sst").val();

        if (persona_id_stt == "" || fecha_entrega == "") {
            Swal.fire(
                "Seleccionaste el operario?",
                "Revisa los datos",
                "question"
            );
        } else {
            div.style.display = "block";
        }
    });
}

$(document).ready(function () {
    var t = $("#tabla_articulos_sst").DataTable({
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
                        opcion.descripcion +
                        "</option>";
                });

                // Agregar una nueva fila a la tabla con el menú desplegable generado
                t.row
                    .add([
                        "<select  name='articulos_sst[]'" +
                            "id='articulos_sst' class='form-control' style='width: 200px'>" +
                            "<option disabled selected>-- Seleccione Articulo --</option>" +
                            opciones +
                            "</select>",
                        "<input type='text' name='cantidad_articulos[]'style='width: 100px' id='cantidad_articulos'class='form-control' />",
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
        t.row().remove().draw(false);
    });
    $("#removeRow").click();

    /*  $("#addRQS").on("click", function () {
        console.log(informacionCampo);
    }); */
    $("#addRQS").click();
});
