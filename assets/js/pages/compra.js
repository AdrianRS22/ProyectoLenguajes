$(document).ready(function () {

    $("#tablaFacturas").DataTable({
        searching: false,
        bInfo: false,
        paging: false,
        orden: [],
        ajax: {
            url: "scripts/facturas/obtenerFacturas.php",
            type: "GET",
            dataSrc: ""
        },
        columns: [
            { data: 'NUM_FACTURA', title: "Número Factura" },
            { data: 'MODOPAGO', title: "Modo de Pago" },
            { data: 'NOMBRECLIENTE', title: "Nombre Cliente" },
            { data: 'IVA', title: "iva" },
            { data: 'DESCUENTO', title: "descuento" },
            { data: 'FECHA', title: "fecha" },
            { data: 'NUM_FACTURA', title: 'Acción'}
        ],
        columnDefs: [
            {
                targets: 6,
                className: 'text-center',
                render: function (data, type, fila) {
                    return '<button class="btn btn-info" onclick="verDetallesFactura(' + data + ')">Ver Detalles</button>';
                }
            }
        ]
    });

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
            var html = "<select class='selectpicker' multiple>";
            html += "<option value='' disabled></option>";
            for(key in data) {
                let idArticulo = data[key].ID_ARTICULO;
                let nombreArticulo = data[key].NOMBRE;
                html += "<option value='" + idArticulo + "'>" + nombreArticulo + "</option>";
            }
            html += "</select>";
            $('#articuloCompra').html(html);
            $("#articuloCompra").selectpicker('refresh');
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

    $("#modalCompraFormulario").on('submit', function (e) {
        e.preventDefault();

        var datosFormulario = $(this).serializeArray();

        $.ajax({
            type: "POST",
            url: "scripts/articulos/comprarArticulo.php",
            data: datosFormulario,
            success: function () {

            }
        });
    });

});

function verDetallesFactura(num_factura){
    console.log(num_factura);
}