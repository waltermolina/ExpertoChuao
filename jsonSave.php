<?php

if (isset($_GET['table'])) {
    header('Content-Type: text/html; charset=utf-8');
    include 'config.php';
    conectar();
    switch ($_GET['table']) {

        case "Sabores":
            $nombre = mysql_real_escape_string($_GET['nombre']);
            $descripcion = mysql_real_escape_string($_GET['descripcion']);
            $imagen = mysql_real_escape_string($_GET['imagen']);
            $color = mysql_real_escape_string($_GET['color']);

            $sql = "insert into Sabores values(0,'{$nombre}','{$descripcion}','{$imagen}','{$color}')";
            
            mysql_query($sql);
            break;
        case "Titulos":
            $nombre = mysql_real_escape_string($_GET['nombre']);
            $descripcion = mysql_real_escape_string($_GET['descripcion']);
            $imagen = mysql_real_escape_string($_GET['imagen']);

            $sql = "insert into Titulos values(0,'{$nombre}','{$descripcion}','{$imagen}')";
            
            mysql_query($sql);
            break;
        case "Premios":
            $nombre = mysql_real_escape_string($_GET['nombre']);
            $descripcion = mysql_real_escape_string($_GET['descripcion']);
            $imagen = mysql_real_escape_string($_GET['imagen']);

            $sql = "insert into Premios values(0,'{$nombre}','{$descripcion}','{$imagen}')";
            
            mysql_query($sql);
            break;
        default:break;
    }
}
?>
