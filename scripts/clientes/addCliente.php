<?php
include '../../includes/conexion.php';

if(isset($_POST)){

    $consulta = "BEGIN CLIENTES.INSERTAR(
    :nombre, :apellido, :provincia, :direccion, :correo, :telefono
    ); END;";
    $stmt = oci_parse($db, $consulta);

    oci_bind_by_name($stmt, ':nombre', $nombre, 100);
    oci_bind_by_name($stmt, ':apellido', $apellido, 100);
    oci_bind_by_name($stmt, ':provincia', $provincia, 100);
    oci_bind_by_name($stmt, ':direccion', $direccion, 255);
    oci_bind_by_name($stmt, ':correo', $correo, 100);
    oci_bind_by_name($stmt, ':telefono', $telefono, 10);

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $provincia = $_POST['provincia'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    oci_execute($stmt);
    oci_free_statement($stmt);
}
