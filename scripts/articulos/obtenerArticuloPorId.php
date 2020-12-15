<?php
include '../../includes/conexion.php';

$articulo = [];

if(isset($_GET)){
    $consulta = "BEGIN FETCHARTICULO(:id_articulo, :id_categoria, :nombre, :precio, :codigo_cabys); END;";

    $stmt = oci_parse($db, $consulta);
    
    oci_bind_by_name($stmt, ":id_articulo", $id_articulo, 11);
    
    oci_bind_by_name($stmt, ":id_categoria", $id_categoria, 11);
    oci_bind_by_name($stmt, ":nombre", $nombre, 100);
    oci_bind_by_name($stmt, ":precio", $precio, 11);
    oci_bind_by_name($stmt, ":codigo_cabys", $codigo_cabys, 50);
    
    $id_articulo = $_GET['id_articulo'];

    oci_execute($stmt);
    
    $articulo['id_categoria'] = $id_categoria;
    $articulo['nombre'] = $nombre;
    $articulo['precio'] = $precio;
    $articulo['codigo_cabys'] = $codigo_cabys;
    
    oci_free_statement($stmt);
    echo json_encode($articulo);
}

