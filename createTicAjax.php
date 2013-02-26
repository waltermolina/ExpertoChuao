<?php

header('Content-Type: text/html; charset=utf-8');
include 'config.php';
conectar();

if (isset($_POST['codigoCupon'])) {
    $sql = "INSERT INTO Cupon values (0, '{$_POST['fecha']}','{$_POST['codigoCupon']}')";
    if (mysql_query($sql)) {
        $id = mysql_insert_id();

        $sabores = explode(',', $_POST['sabores']);
        foreach ($sabores as $sabor) {
            $time = time();
            $code = $time + $sabor;
            $sql = "insert into DetalleCupon values(0,0,'{$code}',{$id},$sabor)";
            if (mysql_query($sql)) {
                echo "Sabor $sabor Guardado...";
            }
        }
        echo "Success";
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        throw new HttpException;
    }
}
?>
