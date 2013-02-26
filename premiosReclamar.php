<?
session_start();
$loggedin = false;
if(isset($_SESSION["uid"])){
    $username = $_SESSION["uid"];
    $loggedin = true;
}else{
    $loggedin = false;
}
    
if(!$loggedin){
    echo
    '<script>
        window.location= "restrictedArea.php";
    </script>';
}else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/master.css" />

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
            var baseURL = window.location.protocol + "//" + window.location.host + "/Apps/Chuao";
            function doResize() {
                $("#grid").data("kendoGrid").refresh();
            };

            var resizeTimer;
            $(window).resize(function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(doResize, 1000);
            });
             
            $(document).ready(function() {
                $("#grid").kendoGrid({
                    dataSource: {                        
                        transport: {
                            read: {
                                type: "GET",
                                dataType: "json",
                                url: baseURL + "/jsonTables.php?table=Cupon"                           
                            }
                        },
                        schema: {
                            model: {
                                id:"idCupon",
                                fields: {
                                    idCupon: { type: "number" },
                                    fecha: { type: "string" },
                                    codigoCupon: { type: "string" }
                                }
                            }
                        },
                        pageSize: 25,
                        serverPaging: false,
                        serverFiltering: false,
                        serverSorting: false
                    },
                    editable: "inline",
                    height:"100%",
                    filterable: true,
                    sortable: true,
                    pageable: true,
                    editable: "inline",
                    detailInit: detailInit,
                    columns: [
                        {
                            field: "codigoCupon",
                            title: "Código de Cupón"
                        },
                        {
                            field: "fecha",
                            title: "Fecha de Creación"
                        }
                    ]
                });
                
            }); //end document ready
            
            function detailInit(e) {
                $("<div/>").appendTo(e.detailCell).kendoGrid({
                    dataSource: {                        
                        transport: {
                            read: {
                                type: "GET",
                                dataType: "json",
                                url: baseURL + "/jsonTables.php?table=DetalleCupon&idC="+e.data.idCupon                           
                            }
                        },
                        schema: {
                            model: {
                                id:"idCupon",
                                fields: {
                                    codigoUnico: { type: "number" },
                                    idSabores: { type: "string" },
                                    nombre: { type: "string" },
                                    flag: { type: "number" }
                                }
                            }
                        },
                        pageSize: 25,
                        serverPaging: false,
                        serverFiltering: false,
                        serverSorting: false
                    },
                    scrollable: false,
                    sortable: true,
                    //pageable: true,
                    columns: [
                        { field: "codigoUnico", title:"Codigo"},
                        { field: "idSabores", title:"ID Sabor", width: 100 },
                        { field: "nombre", title:"Nombre Sabor"},
                        { field: "flag", title:"¿Utilizado?", template: function(){
                                if (this.flag == null){ return "No"}else{return "Si"}
                            }
                        }
                    ]
                });
            }
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
                    <h1>Cupones Emitidos</h1>
                    <div class="clr"></div>
                    <p>En esta vista puede obtener detalles de los cupones emitidos hasta el momento. 
                        Cada cupón de la lista puede ser desplegado para obtener detalles de su contenido. 
                        En los detalles del cupón podrá saber qué sabores fueron los que se vendieron y si el cupón ha sido utilizado.
                    </p>
                </header>
            </section>
            <section id="right">
                <div id="grid" style=""></div>
            </section>
        </div>

        <!------------------- Hey, here are the js files... ------------------->

        <!--MS Modern Buttons-->
        <script type="text/javascript" src="modernButtons/js/m-dropdown.min.js"></script>
        <script type="text/javascript" src="modernButtons/js/m-radio.min.js"></script>
        
        
        
    </body>
<? } ?>
</html>
