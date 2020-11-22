<?php
include 'config/config.php';

$conn = oci_connect(oci_username, oci_password, oci_connection_string) or trigger_error(E_USER_ERROR);

if ($conn) {
    echo 'Conexión exitosa';
}

/*
$stid = oci_parse($conn, 'SELECT * FROM Provincia');
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    var_dump($row);
}

oci_free_statement($stid);
oci_close($conn);
*/
