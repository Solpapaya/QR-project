<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=qr user=postgres password=password");

if(!$dbconn) {
    echo "Failed Connexion";
    exit;
}
?>