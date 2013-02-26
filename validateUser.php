<?php
session_start();
//header('Content-Type: text/html; charset=utf-8');
include 'config.php';
conectar();

$isAjax = $_REQUEST['isAjax'];
if (isset($isAjax) && $isAjax) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $datosUsuario = login($username, $password);
    if ($datosUsuario) {
        $_SESSION["uid"] = $datosUsuario["uid"];
        echo "success";
    }
}

function login($user, $pass) {
    $pass= md5(mysql_real_escape_string(stripslashes(htmlentities(strip_tags($pass)))));
    $user= mysql_real_escape_string(stripslashes(htmlentities(strip_tags($user))));
    $query = "SELECT * FROM `Usuario` WHERE `username`='$user' AND `pass`='$pass'";

    $result = mysql_query($query);
    if (mysql_num_rows($result) > 0) {
        $userData = mysql_fetch_assoc($result);
        return $userData;
    } else {
        return false;
    }
}

?>