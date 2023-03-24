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
let load_rqs = document.getElementById("guardar_RQS");
if (load_rqs) {
    load_rqs.addEventListener("click", function () {
        let area = $("#area").val();
        let solicitado_por = $("#solicitado_por").val();
        let persona_id = $("#persona_id").val();
        let fecha_esperada = $("#fecha_esperada").val();
        let tipo_solicitud = $("#tipo_solicitud").val();
        let razon_social = $("#razon_social").val();
        let correo_contacto = $("#correo_contacto").val();
        let telefono_contacto = $("#telefono_contacto").val();
        let detalle_solicitud = $("#detalle_solicitud").val();
        let costo_estimado = $("#costo_estimado").val();

        if (
            area === "" ||
            solicitado_por === "" ||
            fecha_elaboracion === "" ||
            persona_id === "" ||
            fecha_esperada === "" ||
            tipo_solicitud === "" ||
            razon_social === "" ||
            correo_contacto === "" ||
            telefono_contacto === "" ||
            detalle_solicitud === "" ||
            costo_estimado === ""
        ) {
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

/* document.getElementById("apr_decl_rqs").addEventListener("click", function () {
    Swal.fire({
        title: "¿Desea Rechazar la RQS?",
        input: "text",
        inputAttributes: {
            autocapitalize: "off",
        },
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
            return fetch(`//api.github.com/users/${login}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(response.statusText);
                    }
                    return response.json();
                })
                .catch((error) => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: `${result.value.login}'s avatar`,
                imageUrl: result.value.avatar_url,
            });
        }
    });
}); */
