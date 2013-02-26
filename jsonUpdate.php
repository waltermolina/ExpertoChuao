<?php

if (isset($_GET['table'])) {
    header('Content-Type: text/html; charset=utf-8');
    include 'config.php';
    conectar();
    switch ($_GET['table']) {

        case "Sabores":
            $sql = "UPDATE Sabores SET nombre = '{$_GET['nombre']}',descripcion ='{$_GET['descripcion']}',imagen ='{$_GET['imagen']}',color ='{$_GET['color']}'
             WHERE idSabores = {$_GET['idSabores']}";

            mysql_query($sql);
            break;
        case "Titulos":
            $sql = "UPDATE Titulos SET nombre = '{$_GET['nombre']}',descripcion ='{$_GET['descripcion']}',imagen ='{$_GET['imagen']}'
             WHERE idTitulos = {$_GET['idTitulos']}";

            mysql_query($sql);
            break;
        case "Premios":
            $sql = "UPDATE Premios SET nombre = '{$_GET['nombre']}',descripcion ='{$_GET['descripcion']}',imagen ='{$_GET['imagen']}'
             WHERE idPremios = {$_GET['idPremios']}";

            mysql_query($sql);
            break;
        default:break;
    }
}
?>
