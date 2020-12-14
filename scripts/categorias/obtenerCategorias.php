<?php
include '../../includes/conexion.php';

$categorias = [];

$consulta = "
DECLARE cursorCategoria SYS_REFCURSOR;
BEGIN 
    OPEN cursorCategoria FOR SELECT * FROM CATEGORIA;
    :cursor := cursorCategoria;
END;";

$cursorCategoria = oci_new_cursor($db);
$stmt = oci_parse($db, $consulta);
oci_bind_by_name($stmt, ":cursor", $cursorCategoria, -1, OCI_B_CURSOR);
oci_execute($stmt);

oci_execute($cursorCategoria);
while ($fila = oci_fetch_array($cursorCategoria, OCI_ASSOC)) {
    array_push($categorias, $fila);
}

oci_free_statement($stmt);
oci_free_statement($cursorCategoria);

echo json_encode($categorias);
