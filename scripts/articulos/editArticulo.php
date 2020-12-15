<?php
include '../../includes/conexion.php';

if($_POST){
    $stmt = oci_parse($db, "BEGIN UpdateArticulo(:id_articulo, :id_categoria, :nombre, :precio, :codigo_cabys); END;");

    oci_bind_by_name($stmt, ':id_articulo', $id_articulo, 11);
    oci_bind_by_name($stmt, ':id_categoria', $id_categoria, 11);
    oci_bind_by_name($stmt, ':nombre', $nombre, 100);
    oci_bind_by_name($stmt, ':precio', $precio, 11);
    oci_bind_by_name($stmt, ':codigo_cabys', $codigo_cabys, 50);

    $id_articulo = (int)$_POST['id_articulo'];
    $id_categoria = (int)$_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $precio = floatval($_POST['precio']);
    $codigo_cabys = $_POST['codigo_cabys'];
    
    oci_execute($stmt);
    oci_free_statement($stmt);
}