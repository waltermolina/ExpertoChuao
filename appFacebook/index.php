<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css" />
        <link rel="stylesheet" type="text/css" href="appFacebook.css" />
        <link rel="stylesheet" type="text/css" href="main.css" />
        <link rel="stylesheet" type="text/css" href="cargar.css" />
        <link rel="stylesheet" type="text/css" href="logros.css" />
        <link rel="stylesheet" type="text/css" href="premios.css" />

        <link rel="stylesheet" type="text/css" href="../fonts/fontAwesome/font-awesome.css" />
        <!--MS Modern Buttons-->
        <link rel="stylesheet" type="text/css" href="../modernButtons/css/m-styles.min.css" >
        <link rel="stylesheet" type="text/css" href="../modernButtons/css/m-custom.css" >

        <!--KENDO-->
        <script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
        <script src="../kendo/js/kendo.all.min.js"></script>
        <link href="../kendo/styles/kendo.common.min.css" rel="stylesheet" />
        <link href="../kendo/styles/kendo.metro.min.css" rel="stylesheet" />

    </head>

    <body>
        <div id="container">
            <header>
                <img id="mainHeader" src="../img/appUI/facebookHeader.jpg" />
                <img id="logo" src="../img/logo200.png" />
                <div class="sombraLogo"></div>
                <h1>Probá los 
                    <span class="bold">50 sabores artesanales Chuao</span> 
                    de esta promo y diplomate como: 
                    <span class="bold">"Experto en Degustación de Helados Chuao"</span>
                </h1>
            </header>
            <nav id="topMenu">
                <ul>
                    <li id="topOp1" class="option orange">Sabores y Logros</li>
                    <li id="topOp2" class="option orange">Premios</li>
                    <li id="topOp3" class="option orange">Cargar Cupón</li>
                    <li id="back"><span>h</span> Volver</li>
                </ul>
            </nav>
            <section id="content">

            </section>
        </div>
        <div id="loading"><div class="cargando"><i class="icon-refresh icon-spin"></i> Cargando...</div></div>
        <!--MS Modern Buttons-->
        <script type="text/javascript" src="../modernButtons/js/m-dropdown.min.js"></script>
        <script type="text/javascript" src="../modernButtons/js/m-radio.min.js"></script>
        <script>
            $(document).ready(function(){
                
                baseURL = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port;
                appURL = "/Apps/Chuao"
                $("#content").load(baseURL + appURL + "/appFacebook"+ "/main.php");
                
                
                $("#topOp1").click(function(){
                    $("#content").load(baseURL + appURL + "/appFacebook"+ "/logros.php");
                    $("#loading").show();
                })
                $("#topOp2").click(function(){
                    $("#content").load(baseURL + appURL + "/appFacebook"+ "/premios.php");
                    $("#loading").show();
                })
                $("#topOp3").click(function(){
                    $("#content").load(baseURL + appURL + "/appFacebook"+ "/cargar.php");
                    $("#loading").show();
                })
                
                $("#back").click(function(){
                    $("#content").load(baseURL + appURL + "/appFacebook"+ "/main.php");
                    $("#loading").show();
                })
            });
            
        </script>

    </body>
</html>
