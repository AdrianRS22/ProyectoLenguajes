<?php
include '../../includes/conexion.php';

if(isset($_GET)){
    $detallefactura = [];
    $num_factura = $_GET['num_factura'];

    $consulta = "
    DECLARE cursorFactura SYS_REFCURSOR;
    BEGIN 
        OPEN cursorFactura FOR 
        SELECT NUM_FACTURA, NUM_DETALLEFACTURA, ARTICULO.NOMBRE NOMBREARTICULO, FORMATEARPRECIO(ARTICULO.PRECIO) PRECIOARTICULO FROM FACTURADETALLE
        INNER JOIN ARTICULO
        USING(ID_ARTICULO)
        WHERE NUM_FACTURA = $num_factura;
        :cursor := cursorFactura;
    END;";
    
    $cursorFactura = oci_new_cursor($db);
    $stmt = oci_parse($db, $consulta);
    oci_bind_by_name($stmt, ":cursor", $cursorFactura, -1, OCI_B_CURSOR);
    oci_execute($stmt);
    
    oci_execute($cursorFactura);
    while ($fila = oci_fetch_array($cursorFactura, OCI_ASSOC)) {
        array_push($detallefactura, $fila);
    }
    
    oci_free_statement($stmt);
    oci_free_statement($cursorFactura);
    
    echo json_encode($detallefactura);
}
