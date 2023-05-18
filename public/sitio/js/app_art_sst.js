$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    $(".estado-checkbox").change(function (e) {
        console.log(e.target.checked);
         var id = $(this).data('id');
        var estado = e.target.checked ? 1 : 2;

        console.log(id,estado);

        $.ajax({
            url: '/articulos/inactive',
            type: 'POST',
            data: {
                id: id,
                estado: estado,
                _token: token
            },
            success: function(response) {
                // Actualizar el estado en la interfaz de usuario si es necesario
            },
            error: function(xhr) {
                // Manejar errores
            }
        });
    });
});
