<?php
require_once 'includes/cabecera.php';

?>

<div class="container" id="contenido">
    <button class="btn btn-lg btn-primary mb-3" id="addArticulo">Añadir Artículo</button>

    <table id="tablaArticulos" class="table" style="width:100%">
        <thead class="thead-dark">

        </thead>
    </table>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalAddEditArticulo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddEditArticuloTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idArticulo">
                <div class="form-group">
                    <label>Categoría</label>
                    <select class="form-control" id="categoriaArticulo"></select>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombreArticulo" placeholder="Nombre Artículo">
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="text" class="form-control" id="precioArticulo" placeholder="Precio Artículo">
                </div>
                <div class="form-group">
                    <label>Código Cabys</label>
                    <input type="text" class="form-control" id="codigoCabysArticulo" placeholder="Código Cabys Artículo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modalAddArticuloSubmit">Añadir</button>
                <button type="button" class="btn btn-primary" id="modalEditArticuloSubmit">Editar</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="assets/js/pages/articulos.js"></script>
</body>

</html>