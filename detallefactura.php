<?php
require_once 'includes/cabecera.php';

$num_factura = 0;
if(isset($_GET['num_factura'])){
    $num_factura = $_GET['num_factura'];
}else{
    header("Location: factura.php");
}
?>
<input type="hidden" id="numfactura" value="<?= $num_factura ?>">

<div class="container" id="contenido">
    <a class="btn btn-lg btn-primary mb-3" href="factura.php">Volver</a>

    <table id="tablaDetallesFactura" class="table" style="width:100%">
        <thead class="thead-dark">
        
        </thead>
    </table>
</div>

<?php require_once 'includes/footer.php'?>
<script src="assets/js/pages/detallefactura.js"></script>
</body>

</html>