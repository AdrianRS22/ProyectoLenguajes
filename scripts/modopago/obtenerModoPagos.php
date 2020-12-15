<?php
include '../../includes/conexion.php';

$modo_pagos = [];

$consulta = "DECLARE cursorModoPago SYS_REFCURSOR;
BEGIN 
    OPEN cursorModoPago FOR SELECT * FROM MODO_PAGO;
    :cursor := cursorModoPago;
END;";

$cursorModoPago = oci_new_cursor($db);
$stmt = oci_parse($db, $consulta);
oci_bind_by_name($stmt, ":cursor", $cursorModoPago, -1, OCI_B_CURSOR);
oci_execute($stmt);

oci_execute($cursorModoPago);
while ($fila = oci_fetch_array($cursorModoPago, OCI_ASSOC)) {
    array_push($modo_pagos, $fila);
}

oci_free_statement($stmt);
oci_free_statement($cursorModoPago);

echo json_encode($modo_pagos);
