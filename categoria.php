<?php
require_once 'includes/cabecera.php';

?>

<div class="container" id="contenido">
    <button class="btn btn-lg btn-primary mb-3" id="addCategoria">Añadir Categoría</button>

    <table id="tablaCategorias" class="table" style="width:100%">
        <thead class="thead-dark">

        </thead>
    </table>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalAddEditCategoria">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddEditCategoriaTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idCategoria">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombreCategoria"
                        placeholder="Nombre Categoría">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcionCategoria" placeholder="Descripcion Categoria"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modalAddCategoriaSubmit">Añadir</button>
                <button type="button" class="btn btn-primary" id="modalEditCategoriaSubmit">Editar</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="assets/js/pages/categorias.js"></script>
</body>

</html>