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
            <link rel="stylesheet" type="text/css" href="css/createTicket.css" />
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
            <!--jQuery Print-->
            <script src="js/jQuery.print.js"></script>

            <script type="text/x-kendo-tmpl" id="saboresTemplate">
            <a href="javascript:void(0)" 
               onClick="addToTicket(this)" 
               class="m-btn alternative-separator flavour-border" 
               data-flavour-id="${idSabores}" 
               data-colour="\#${color}" 
               style="border-left-color: \#${color};">${nombre}</a>
        </script>


        <script>
            var baseURL = window.location.protocol + "//" + window.location.host + "/Apps/Chuao";
            
            var ahora = new Date();
            var idCupon = ahora.getTime();
            var saboresCupon; //this is the array that contains all flavours of the ticket...
            var saboresCuponPrint; //this is the array that contains all flavours of the ticket...
                
            function doResize() {
                $("#grid").data("kendoGrid").refresh();
            };

            var resizeTimer;
            $(window).resize(function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(doResize, 1000);
            });
                
            function addToTicket(e){
                idSabor = $(e).attr("data-flavour-id");
                colorSabor = $(e).attr("data-colour");
                nombreSabor = $(e).html();
                    
                newSabor = '<a href="javascript:void(0)"'+
                    'onClick="removeFromTicket(this)"'+
                    'class="m-btn alternative-separator flavour-border"'+
                    'data-flavour-id="'+idSabor+'"'+
                    'style="border-left-color: '+colorSabor+'">'+nombreSabor+' <i class="icon-remove"></i></a>';
                       
                $("#saboresCupon").append(newSabor);
                    
            }
                
            function removeFromTicket(e){
                $(e).remove();
            }
                
            function getSaboresTicket(){
                lista = $("#saboresCupon a");
                saboresCupon = new Array();
                saboresCuponPrint = new Array();
                $(lista).each(function(index){
                    saboresCupon.push($(this).attr("data-flavour-id"));
                    saboresCuponPrint.push("<p>"+$(this).attr("data-flavour-id")+" "+$(this).text()+"</p>");
                })
                $("#cuponPrint > .saboresCupon").html(saboresCuponPrint);
                    
                //falta enviar los datos del cupon para guardar!!!!!
            }
                
                
            $(document).ready(function() {
                    
                $("#cupon > header > h3 > span").text(idCupon);
                $("#cupon > header > p.fechaCupon").text(ahora);
                $("#cuponPrint > header > h3 > span").text(idCupon);
                $("#cuponPrint > header > p.fechaCupon").text(ahora);
                    
                $("#listaSabores").kendoListView({
                    dataSource: {                        
                        transport: {
                            read: {
                                type: "GET",
                                dataType: "json",
                                url: baseURL + "/jsonTables.php?table=Sabores"                           
                            }
                        },
                        schema: {
                            model: {
                                id:"idSabores",
                                fields: {
                                    idSabores: { type: "number" },
                                    nombre: { type: "string" },
                                    descripcion: { type: "string" },
                                    imagen: { type: "string" },
                                    color: { type: "string" }
                                }
                            }
                        },
                        pageSize: 25,
                        serverPaging: false,
                        serverFiltering: false,
                        serverSorting: false
                    },
                    template: kendo.template($("#saboresTemplate").html())
                });
                    
                $("#printTicket").bind("click", function(){
                    //Get sabores to save the ticket... if everything is ok then print ticket...
                    getSaboresTicket();
                    $.ajax({
                        type:'POST',
                        error:function(){/*alert();*/},
                        url:'createTicAjax.php',
                        data:{sabores:saboresCupon.join(','),codigoCupon:idCupon, fecha:ahora.getFullYear() +'-'+ahora.getMonth()+'-'+ahora.getDay()+' '+ahora.getHours()+':'+ahora.getMinutes()}
                           
                    });
                        
                    $("#cuponPrint").print({
                        addGlobalStyles: true,
                        mediaPrint: true,
                        //noPrintSelector: ".k-button",
                        rejectWindow: true,
                        iframe: true,
                        append: null,
                        prepend: null
                    });
                        
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
                    <h1>Crear Cupón</h1>
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
                            <h1><span class="bold">Paso 1.</span> Seleccione los sabores</h1>
                            <p>Los sabores se agregan en la lista de la derecha. Puede eliminarlos haciendo click en la cruz.</p>
                        </header>

                        <!--This is a kendo list with a tempate-->
                        <div id="listaSabores"></div>
                    </article>

                    <article id="step2">
                        <header>
                            <h1><span class="bold">Paso 2.</span> Controle el cupón</h1>
                        </header>
                        <p>Verifique que los sabores ingresados en el cupón de la derecha se corresponden con los solicitados por el cliente.
                            En caso de errores puede eliminar o agregar sabores volviendo al <span class="bold">Paso 1</span>.
                        </p>
                    </article>

                    <article id="step3">
                        <header>
                            <h1><span class="bold">Paso 3.</span> Imprima el cupón</h1>
                        </header>
                        <p>Si ha terminado debe imprimir el cupón para entregarlo al cliente.</p>
                        <p>Al presionar el boton se almacenará el cupón y se enviará una copia a la impresora.</p>
                        <div class="btprint-container">
                            <a href="javascript:void(0)" id="printTicket" class="m-btn blue"><i class="icon-plus"></i> Imprimir Cupon</a>
                        </div>
                        <div class="clr"></div>
                    </article>

                </div>
                <div id="cupon">                    
                    <header>
                        <h1>CHUAO</h1>
                        <h2>Experto en Degustación de Helados</h2>
                        <h3>ID: <span>NUMERODECUPONUNICO</span></h3>
                        <p class="fechaCupon">00/00/0000 00:00:00</p>
                    </header>
                    <div id="saboresCupon"></div>
                </div>

                <div id="cuponPrint">                    
                    <header>
                        <h1>CHUAO</h1>
                        <h2>Experto en Degustación de Helados</h2>
                        <h3>ID: <span>NUMERODECUPONUNICO</span></h3>
                        <p class="fechaCupon">00/00/0000 00:00:00</p>
                    </header>
                    <div class="saboresCupon"></div>
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
