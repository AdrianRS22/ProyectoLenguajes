<?php
require_once 'includes/cabecera.php';


?>

<div class="container" id="contenido">
    <button class="btn btn-lg btn-primary mb-3" id="comprarArticulo" data-toggle="modal" data-target="#modalCompra">Comprar</button>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalCompra">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comprar artículos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalCompraFormulario">
                <div class="modal-body">
                    <input type="hidden" id="idCliente">
                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control" name="cliente" id="clienteCompra"></select>
                    </div>
                    <div class="form-group">
                        <label>Artículo</label>
                        <select class="form-control selectpicker" name="articulos[]" id="articuloCompra" multiple></select>
                    </div>
                    <div class="form-group">
                        <label>Modo de Pago</label>
                        <select class="form-control" name="modopago" id="modoPagoCompra"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Comprar"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'?>
<script src="assets/js/pages/compra.js"></script>
</body>

</html>