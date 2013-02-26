<?php

header('Content-Type: text/html; charset=utf-8');
include 'config.php';
conectar();

if (isset($_GET['cupon'])) {
    $sql = "SELECT pp.*, p.nombre as Premio, t.nombre as Titulo FROM `PersonaPremio` pp
LEFT JOIN Premios p on (pp.idPremios = p.idPremios)
LEFT JOIN Titulos t on (pp.idTitulos = t.idTitulos) WHERE CodigoUnico = '{$_GET['cupon']}' AND flag=0";

    $data = array();
    $result = mysql_query($sql);

    while ($row = mysql_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
}
?>
