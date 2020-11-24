<?php

class DataBase {
    
    /* La conexion a la base fue probada lo que haremos sera llamar la funcion connect en los modelos
    y ahi es donde definiremos los procedimientos, funciones, triggers y paquetes que seran llamados
    a traves de un controlador.
    */
    public static function connect(){
        $db = oci_connect("SUPERMERCADO", "ORACLE", "localhost/home") or trigger_error(E_USER_ERROR);
        return $db;
    }
    
}