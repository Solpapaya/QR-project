<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=qr_fecha_prueba user=postgres password=password");

if(!$dbconn) {
    echo "Failed Connexion";
    exit;
}
?>