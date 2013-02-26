<?php

if (isset($_GET['place'])) {
    header('Content-Type: text/html; charset=utf-8');
    include 'config.php';
    conectar();
    $images = array();
    $sql = "SELECT im.ID, im.name, im.type FROM Image as im where im.type = '" . $_GET['place'] . "'";
    $result = mysql_query($sql);
    
    while ($row = mysql_fetch_assoc($result)) {
        $images[] = $row;
    }

    echo json_encode($images);
}
?>
