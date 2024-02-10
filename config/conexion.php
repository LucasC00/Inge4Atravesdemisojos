<?php
$DB_HOST= 'localhost';
$DB_DATABASE= 'a_traves_de_mis_ojos';
$DB_USER= 'postgres';
$DB_PASSWORD= '1234';

$conexion=pg_connect("host=$DB_HOST dbname=$DB_DATABASE user=$DB_USER password=$DB_PASSWORD");
?>
