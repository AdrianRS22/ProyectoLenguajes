<?php

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Adrian Rojas">

    <title>Proyecto Lenguajes</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <!-- Cabecera -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-darkblue">
        <a class="navbar-brand" href="index.php">Proyecto Lenguajes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= substr($_SERVER['SCRIPT_NAME'],19) == 'cliente.php' ? 'active' : ''?>">
                    <a class="nav-link" href="cliente.php">Clientes <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?= substr($_SERVER['SCRIPT_NAME'],19) == 'articulo.php' ? 'active' : ''?>">
                    <a class="nav-link" href="articulo.php">Artículos</a>
                </li>
                <li class="nav-item <?= substr($_SERVER['SCRIPT_NAME'],19) == 'categoria.php' ? 'active' : ''?>">
                    <a class="nav-link" href="categoria.php">Categorías</a>
                </li>
                <li class="nav-item <?= substr($_SERVER['SCRIPT_NAME'],19) == 'factura.php' ? 'active' : ''?>">
                    <a class="nav-link" href="factura.php">Facturas</a>
                </li>
            </ul>
        </div>
    </nav>