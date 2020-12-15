<?php
include '../../includes/conexion.php';

if (isset($_POST)) {
    $id_factura = crearFactura($db);

    foreach ($_POST['articulos'] as $articulo) {
        $id_articulo = (int)$articulo;
        crearDetalleFactura($db, $id_factura, $id_articulo);
    }
}

function crearFactura($db)
{
    $stmt = oci_parse($db, "BEGIN CREARFACTURA(:id_cliente, :id_modopago, :num_factura); END;");

    oci_bind_by_name($stmt, ':id_cliente', $id_cliente, 11);
    oci_bind_by_name($stmt, ":id_modopago", $id_modopago, 11);
    oci_bind_by_name($stmt, ":num_factura", $num_factura, 11);

    $id_cliente = (int)$_POST['cliente'];
    $id_modopago = (int)$_POST['modopago'];

    oci_execute($stmt);

    oci_free_statement($stmt);

    return (int)$num_factura;
}

function crearDetalleFactura($db, $id_factura, $id_articulo){
    $stmt = oci_parse($db, "BEGIN CREARDETALLEFACTURA(:id_factura, :id_articulo); END;");

    oci_bind_by_name($stmt, ':id_factura', $id_factura, 11);
    oci_bind_by_name($stmt, ':id_articulo', $id_articulo, 11);

    oci_execute($stmt);

    oci_free_statement($stmt);
}