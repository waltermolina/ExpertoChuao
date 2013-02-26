<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css" />
        <link rel="stylesheet" type="text/css" href="appFacebook.css" />
        <link rel="stylesheet" type="text/css" href="signup.css" />
        <!--MS Modern Buttons-->
        <link rel="stylesheet" type="text/css" href="../modernButtons/css/m-styles.min.css" >
        <link rel="stylesheet" type="text/css" href="../modernButtons/css/m-custom.css" >

        <!--KENDO-->
        <script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
        <script src="../kendo/js/kendo.all.min.js"></script>
        <script src="../kendo/js/cultures/kendo.culture.es-AR.min.js"></script>

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
            <div id="back"><span>h</span> Volver</div>
            <section id="content">
                <div id="login" class="page">
                    <header class="page squared">Registro de nuevo Usuario</header>
                    <!--LOGIN FORM-->
                    <form id="loginBox" name="loginBox" action="validateUser.php" method="post">

                        <label>Usuario</label><input class="k-input k-textbox" id="username" type="text" placeholder="Nombre de usuario...">
                        <div class="clr"></div>
                        <label>Contraseña</label><input class="k-input k-textbox" id="password" type="password" placeholder="Contraseña...">
                        <div class="clr"></div>
                        <label>Nombre</label><input class="k-input k-textbox" id="firstName" type="text" placeholder="Nombre...">
                        <div class="clr"></div>
                        <label>Apellido</label><input class="k-input k-textbox" id="lastName" type="text" placeholder="Apellido...">
                        <div class="clr"></div>
                        <label>Fecha Nacimiento</label><input class="k-input k-textbox" id="birthDate" type="date" placeholder="dd/mm/aaaa">
                        <div class="clr"></div>
                        <label>Teléfono</label><input class="k-input k-textbox" id="phone" type="tel" placeholder="número de teléfono">
                        <div class="clr"></div>
                        <label>Celular</label><input class="k-input k-textbox" id="cellphone" type="tel" placeholder="número de celular">
                        <div class="clr"></div>

                        <a id="sendData" href="javascript:void(0)" class="m-btn black right">Registrarme</a>

                        <div class="clr"></div>
                        <div id="loginMessage"></div>
                    </form>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </section>
        </div>
        <!--MS Modern Buttons-->
        <script type="text/javascript" src="../modernButtons/js/m-dropdown.min.js"></script>
        <script type="text/javascript" src="../modernButtons/js/m-radio.min.js"></script>
        <script>
            $(document).ready(function(){
                kendo.culture("es-AR");
                $("#birthDate").kendoDatePicker();
                $("#sendData").click(function(){
                    
                });
            });
            
        </script>

    </body>
</html>



