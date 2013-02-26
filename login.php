<?
session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/master.css" />
        <link rel="stylesheet" type="text/css" href="css/login.css" />

        <!--MS Modern Buttons-->
        <link rel="stylesheet" type="text/css" href="modernButtons/css/m-styles.min.css" >
        <!--<link rel="stylesheet" type="text/css" href="modernButtons/css/m-buttons.css" >
        <link rel="stylesheet" type="text/css" href="modernButtons/css/m-forms.css" >
        <link rel="stylesheet" type="text/css" href="modernButtons/css/m-icons.css" >
        -->

        <!--KENDO-->
        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <script src="kendo/js/kendo.all.min.js"></script>
        <link href="kendo/styles/kendo.common.min.css" rel="stylesheet" />
        <link href="kendo/styles/kendo.metro.min.css" rel="stylesheet" />

        <!-- 
        If posible, keep all the js files at the bottom of the page,
        just before </body> tag...
        -->

    </head>
    <body>
        <img id="background" src="img/background1280.jpg" alt="Chuao Background" />
        <div id="sombra"></div>
        <div id="frontGroup">

            <div id="welcome">
                <div class="l1">Panel de Control</div>
                <div class="clr"></div>
                <div class="l2">Experto en Degustación de Helado</div>
                <div class="clr"></div>
            </div>

            <div id="login">
                <!--LOGIN FORM-->
                <form id="loginBox" name="loginBox" action="validateUser.php" method="post">
                    <input id="username" class="username" name="username" type="text" title="Username" size="30" maxlength="2048" placeholder="Username" required validationMessage="Please enter an username" />
                    <div class="clr"></div>

                    <input id="password" name="password" type="password" title="Password" size="30" maxlength="2048" placeholder="Password" required validationMessage="Please enter a password" />
                    <div class="clr"></div>

                    <a id="loginButton" href="javascript:void(0)" class="m-btn blue" style="float: right;">Iniciar Sesión</a>

                    <div class="clr"></div>
                    <div id="loginMessage"></div>
                </form>
                <div class="clr"></div>
            </div>
        </div>

        <div id="bottomBar">
            <div class="cont">
                <div id="links">
                    <a href="javascript:void(0)">About</a>
                    <a href="javascript:void(0)">Help</a>
                    <a href="javascript:void(0)">Terms</a>
                    <a href="javascript:void(0)">Privacy</a>
                    <div class="clr"></div>
                </div>
                <div id="copyright">&copy; 2013 AaBbCcDd WwXxYzZz</div>
                <div class="clr"></div>
            </div>
        </div>



        <div class="k-loading-mask" style="position: absolute;width: 100%; height: 100%; top: 0px; left: 0px; display: none; z-index: 9999;">
            <span class="k-loading-text">Loading...</span>
            <div class="k-loading-image"></div>
            <div class="loading-color"></div>
        </div>

        <!------------------- Hey, here are the js files... ------------------->

        <!--MS Modern Buttons-->
        <script type="text/javascript" src="modernButtons/js/m-dropdown.min.js"></script>
        <script type="text/javascript" src="modernButtons/js/m-radio.min.js"></script>

        <script type="text/javascript">
            document.onkeypress = function(e) {
                var esIE = (document.all);
                tecla = (esIE) ? event.keyCode : e.which;
                
                if (tecla == 13) {
                    $("#loginButton").click();
                };
            };
            
            $(document).ready(function() {
	
                $("#loginButton").click(function() {
                    console.log("ssssss");
                    var action = $("#loginBox").attr('action');
                    var formData = {
                        username: $("#username").val(),
                        password: $("#password").val(),
                        isAjax: 1
                    };
                    console.log("aaaaaaa");
                    $.ajax({
                        type: "POST",
                        url: action,
                        data: formData,
                        success: function(response){
                            if(response == 'success'){
                                baseURL = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port + "/Apps/Chuao";
                                window.location = baseURL + "/index.php";
                            }else{
                                $("#loginMessage").html("<p class='error'>Invalid username and/or password.</p>");
                            }
                        }
                    });
                    console.log("bbbbbbbb");
                    return false;
                });
	
            });
        </script>


    </body>
</html>
