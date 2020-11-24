<?php

spl_autoload_register(function($nombreClase){
    include 'controllers/' . $nombreClase . '.php';
});