<?php

if (isset($_GET['table'])) {
    header('Content-Type: text/html; charset=utf-8');
    include 'config.php';
    conectar();
    switch ($_GET['table']) {

        case "Sabores":
            //This case don't work because of foreign key restriction
            $sql = "DELETE FROM Sabores WHERE Sabores.idSabores=".$_GET['idSabores'];
            mysql_query($sql);
            break;
        case "Titulos":
            $sql = "DELETE FROM Titulos WHERE Titulos.idTitulos=".$_GET['idTitulos'];
            mysql_query($sql);
            break;
        case "Premios":
            $sql = "DELETE FROM Premios WHERE Premios.idPremios=".$_GET['idPremios'];
            mysql_query($sql);
            break;
        default:break;
    }
    
}
?>
