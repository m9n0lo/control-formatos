
$(document).ready(function () {
    var t = $('#tabla_solicitudRQS').DataTable();


    $('#addRow').on('click', function () {
        t.row.add(["<input type='text' name='descripcion_servicio' id='descripcion_servicio'class='form-control' />",
        "<input type='text' name='centro_servicio' id='centro_servicio'class='form-control' />",
        "<input type='text' name='area_servicio' id='area_servicio'class='form-control' />",
        "<input type='text' name='cantidad_servicio' id='cantidad_servicio'class='form-control' />",
        "<input type='text' name='um_servicio' id='um_servicio'class='form-control' />",
        "<input type='text' name='observacion_servicio' id='observacion_servicio'class='form-control' />"
        ]).draw(false);


    });
    $('#addRow').click();

    $('#removeRow').on('click',function () {


        t.row().remove().draw(false);
    });
    $('#removeRow').click();

    // Automatically add a first row of data

});
