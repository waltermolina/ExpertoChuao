<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/master.css" />
        <link rel="stylesheet" type="text/css" href="css/agregarImgs.css" />
        
        <script type="text/javascript" src="js/jquery.filedrop.js"></script>
        <? $urlCargarImagen = "uploadImgs.php?place=" . $_GET['place']; ?>
        <? //$urlCargarImagen = "uploadSaborImgs.php" ?>
        <script>var urlCI='<?= $urlCargarImagen; ?>';</script>
        <script type="text/javascript" src="js/uploadImgs.js"></script>

    </head>
    <body>
        <div id="dropbox">
            <div class="message">
                <h1>Arrastra las imagenes aquí</h1>
                <h2>O si prefieres</h2>
                <div class="clr"></div>
                <div id="file" class="m-btn blue"><i class="icon-plus"></i> Selecciona fotos de tu computadora</div>
                <div class="clr"></div>
                <div id="hiddenInput">
                    <input id="realInput" type="file" name="file" multiple />
                </div>
                <div class="clr"></div>
            </div>

            <script>
                var fileInput = $('#realInput');
                fileInput.change(function(){
                    //alert("Aca hay q llamar a la funcion q comienza la carga de archivos");
                })
                $('#file').click(function(){
                    fileInput.click(); //llama el click de real form...
                }).show();
            </script>

        </div>
        
    </body>
</html>
