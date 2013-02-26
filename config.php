<?

function conectar() {

    //'lb000958_chuao', 'abcABC123'
    if (!$link = mysql_connect('localhost', 'dm000125_chuao', '8273ta2c8547H0'))
        print "No se pudo conectar al servidor";

    if (!$db_selected = mysql_select_db('dm000125_chuaoApp', $link))
        echo "no se pudo conectar a la bd";
    
    mysql_query("SET NAMES 'utf8'");

//	$sql = "DROP TABLE IF EXISTS productos; CREATE TABLE productos ('id' int(10) unsigned NOT NULL default '0', 'nombre' varchar(128) default NULL, 'precio' float(10,2) NOT NULL, PRIMARY KEY  (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
//	$sql = "CREATE TABLE productos (id int(10) unsigned NOT NULL default 0, nombre varchar(128) default NULL, precio float(10,2) NOT NULL, PRIMARY KEY  (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
//	if ( ! mysql_query( $sql))
//		echo mysql_error();
//	echo "alter('creada');";
//	die();
}

function registros(&$registros, $sql) {
    conectar();
    if ($result = mysql_query($sql)) {
        $registros = mysql_num_rows($result);
        $coma = '';
        $vector = '';
        while ($row = mysql_fetch_row($result)) {
            $vector .= $coma . "[";
            $coma_campos = '';
            for ($i = 0; $i < count($row); $i++) {
                $vector .= $coma_campos . "'" . registros_limpiar($row[$i]) . "'";
                $coma_campos = ',';
            }
            $vector .= "]";
            $coma = ',';
        }
    }
    return $vector;
}

function registros_limpiar($cadena) {
    $cadena = str_replace("'", "\\'", $cadena);
    $cadena = str_replace("\r\n", "\\n", $cadena);
    $cadena = str_replace("\n", "\\n", $cadena);
    return $cadena;
}

// parametros:
// vector de valores a reemplazar
// vector de valores de reemplazo
function armar_mail($v_valores, $v_reemplazo, $s_archivo) {

    $gestor = fopen($s_archivo, "r");
    $s_mensaje = fread($gestor, filesize($s_archivo));
    fclose($gestor);

    for ($i = 0; $i < count($v_valores); $i++) {
        $s_mensaje = str_replace($v_valores[$i], $v_reemplazo[$i], $s_mensaje);
    }

    return $s_mensaje;
}

function enviarMail($s_para, $s_asunto, $s_mensaje, $s_email_de, $s_email_nombre) {

    require "/home/verosell/class.phpmailer.php";
    $mail = new phpmailer();
    $mail->Mailer = "smtp";
    $mail->IsHTML(true);
    $mail->From = $s_email_de;
    $mail->FromName = $s_email_nombre;
    $mail->Timeout = 30;
    if (is_array($s_para)) {
        for ($i = 0; $i < count($s_para); $i++) {
            $mail->AddAddress($s_para[$i]);
        }
    } else {
        $mail->AddAddress($s_para);
    }
    $mail->Subject = $s_asunto;
    $mail->Body = $s_mensaje;
    $mail->AltBody = '';
    $exito = $mail->Send();
    if (!$exito) {
        return false;
    } else {
        return true;
    }
}

function clave($n_longitud) {

    $v_caracteres = array_merge(range('a', 'z'), range(0, 9));

    $clave = '';
    for ($i = 0; $i < $n_longitud; $i++) {
        $clave .= $v_caracteres[array_rand($v_caracteres)];
    }

    return $clave;
}

// para insertar los trozos de pagina
function incluir($_s_pagina, $_s_bloque) {
    if (strlen($_s_pagina) > 5) {
        $_v_string = explode('<!--' . $_s_bloque . '-->', file_get_contents($_s_pagina));
        echo $_v_string[1];
    } else {
        echo '';
    }
}

function getSelect($tbl, $id, $text) {
    conectar();
    $sql = "select * from {$tbl}";
    $result = mysql_query($sql);
    echo ' <select  id="' . $id . '" name="' . $id . '">';
    while ($arr = mysql_fetch_assoc($result)) {
        echo '<option value="'.$arr[$id].'">'.$arr[$text].'</option>';
    }
    echo '</select>';
}

if (isset($_GET['getSelect'])) {

    getSelect($_GET['getSelect'],$_GET['id'],$_GET['text']);
}

//Registros por p�gina
$n_registros = 10;
define("RUTA", '/home/amigosco/public_html/');
//$s_ruta = '/home/cardioin/public_html/'
?>
