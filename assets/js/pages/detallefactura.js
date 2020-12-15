$(document).ready(function () {

    var num_factura = $("#numfactura").val();

    $("#tablaDetallesFactura").DataTable({
        searching: false,
        bInfo: false,
        paging: false,
        orden: [],
        ajax: {
            url: "scripts/facturas/obtenerDetallesFactura.php",
            type: "GET",
            dataSrc: "",
            data: {num_factura: num_factura}
        },
        columns: [
            { data: 'NUM_DETALLEFACTURA', title: "Número Detalle Factura" },
            { data: 'NOMBREARTICULO', title: "Artículo" },
            { data: 'PRECIOARTICULO', title: "Precio" }
        ]
    });


});