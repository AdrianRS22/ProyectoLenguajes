<?php
include '../../includes/conexion.php';

$categorias = [];

$stmt = oci_parse($db, "SELECT * FROM CATEGORIA");
oci_execute($stmt);

while (($fila = oci_fetch_array($stmt, OCI_ASSOC))) {
    array_push($categorias, $fila);
}

echo json_encode($categorias);