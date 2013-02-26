<?php

header('Content-Type: text/html; charset=utf-8');
include 'config.php';
conectar();

if (isset($_GET['cupon'])) {
    $sql = "UPDATE PersonaPremio SET flag =1 WHERE CodigoUnico = '{$_GET['cupon']}'";
    mysql_query($sql);
}
?>
