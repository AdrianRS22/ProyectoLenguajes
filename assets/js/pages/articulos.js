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

    $.ajax({
        dataType: "json",
        url: "scripts/categorias/obtenerCategorias.php",
        data: {},
        success: function (data) {
            var html = "<select>";
            html += "<option value=''></option>";
            for(key in data) {
                let nombreCategoria = data[key].NOMBRE;
                html += "<option value='" + key + "'>" + nombreCategoria + "</option>";
            }
            html += "</select";
            $('#categoriaArticulo').html(html);
        }
    });

    $("#addArticulo").click(function (e) { 
        e.preventDefault();

        $("#modalAddEditArticuloTitle").html('Añadir Cliente');

        $("#modalAddArticuloSubmit").removeClass('d-none').addClass('d-block');
        $("#modalEditArticuloSubmit").removeClass('d-block').addClass('d-none');

        $("#modalAddEditArticulo").modal("show");
        
    });
});

function editarArticuclo(id_articulo){
    console.log(id_articulo);
}