<?php
$db = oci_connect('SUPERMERCADO', 'ORACLE', 'localhost/home') or trigger_error(E_USER_ERROR);

if($db){
    //echo 'Conexion exitosa';
}