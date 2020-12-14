<?php
require_once 'includes/cabecera.php';

?>

<div class="container" id="contenido">
    <button class="btn btn-lg btn-primary mb-3" id="addCliente">Añadir Cliente</button>

    <table id="tablaClientes" class="table" style="width:100%">
        <thead class="thead-dark">
        
        </thead>
    </table>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalAddEditCliente">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddEditClienteTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idCliente">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombreCliente" placeholder="Nombre Cliente">
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" class="form-control" id="apellidoCliente" placeholder="Apellido Cliente">
                </div>
                <div class="form-group">
                    <label>Provincia</label>
                    <select class="form-control" id="provinciaCliente"></select>
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <textarea class="form-control" id="direccionCliente" placeholder="Direccion Cliente"></textarea>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" class="form-control" id="correoCliente" placeholder="Correo Cliente">
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="number" class="form-control" id="telefonoCliente" placeholder="Telefono Cliente"
                        min="10" max="10">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modalAddClienteSubmit">Añadir</button>
                <button type="button" class="btn btn-primary" id="modalEditClienteSubmit">Editar</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="assets/js/pages/clientes.js"></script>
</body>

</html>