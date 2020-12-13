<?php
require_once 'includes/cabecera.php';

?>

<div class="container" id="contenido">
    <a href="#" class="btn btn-lg btn-primary mb-3">Añadir Cliente</a>

    <table id="tablaClientes" class="table" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre Completo</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Teléfono</th>
            </tr>
        </thead>
    </table>
</div>



<?php require_once 'includes/footer.php' ?>
<script src="assets/js/pages/clientes.js"></script>
</body>

</html>