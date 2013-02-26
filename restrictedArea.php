<?session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Área Restringida</title>
        
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/master.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <!--jQuery-->
        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        
    </head>
    <body>
        <img id="background" src="img/background1280.jpg" alt="Chuao Background">
        <div id="main">
            <div id="fullScreenAlert">
                <div class="cont">
                    <div class="icon">W</div>
                    <div class="txt">
                        <h1>Área Restringida</h1>
                        <p>Ups! No te has identificado. Debes <a href="login.php">iniciar sesión</a> con tu cuenta de usuario para acceder a esta sección.</p>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
        
        <script>
            $("document").ready(function(){
                fscHeight = $("#fullScreenAlert").height();
                $("#fullScreenAlert").css("margin-top", -(fscHeight/2));
            });
        </script>
    </body>
</html>
