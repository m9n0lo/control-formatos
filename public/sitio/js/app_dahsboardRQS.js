$(document).ready(function () {
    startDataTable({
        idTable: "tabla_dashboard",
        dataSource: dataformato,
        responsive: true,
        scrollX: false,
        autoWidth: false,

        columns: [
            { data: "id" },
            { data: "users.name" },
            { data: "sede" },
            { data: "area" },
            { data: "fecha_solicitud" },
            { data: "tipo_solicitud" },
            { data: "detalle_solicitud" },
            {
                data: "estado",
                render: function (estado) {
                    if (estado == 1) {
                        return "<td class='td-blue'>Pendiente</td>";
                    }
                    if (estado == 2) {
                        return "<td class='td-green'>Aprobado</td>";
                    }
                    if (estado == 3) {
                        return "<td class='td-blue'>Rechazado</td>";
                    }
                },
            },
            {
                data: "estado_gestion",
                render: function (estado_gestion) {
                    if (estado_gestion == 1) {
                        return "<td style='background-color: green' value='1'>Pendiente</td>";
                    } else {
                        return "<td style='background-color: green' value='1'>En Gestion</td>";
                    }
                },
            },
            {
                data: null,
                name: "action",
                render: function (data, type, row) {
                    return (
                        '<button class="btn btn-primary" onclick="redirectToEdit(' +
                        data.id +
                        ')"><i class="fa-solid fa-eye"></i></button>'
                    );
                },
            },
        ],
    });
});
function redirectToEdit(id) {
    window.location.href = "/Compras/dashboard/detalle/" + id + "/";
}
