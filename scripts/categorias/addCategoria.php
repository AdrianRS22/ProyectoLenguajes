<?php
include '../../includes/conexion.php';

if($_POST){
    $stmt = oci_parse($db, "BEGIN CATEGORIAS.CREAR(:nombre, :desc); END;");

    oci_bind_by_name($stmt, ':nombre', $nombre, 100);
    oci_bind_by_name($stmt, ':desc', $descripcion, 255);

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    oci_execute($stmt);
    oci_free_statement($stmt);
}
