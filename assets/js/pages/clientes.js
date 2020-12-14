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