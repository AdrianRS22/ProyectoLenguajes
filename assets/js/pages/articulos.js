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
                let idCategoria = data[key].ID_CATEGORIA;
                let nombreCategoria = data[key].NOMBRE;
                html += "<option value='" + idCategoria + "'>" + nombreCategoria + "</option>";
            }
            html += "</select";
            $('#categoriaArticulo').html(html);
        }
    });

    $("#addArticulo").click(function (e) { 
        e.preventDefault();

        $("#modalAddEditArticuloTitle").html('Añadir Artículo');

        $("#modalAddArticuloSubmit").removeClass('d-none').addClass('d-block');
        $("#modalEditArticuloSubmit").removeClass('d-block').addClass('d-none');

        $("#modalAddEditArticulo").modal("show");
        
    });

    $("#modalAddArticuloSubmit").click(function (e) { 
        e.preventDefault();

        var id_categoria = $("#categoriaArticulo").val();
        var nombre = $("#nombreArticulo").val();
        var precio = $("#precioArticulo").val();
        var codigo_cabys = $("#codigoCabysArticulo").val();

        $.ajax({
            type: "POST",
            url: "scripts/articulos/addArticulo.php",
            data: {
                id_categoria: id_categoria,
                nombre: nombre,
                precio: precio,
                codigo_cabys: codigo_cabys
            },
            success: function () {
                swal({
                    title: "Artículo añadido",
                    text: "El artículo ha sido añadido exitosamente",
                    icon: "success"
                })
                .then(() => {
                    window.location.reload();
                });
            }
        });
    });

    $("#modalEditArticuloSubmit").click(function (e) { 
        e.preventDefault();
        
        var id_articulo = $("#idArticulo").val();
        var id_categoria = $("#categoriaArticulo").val();
        var nombre = $("#nombreArticulo").val();
        var precio = $("#precioArticulo").val();
        var codigo_cabys = $("#codigoCabysArticulo").val();

        $.ajax({
            type: "POST",
            url: "scripts/articulos/editArticulo.php",
            data: {
                id_articulo: id_articulo,
                id_categoria: id_categoria,
                nombre: nombre,
                precio: precio,
                codigo_cabys: codigo_cabys
            },
            success: function () {
                swal({
                    title: "Artículo editado",
                    text: "El artículo ha sido editado exitosamente",
                    icon: "success"
                })
                .then(() => {
                    window.location.reload();
                });
            }
        });
    });
});

function editarArticulo(id_articulo){
    $("#modalAddEditArticuloTitle").html('Editar Artículo');

    $("#modalAddArticuloSubmit").removeClass('d-block').addClass('d-none');
    $("#modalEditArticuloSubmit").removeClass('d-none').addClass('d-block');

    $.ajax({
        type: "GET",
        url: "scripts/articulos/obtenerArticuloPorId.php",
        data: {
            id_articulo: id_articulo
        },
        success: function (res) {

            var decodedResponse = $.parseJSON(res);

            $("#idArticulo").val(id_articulo);
            $("#categoriaArticulo").val(decodedResponse.id_categoria);
            $("#nombreArticulo").val(decodedResponse.nombre);
            $("#precioArticulo").val(decodedResponse.precio);
            $("#codigoCabysArticulo").val(decodedResponse.codigo_cabys);

            $("#modalAddEditArticulo").modal("show");
        }
    });
}