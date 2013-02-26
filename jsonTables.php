<?php

if (isset($_GET['table'])) {


    header('Content-Type: text/html; charset=utf-8');
    include 'config.php';
    conectar();
    $array = array();

    switch ($_GET['table']) {
        case "DetalleCupon":
            $sql = "SELECT dc.idDetalleCupon, dc.flag, dc.idCupon, dc.codigoUnico, dc.idSabores, s.nombre
            FROM  DetalleCupon as dc JOIN Sabores as s ON s.idSabores = dc.idSabores where dc.idCupon = {$_GET['idC']}" ;
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $array[] = $row;
            }
            break;
        default:
            $sql = "select * from " . $_GET['table'];
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $array[] = $row;
            }
            break;
    }
    echo json_encode($array);
}
?>
