$(document).ready(function () {

    $("#tablaClientes").DataTable({
        searching: false,
        bInfo: false,
        paging: false,
        orden: []
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