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
/* VALIDACION DE QUE TODOS LOS CAMPOS ESTEN LLENOS Y ARROJA EL MENSAJE DE GUARDADO */
document.getElementById("guardar_RQS").addEventListener("click", function () {
    let area = $("#area").val();
    let solicitado_por = $("#solicitado_por").val();
    let persona_id = $("#persona_id").val();
    //let fecha_solicitud = $("#fecha_solicitud").val();
    let fecha_esperada = $("#fecha_esperada").val();
    let tipo_solicitud = $("#tipo_solicitud").val();
    let razon_social = $("#razon_social").val();
    let correo_contacto = $("#correo_contacto").val();
    let telefono_contacto = $("#telefono_contacto").val();
    let detalle_solicitud = $("#detalle_solicitud").val();
    let costo_estimado = $("#costo_estimado").val();
   /*  let cotizacion1 = $("#filer_input2").val(); */

    if (
        area === "" ||
        solicitado_por === "" ||
        fecha_elaboracion === "" ||
        persona_id === "" ||
        fecha_solicitud === "" ||
        fecha_esperada === "" ||
        tipo_solicitud === "" ||
        razon_social === "" ||
        correo_contacto === "" ||
        telefono_contacto === "" ||
        detalle_solicitud === "" ||
        costo_estimado === "" ||
        cotizacion1 === ""
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

