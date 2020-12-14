<?php
include '../../includes/conexion.php';

$articulos = [];

$consulta = "DECLARE cursorArticulo SYS_REFCURSOR;
BEGIN 
    OPEN cursorArticulo FOR SELECT ID_ARTICULO, OBTENERNOMBRECATEGORIA(ID_CATEGORIA) CATEGORIA, NOMBRE, PRECIO, CODIGO_CABYS  FROM ARTICULO;
    :cursor := cursorArticulo;
END;";

$cursorArticulo = oci_new_cursor($db);
$stmt = oci_parse($db, $consulta);
oci_bind_by_name($stmt, ":cursor", $cursorArticulo, -1, OCI_B_CURSOR);
oci_execute($stmt);

oci_execute($cursorArticulo);
while ($fila = oci_fetch_array($cursorArticulo, OCI_ASSOC)) {
    array_push($articulos, $fila);
}

oci_free_statement($stmt);
oci_free_statement($cursorArticulo);

echo json_encode($articulos);
