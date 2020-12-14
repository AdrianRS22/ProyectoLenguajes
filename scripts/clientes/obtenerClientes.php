<?php
include '../../includes/conexion.php';

$clientes = [];

$consulta = "
DECLARE cursorCliente SYS_REFCURSOR;
BEGIN 
    OPEN cursorCliente FOR SELECT ID_CLIENTE, CLIENTES.NOMBRECOMPLETO(NOMBRE, APELLIDO) NOMBRECOMPLETO, PROVINCIA, DIRECCION, CORREO, TELEFONO  FROM CLIENTE;
    :cursor := cursorCliente;
END;";

$cursorCliente = oci_new_cursor($db);
$stmt = oci_parse($db, $consulta);
oci_bind_by_name($stmt, ":cursor", $cursorCliente, -1, OCI_B_CURSOR);
oci_execute($stmt);

oci_execute($cursorCliente);
while ($fila = oci_fetch_array($cursorCliente, OCI_ASSOC)) {
    array_push($clientes, $fila);
}

oci_free_statement($stmt);
oci_free_statement($cursorCliente);

echo json_encode($clientes);
