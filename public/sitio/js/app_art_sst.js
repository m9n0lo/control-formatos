$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr("content");
    $(".estado-checkbox").change(function (e) {
        var id = $(this).data("id");

        var estado = $(this).is(":checked") ? 1 : 2;
        var switchElement = $(this);
        obtenerCantidad(id)
            .done(function (cantidadDisponible) {
                if (cantidadDisponible === "0") {
                    switchElement.prop("checked", false);
                    Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: "No hay inventario disponible!",
                    });
                } else {
                    $.ajax({
                        url: "/articulos/inactive",
                        type: "POST",
                        data: {
                            id: id,
                            estado: estado,
                            _token: token,
                        },
                        success: function (response) {
                            // Actualizar el estado en la interfaz de usuario si es necesario
                        },
                        error: function (xhr) {
                            // Manejar errores
                        },
                    });
                }
            })
            .fail(function (xhr) {
                // Manejar errores en la solicitud para obtener la cantidad disponible
            });
    });
});

function obtenerCantidad(id) {
    var token = $('meta[name="csrf-token"]').attr("content");
    return $.ajax({
        url: "/sst/articulosda/" + id,
        type: "GET",
        data: {
            id: id,
            _token: token,
        },
    });
}
