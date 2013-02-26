<?php

if (isset($_GET['table'])) {
    header('Content-Type: text/html; charset=utf-8');
    include 'config.php';
    conectar();
    switch ($_GET['table']) {

        case "Sabores":
            $sql = "insert into Sabores values(0,'{$_GET['nombre']}','{$_GET['descripcion']}','{$_GET['imagen']}','{$_GET['color']}')";
            
            mysql_query($sql);
            break;
        case "Titulos":
            $sql = "insert into Titulos values(0,'{$_GET['nombre']}','{$_GET['descripcion']}','{$_GET['imagen']}')";
            
            mysql_query($sql);
            break;
        case "Premios":
            $sql = "insert into Premios values(0,'{$_GET['nombre']}','{$_GET['descripcion']}','{$_GET['imagen']}')";
            
            mysql_query($sql);
            break;
        default:break;
    }
}
?>
