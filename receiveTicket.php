<?
session_start();
$loggedin = false;
if (isset($_SESSION["uid"])) {
    $username = $_SESSION["uid"];
    $loggedin = true;
} else {
    $loggedin = false;
}

if (!$loggedin) {
    echo
    '<script>
        window.location= "restrictedArea.php";
    </script>';
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title></title>

            <link rel="stylesheet" type="text/css" href="css/reset.css" />
            <link rel="stylesheet" type="text/css" href="css/master.css" />
            <link rel="stylesheet" type="text/css" href="css/receiveTicket.css" />
            <!--<link rel="stylesheet" type="text/css" media="print" href="css/printableTicket.css" />-->

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

            <script>
                var cuponId = "";
                                                    
                function doResize() {
                    $("#grid").data("kendoGrid").refresh();
                };

                var resizeTimer;
                $(window).resize(function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(doResize, 1000);
                });
                
                $(document).ready(function() {
                    
                    $(document).keypress(function(e) {
                        if(e.keyCode === 13) {
                            $("#getCuponId").trigger("click");
                        }
                    });
                    
                    $("#getCuponId").click(function(){
                        cuponId = $("#cuponId").val();
                        if(cuponId != ""){
                            //Reset input
                            $("#cuponId").val("")
                            
                            //VALIDAR
                            var data = Array();
                            $.ajax({
                                type: "GET",
                                url: 'validarCupon.php?cupon='+cuponId,
                                success: function(response){
                                    data = JSON.parse(response);
                                    if(data.length>0){
                                        var html="";
                                        var count=0;
                                        if (data[0].Premio!="" && data[0].Premio != null){
                                            html = '<div class="premio">'+data[0].Premio+'</div>'; 
                                            count++;
                                        }                                                                             
                                                                
                                        if (data[0].Titulo!="" && data[0].Titulo!=null){
                                            html=html+'<div class="premio">'+data[0].Titulo+'</div>';
                                            count++;    
                                        }                                                    
                                        $("#listaPremios").html(html + ' <div class="clr"></div>');
                                        $("#result").text("tiene "+count+" premios: ");
                                        
                                        $("#step3").show();
                                        
                                    }else {                                                    
                                        $("#listaPremios").html('<div class="invalidTicket">EL CUPON NO EXISTE O NO CONTIENE PREMIOS</div><div class="clr"></div>');  
                                        $("#result").text("");
                                        $("#step3").hide();
                                    }                                    
                                }
                            });
                                                               
                              
                            $("#step2").show();
                            $("#showCuponId").text(cuponId);
                                    
                            //si la validación da ok tiene q:
                            //   mostrarse #step2 tiene q mostrar los premios q corresponden segun el cupon...
                            //   mostrarse #step3
                            //                          
                            //si la validación da "todo mal" tiene q mostrarse solo #step 2 con un mensaje que avise q
                            //al chabon que no hay premio...
                                                               
                        }
                    });
                    
                    
                    $("#canjearTicket").click(function(){
                        $.ajax({
                            type: "GET",
                            url: 'marcarCupon.php?cupon='+cuponId,
                            success: function(response){
                                $("#step2").hide();
                                $("#step3").hide();
                                //Reset input
                                $("#cuponId").val("")
                            }                                    
                        });
                    });
                    
                    $("#cancelar").click(function(){
                        //Ocultar pasos
                        $("#step2").hide();
                        $("#step3").hide();
                        //Reset input
                        $("#cuponId").val("")
                    });
                    
                }); //end document ready
                                                
            </script>

            <!-- 
            If posible, keep all the js files at the bottom of the page,
            just before </body> tag...
            -->

        </head>
        <body>
            <? include 'topBar.php' ?>
            <img id="background" src="img/background1280.jpg" alt="Chuao Background">
            <div id="main">

                <section id="left">
                    <header>
                        <!--<a href="javascript:void(0)" class="m-icon-big-swapleft m-icon-white backButton"></a>-->
                        <h1>Canjear Cupón</h1>
                        <div class="clr"></div>
                        <p>Description about section. Lorem ipsum dolor sit amet, 
                            consectetur adipiscing elit. Aenean vitae nisl id mi 
                            facilisis pharetra et eget massa. Suspendisse potenti. 
                            Praesent nunc sapien, vulputate sit amet accumsan in, 
                            consectetur et tortor. Nunc varius sem et metus 
                            pellentesque sed posuere eros interdum.
                        </p>
                    </header>
                </section>
                <section id="right">
                    <div class="instrucciones">
                        <article id="step1">
                            <header>
                                <h1><span class="bold"></span>Ingrese el código identificador del cupón</h1>
                                <p>El cliente le presenta un cupón para reclamar uno o más premios. 
                                    Antes de otorgar los beneficios es necesario validar el cupón para evitar falsificaciones.</p>
                            </header>
                            <div class="inputCuponContainer">
                                <input id="cuponId" type="text" placeholder="id de cupón..." autofocus="autofocus" style="margin: 0; float: left;" />
                                <a href="javascript:void(0)" id="getCuponId" class="m-btn black" style="margin: 0; float: right;">Validar</a>
                            </div>
                            <div class="clr"></div>

                            <!--This is a kendo list with a tempate-->
                            <div id="listaSabores"></div>
                        </article>

                        <article id="step2">
                            <header>
                                <h1><span class="bold"></span>Resultado de la Validación</h1>
                                <p>El cupón identificado con el código <span id="showCuponId" class="bold"></span>
                                    <span id="result"></span>
                                </p>
                                <div id="listaPremios">
                                    <div class="clr"></div>
                                </div>
                            </header>

                        </article>

                        <article id="step3">
                            <header>
                                <h1><span class="bold"></span>Canjear Cupón</h1>
                            </header>
                            <p>Si desea entregar los premios debe marcar el cupón, presione <span class="bold">Canjear Cupón</span>. Si por el momento no entregará los premios, seleccione <span class="bold">Cancelar</span>.</p>
                            <p>Nota: recuerde que un cupón de premios que ha sido marcado como <span class="bold">entregado</span> no aparecerá en futuras consultas</p>
                            <div class="btns-container">
                                <a href="javascript:void(0)" id="canjearTicket" class="m-btn green"><i class="icon-ok icon-white"></i> Canjear Cupón</a>
                                <a href="javascript:void(0)" id="cancelar" class="m-btn red"><i class="icon-remove icon-white"></i> Cancelar</a>
                            </div>
                            <div class="clr"></div>
                        </article>

                    </div>

                </section>
            </div>

            <!------------------- Hey, here are the js files... ------------------->

            <!--MS Modern Buttons-->
            <script type="text/javascript" src="modernButtons/js/m-dropdown.min.js"></script>
            <script type="text/javascript" src="modernButtons/js/m-radio.min.js"></script>
        </body>
    <? } ?>
</html>
