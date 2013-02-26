<?
session_start();
$loggedin = false;
if(isset($_SESSION["uid"])){
    $username = $_SESSION["uid"];
    $loggedin = true;
}else{
    $loggedin = false;
}
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/master.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />

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

        <script src="js/datejs/date.js"></script>
        <!-- Set the CultureInfo to es-AR (Español/Argentina) -->
        <script type="text/javascript" src="js/datejs/date-es-AR.js"></script>

        <script>
            
            function doResize() {
                $("#grid").data("kendoGrid").refresh();
            };

            var resizeTimer;
            $(window).resize(function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(doResize, 1000);
            });
            
            
            $(document).ready(function() {
                
            }); //end document ready
        
        </script>

        <!-- 
        If posible, keep all the js files at the bottom of the page,
        just before </body> tag...
        -->

    </head>
    <body>
        <img id="background" src="img/background1280.jpg" alt="Chuao Background">
        <div id="main">
            <?
                if(!$loggedin){
                    echo '<script>
                        window.location= "restrictedArea.php";
                    </script>';
                }else{
            ?>
            <div id="left">
                <header>
                    <img src="img/logo200.png" />
                </header>
                <div id="clock">
                    <div id="dayName"></div>
                    <span id="hour"></span><span class="sep"></span><span id="min"></span>
                    <div id="fulldate"></div>
                </div>
            </div>
            <div id="right">
                <header>
                    <h1>Panel de Control</h1>
                    <div class="clr"></div>
                    <!--User Menu-->
                    <div class="m-btn-group" style="position: absolute; right: 10px; top: 10px;">
                        <a class="m-btn noMargin black dropdown-carettoggle" data-toggle="dropdown" href="#">
                            <i class="icon-cog icon-white"></i> <?=$username;?><span class="caret white"></span>
                        </a>
                        <ul class="m-dropdown-menu align-right">
                            <li><a href="usuarios.php"><i class="icon-edit"></i> Administrar Usuarios</a></li>
                            <li class="divider"></li>
                            <li><a href="login.php?logout=true"><i class="icon-off"></i> Salir</a></li>
                        </ul>
                    </div>
                </header>
                <ul id="tiles" class="tiles">
                    <a href="createTicket.php">
                        <li>
                            <div class="num">1</div>
                            <div class="content">
                                <h1>Crear Cupón</h1>
                                <p>Genere un cupón con los sabores que el cliente ha elegido.</p>
                            </div>

                        </li>
                    </a>
                    <a href="receiveTicket.php">
                    <li>
                        <div class="num">2</div>
                        <div class="content">
                            <h1>Canjear Cupón</h1>
                            <p>Valide un cupón de premios que le entrega un cliente.</p>
                        </div>
                    </li>
                    </a>
                    <div class="clr"></div>
                </ul>
                <ul id="tiles2" class="tiles">
                    
                    <a href="sabores.php">
                    <li>
                        <div class="num">3</div>
                        <div class="content">
                            <h1>Administrar Sabores</h1>
                            <p>Cree, edite o elimine los sabores participantes en la promoción.</p>
                        </div>
                    </li>
                    </a>
                    <a href="premios.php">
                    <li>
                        <div class="num">4</div>
                        <div class="content">
                            <h1>Administrar Premios</h1>
                            <p>Cree, edite o elimine los premios que obtendrán los ganadores.</p>
                        </div>
                    </li>
                    </a>
                    <a href="titulos.php">
                    <li>
                        <div class="num">5</div>
                        <div class="content">
                            <h1>Administrar Títulos</h1>
                            <p>Cree, edite o elimine los títulos que obtendrán los ganadores.</p>
                        </div>
                    </li>
                    </a>
                    <a href="cupones.php">
                    <li>
                        <div class="num">6</div>
                        <div class="content">
                            <h1>Ver Cupones</h1>
                            <p>Visualice los cupones generados.</p>
                        </div>
                    </li>
                    </a>
                    <div class="clr"></div>
                </ul>
            </div>
            <? } ?>
        </div>
        



        <!------------------- Hey, here are the js files... ------------------->

        <!--MS Modern Buttons-->
        <script type="text/javascript" src="modernButtons/js/m-dropdown.min.js"></script>
        <script type="text/javascript" src="modernButtons/js/m-radio.min.js"></script>

        <script>
            String.prototype.capitalize = function() {
                return this.charAt(0).toUpperCase() + this.slice(1);
            }
            setInterval(function(){
                hoy= new Date();
                dayName= hoy.getDayName();
                fulldate = hoy.getDate() + " de " + (hoy.getMonthName().capitalize()) + " de " + hoy.getFullYear();
                //                switch (hoy.getDay()){
                //                    case 0: dayName="Domingo"; break;
                //                    case 1: dayName="Lunes"; break;
                //                    case 2: dayName="Martes"; break;
                //                    case 3: dayName="Miércoles"; break;
                //                    case 4: dayName="Jueves"; break;
                //                    case 5: dayName="Viernes"; break;
                //                    case 6: dayName="Sábado"; break;
                //                }
                hour = (hoy.getHours()<10) ? "0"+hoy.getHours() : hoy.getHours();
                min = (hoy.getMinutes()<10) ? "0"+hoy.getMinutes() : hoy.getMinutes();
                $("#dayName").text(dayName);
                $("#hour").text(hour);
                $("#min").text(min);
                $(".sep").text(":")
                $("#fulldate").text(fulldate);
            }, 1000);
        </script>

    </body>
</html>
