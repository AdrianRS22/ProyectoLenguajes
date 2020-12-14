<?php
include '../../includes/conexion.php';

if($_POST){
    $stmt = oci_parse($db, "BEGIN CATEGORIAS.ACTUALIZAR(:id, :nombre, :desc); END;");

    oci_bind_by_name($stmt, ':id', $id, 11);
    oci_bind_by_name($stmt, ':nombre', $nombre, 100);
    oci_bind_by_name($stmt, ':desc', $descripcion, 255);

    $id = (int)$_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    oci_execute($stmt);
}