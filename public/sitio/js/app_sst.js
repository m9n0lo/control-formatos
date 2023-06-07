jQuery(document).ready(function ($) {
    $("#persona_id_sst").select2({
        closeOnSelect: true,
    });
});
jQuery(document).ready(function ($) {
    $("#sede_i_sst").select2({
        closeOnSelect: true,
    });
});
jQuery(document).ready(function ($) {
    $("#nombre_a_i_sst").select2({
        closeOnSelect: true,
    });
});

let load_sst = document.getElementById("guardar_sst");
if (load_sst) {
    load_sst.addEventListener("click", function () {
        let funcionario = $("#persona_id_sst").val();
        let fecha_entrega = $("#fecha_entrega_sst").val();
        let observaciones = $("#observaciones_sst").val();
        let firma_recibido = $("#draw_dataUrl").val();
        let firma_sgsst = $("#draw_dataUrl2").val();
        let articulos = $("#articulos_sst").val();

        if (
            funcionario === "" ||
            fecha_entrega === "" ||
            observaciones === "" ||
            firma_recibido === "" ||
            firma_sgsst === "" ||
            articulos === ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Existen campos vacios, valida nuevamente!",
            });
        } else {
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
let tabla_h_p = document.getElementById("tabla_h_p");

if (boton) {
    boton.addEventListener("click", function () {
        let persona_id_stt = $("#persona_id_sst").val();
        let fecha_entrega = $("#fecha_entrega_sst").val();

        if (persona_id_stt == null || fecha_entrega == "") {
            Swal.fire(
                "Seleccionaste el operario?",
                "Revisa los datos",
                "question"
            );
        } else {
            div.style.display = "block";
            tabla_h_p.removeAttribute("hidden");
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
                        opcion.nombre +
                        "</option>";
                });

                // Agregar una nueva fila a la tabla con el menú desplegable generado
                t.row
                    .add([
                        "<select  name='articulos_sst[]'" +
                            "id='articulos_sst' class='form-control' style='width: 200px' >" +
                            "<option disabled selected>-- Seleccione Articulo --</option>" +
                            opciones +
                            "</select>",
                        "<input type='number' name='cantidad_articulos[]'style='width: 100px' id='cantidad_articulos'class='form-control' />",
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

document.addEventListener("DOMContentLoaded", function () {
    let cargar_i_p = document.getElementById("boton_operario");
    let tabla_historial = document.getElementById("tabla_e_sst_p");

    var dataTable = null;
    if (cargar_i_p) {
        cargar_i_p.addEventListener("click", function () {
            var id = $("#persona_id_sst").val();
            // Realizar la solicitud AJAX utilizando Fetch
            fetch("/sst/select/history/" + id)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    // Actualizar la tabla DataTable con los datos obtenidos
                    actualizarTablaDatos(data);
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    }
    function actualizarTablaDatos(data) {
        if (dataTable !== null) {
            dataTable.clear();
            dataTable.destroy();
        }

        dataTable = $(tabla_historial).DataTable({
            autowidth: true,
            data: data,
            columns: [
                { data: "nombre_funcionario" },
                { data: "fecha_entrega" },
                { data: "nombre" },
                { data: "cantidad_entregada" },
                {
                    data: "firma",
                    render: function (firma) {
                        return (
                            '<img src="' + firma + '" style="width: 12rem;"/>'
                        );
                    },
                },
                {
                    data: "firma_sgsst",
                    render: function (firma_sgsst) {
                        return (
                            '<img src="' +
                            firma_sgsst +
                            '" style="width: 12rem;"/>'
                        );
                    },
                },
            ],
        });
    }
});


    function validarCantidad() {
      var articuloID = document.getElementById('articulo').value;
      var cantidad = parseInt(document.getElementById('cantidad').value);

      // Aquí podrías realizar una consulta a la base de datos para obtener la cantidad disponible
      // para el artículo seleccionado (utilizando AJAX, por ejemplo).
      // En este ejemplo, simularemos la consulta con datos predefinidos.

      // Datos ficticios de cantidad disponible por artículo (simulando una respuesta de la base de datos)
      var cantidadDisponible = {
        1: 10,
        2: 5,
        3: 8
      };

      // Verificar si la cantidad ingresada es mayor a la cantidad disponible
      if (cantidad > cantidadDisponible[articuloID]) {
        alert('La cantidad ingresada supera la cantidad disponible.');
        return false;
      }

      // La cantidad ingresada es válida
      return true;
    }





