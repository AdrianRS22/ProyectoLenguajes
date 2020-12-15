$(document).ready(function () {
    
    $.ajax({
        dataType: "json",
        url: "scripts/clientes/obtenerClientes.php",
        data: {},
        success: function (data) {
            var html = "<select>";
            html += "<option value=''></option>";
            for(key in data) {
                let idCliente = data[key].ID_CLIENTE;
                let nombreCliente = data[key].NOMBRECOMPLETO;
                html += "<option value='" + idCliente + "'>" + nombreCliente + "</option>";
            }
            html += "</select";
            $('#clienteCompra').html(html);
        }
    });

    $.ajax({
        dataType: "json",
        url: "scripts/articulos/obtenerArticulos.php",
        data: {},
        success: function (data) {
            var html = "<select>";
            html += "<option value=''></option>";
            for(key in data) {
                let idArticulo = data[key].ID_ARTICULO;
                let nombreArticulo = data[key].NOMBRE;
                html += "<option value='" + idArticulo + "'>" + nombreArticulo + "</option>";
            }
            html += "</select";
            $('#articuloCompra').html(html);
        }
    });

    $.ajax({
        dataType: "json",
        url: "scripts/modopago/obtenerModoPagos.php",
        data: {},
        success: function (data) {
            var html = "<select>";
            html += "<option value=''></option>";
            for(key in data) {
                let idModoPago = data[key].ID_MODOPAGO;
                let nombreModoPago = data[key].NOMBRE;
                html += "<option value='" + idModoPago + "'>" + nombreModoPago + "</option>";
            }
            html += "</select";
            $('#modoPagoCompra').html(html);
        }
    });

});