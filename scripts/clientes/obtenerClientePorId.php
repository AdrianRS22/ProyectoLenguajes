<?php
include '../../includes/conexion.php';

$cliente = [];

$_GET['id_cliente'] = 1;

if($_GET){
    $consulta = "BEGIN FETCHCLIENTE(:id_cliente, :nombre, :apellido, :provincia, :direccion, :correo, :telefono); END;";

    $stmt = oci_parse($db, $consulta);
    
    oci_bind_by_name($stmt, ":id_cliente", $id_cliente, 11);
    
    oci_bind_by_name($stmt, ":nombre", $nombre, 100);
    oci_bind_by_name($stmt, ":apellido", $apellido, 100);
    oci_bind_by_name($stmt, ":provincia", $provincia, 100);
    oci_bind_by_name($stmt, ":direccion", $direccion, 255);
    oci_bind_by_name($stmt, ":correo", $correo, 100);
    oci_bind_by_name($stmt, ":telefono", $telefono, 10);
    
    $id_cliente = $_GET['id_cliente'];
    
    oci_execute($stmt);
    
    $cliente['nombre'] = $nombre;
    $cliente['apellido'] = $apellido;
    $cliente['provincia'] = $provincia;
    $cliente['direccion'] = $direccion;
    $cliente['correo'] = $correo;
    $cliente['telefono'] = $telefono;
    
    oci_free_statement($stmt);
    echo json_encode($cliente);
}

