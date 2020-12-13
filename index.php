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

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" id="nombreInputText" disabled />
    </div>

    <div class="form-group">
        <label>Moroso</label>
        <input type="text" class="form-control" id="morosoInputText" disabled />
    </div>

    <div class="form-group">
        <label>Descripción</label>
        <textarea class="form-control" id="descripcionInputText" rows="4" disabled></textarea>
    </div>

</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/index.js"></script>
</body>

</html>