$(document).ready(function () {
    $("#tablaCategorias").DataTable({
        searching: false,
        bInfo: false,
        paging: false,
        orden: [],
        ajax: {
            url: "scripts/categorias/obtenerCategorias.php",
            type: "GET",
            dataSrc: ""
        },
        columns: [
            { data: 'ID_CATEGORIA', title: "Id Categoría" },
            { data: 'NOMBRE', title: "Nombre" },
            { data: 'DESCRIPCION', title: "Descripción" },
            { data: 'ID_CATEGORIA', title: "Acción" }
        ],
        columnDefs: [
            {
                targets: 3,
                className: 'text-center',
                render: function (data, type, fila) {
                    return '<button class="btn btn-success" onclick="editarCategoria(' + data +',\'' + fila.NOMBRE+ '\',\'' + fila.DESCRIPCION + '\')">Actualizar</button>';
                }
            }
        ]
    });

    $("#addCategoria").click(function (e) { 
        e.preventDefault();

        $("#modalAddEditCategoriaTitle").html("Añadir Categoría");

        $("#idCategoria, #nombreCategoria, #descripcionCategoria").val("");
        
        $("#modalAddCategoriaSubmit").removeClass('d-none').addClass('d-block');
        $("#modalEditCategoriaSubmit").removeClass('d-block').addClass('d-none');

        $("#modalAddEditCategoria").modal('show');
    });

    $("#modalAddCategoriaSubmit").click(function (e) { 
        e.preventDefault();

        var nombre = $("#nombreCategoria").val();
        var descripcion = $("#descripcionCategoria").val();

        $.ajax({
            type: "POST",
            url: "scripts/categorias/addCategoria.php",
            data: {nombre: nombre, descripcion: descripcion},
            success: function () {
                swal({
                    title: "Categoría añadida",
                    text: "La categoría ha sido añadida exitosamente",
                    icon: "success"
                })
                .then(() => {
                    window.location.reload();
                });
            }
        });
    });

    $("#modalEditCategoriaSubmit").click(function (e) { 
        e.preventDefault();

        var id = $("#idCategoria").val();
        var nombre = $("#nombreCategoria").val();
        var descripcion = $("#descripcionCategoria").val();

        $.ajax({
            type: "POST",
            url: "scripts/categorias/editarCategoria.php",
            data: {id_categoria: id, nombre: nombre, descripcion: descripcion},
            success: function () {
                swal({
                    title: "Categoría editada",
                    text: "La categoría ha sido editada exitosamente",
                    icon: "success"
                })
                .then(() => {
                    window.location.reload();
                });
            }
        });

    });
});

function editarCategoria(id, nombre, descripcion){
    $("#modalAddEditCategoriaTitle").html("Editar Categoría");

    $("#idCategoria").val(id);
    $("#nombreCategoria").val(nombre);
    $("#descripcionCategoria").val(descripcion);

    $("#modalAddEditCategoriaSubmit").val("Editar");

    $("#modalAddCategoriaSubmit").removeClass('d-block').addClass('d-none');
    $("#modalEditCategoriaSubmit").removeClass('d-none').addClass('d-block');

    $("#modalAddEditCategoria").modal('show');
}