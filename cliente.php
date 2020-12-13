<?php
require_once 'includes/cabecera.php';

?>

<div class="container" id="contenido">

    <form id="formulario" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6 mt-2">
                <div class="form-group">
                    <label for="identificacionInputText">Identificación</label>
                    <input type="text" class="form-control" name="identificacionInputText" id="identificacionInputText"
                        required />

                </div>
            </div>
            <div class="col-sm-6 mt-5">
                <input type="submit" class="form-control btn btn-primary" value="Consultar" />
            </div>
        </div>
    </form>
</div>