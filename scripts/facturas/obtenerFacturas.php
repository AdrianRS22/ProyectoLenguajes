<?php
include '../../includes/conexion.php';

$facturas = [];

$consulta = "
DECLARE cursorFactura SYS_REFCURSOR;
BEGIN 
    OPEN cursorFactura FOR SELECT NUM_FACTURA, OBTENERMODOPAGO(ID_MODOPAGO) MODOPAGO, OBTENERCLIENTEPORID(ID_CLIENTE) NOMBRECLIENTE, IVA, DESCUENTO, FORMATEARPRECIO(SUBTOTAL) SUBTOTAL, FORMATEARPRECIO(TOTAL) TOTAL,FECHA FROM FACTURA;
    :cursor := cursorFactura;
END;";

$cursorFactura = oci_new_cursor($db);
$stmt = oci_parse($db, $consulta);
oci_bind_by_name($stmt, ":cursor", $cursorFactura, -1, OCI_B_CURSOR);
oci_execute($stmt);

oci_execute($cursorFactura);
while ($fila = oci_fetch_array($cursorFactura, OCI_ASSOC)) {
    array_push($facturas, $fila);
}

oci_free_statement($stmt);
oci_free_statement($cursorFactura);

echo json_encode($facturas);
