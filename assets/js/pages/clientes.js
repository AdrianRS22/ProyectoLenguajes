$(document).ready(function () {

    $("#tablaClientes").DataTable({
        searching: false,
        bInfo: false,
        paging: false,
        orden: [],
        ajax: {
            url: "scripts/clientes/obtenerClientes.php",
            type: "GET",
            dataSrc: ""
        },
        columns: [
            { data: 'ID_CLIENTE', title: "Id" },
            { data: 'NOMBRECOMPLETO', title: "Nombre Completo" },
            { data: 'PROVINCIA', title: "Provincia" },
            { data: 'DIRECCION', title: "Dirección" },
            { data: 'CORREO', title: "Correo" },
            { data: 'TELEFONO', title: "Teléfono" },
            { data: 'ID_CLIENTE', title: 'Acción'}
        ],
        columnDefs: [
            {
                targets: 6,
                className: 'text-center',
                render: function (data, type, fila) {
                    return '<button class="btn btn-success" onclick="editarCliente(' + data + ')">Actualizar</button>';
                }
            }
        ]
    });

    $("#addCliente").click(function (e) { 
        e.preventDefault();
        
        $("#modalAddEditClienteTitle").html('Añadir Cliente');

        $("#modalAddClienteSubmit").removeClass('d-none').addClass('d-block');
        $("#modalEditClienteSubmit").removeClass('d-block').addClass('d-none');

        $("#modalAddEditCliente").modal("show");
    });

    $("#modalAddClienteSubmit").click(function (e) { 
        e.preventDefault();

        var nombre = $("#nombreCliente").val();
        var apellido = $("#apellidoCliente").val();
        var provincia = $("#provinciaCliente").val();
        var direccion = $("#direccionCliente").val();
        var correo = $("#correoCliente").val();
        var telefono = $("#telefonoCliente").val();
        
        $.ajax({
            type: "POST",
            url: "scripts/clientes/addCliente.php",
            data: {
                nombre: nombre, 
                apellido: apellido,
                provincia: provincia,
                direccion: direccion,
                correo: correo,
                telefono: telefono
            },
            success: function () {
                swal({
                    title: "Cliente añadido",
                    text: "El cliente ha sido añadido exitosamente",
                    icon: "success"
                })
                .then(() => {
                    window.location.reload();
                });
            }
        });
    });


    $.ajax({
        dataType: "json",
        url: "https://ubicaciones.paginasweb.cr/provincias.json",
        data: {},
        success: function (data) {
            var html = "<select>";
            html += "<option value=''></option>";
            for(key in data) {
                let provincia = data[key];
                html += "<option value='" + provincia + "'>" + provincia + "</option>";
            }
            html += "</select";
            $('#provinciaCliente').html(html);
        }
    });
});

function editarCliente(id_cliente){
    $("#modalAddEditClienteTitle").html('Editar Cliente');

    $("#modalAddClienteSubmit").removeClass('d-block').addClass('d-none');
    $("#modalEditClienteSubmit").removeClass('d-none').addClass('d-block');

    $.ajax({
        type: "POST",
        url: "scripts/clientes/obtenerClientePorId.php",
        data: {
            id_cliente: id_cliente
        },
        success: function (res) {

            var decodedResponse = $.parseJSON(res);

            $("#nombreCliente").val(decodedResponse.nombre);
            $("#apellidoCliente").val(decodedResponse.apellido);
            $("#provinciaCliente").val(decodedResponse.provincia);
            $("#direccionCliente").val(decodedResponse.direccion);
            $("#correoCliente").val(decodedResponse.correo);
            $("#telefonoCliente").val(decodedResponse.telefono);

            $("#modalAddEditCliente").modal("show");

        }
    });
}