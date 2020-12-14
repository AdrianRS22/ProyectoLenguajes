$(document).ready(function () {
    $("#tablaArticulos").DataTable({
        searching: false,
        bInfo: false,
        paging: false,
        orden: [],
        ajax: {
            url: "scripts/articulos/obtenerArticulos.php",
            type: "GET",
            dataSrc: ""
        },
        columns: [
            { data: 'ID_ARTICULO', title: "Id Artículo" },
            { data: 'CATEGORIA', title: "Categoría" },
            { data: 'NOMBRE', title: "Nombre" },
            { data: 'PRECIO', title: "Precio" },
            { data: 'CODIGO_CABYS', title: "Código Cabys" },
            { data: 'ID_ARTICULO', title: "Acción" },
        ],
        columnDefs: [
            {
                targets: 5,
                className: 'text-center',
                render: function (data, type, fila) {
                    return '<button class="btn btn-success" onclick="editarArticulo(' + data + ')">Actualizar</button>';
                }
            }
        ]
    });
});

function editarArticuclo(id_articulo){
    console.log(id_articulo);
}