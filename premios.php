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
        <title>Administrar Sabores</title>

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
                                url: baseURL + "/jsonTables.php?table=Premios"                           
                            },
                            create: {
                                type: "GET",
                                url: baseURL + "/jsonSave.php?table=Premios",
                                data: {},
                                complete: function(jqXHR, textStatus) {
                                    if (textStatus == 'success') {
                                        $("#grid").data("kendoGrid").dataSource.read();
                                    }
                                }
                            },
                            update: {
                                type: "GET",
                                url: baseURL + "/jsonUpdate.php?table=Premios",
                                data: {},
                                complete: function(jqXHR, textStatus) {
                                    if (textStatus == 'success') {
                                        $("#grid").data("kendoGrid").dataSource.read();
                                     
                                    }
                                }
                            },
                            destroy: {
                                type: "GET",
                                url: baseURL + "/jsonDelete.php?table=Premios",
                                data: {},
                                complete: function(jqXHR, textStatus) {
                                    if (textStatus == 'success') {
                                        $("#grid").data("kendoGrid").dataSource.read();
                                     
                                    }
                                }
                            }
                        },
                        schema: {
                            model: {
                                id:"idPremios",
                                fields: {
                                    idPremios: { type: "number", editable: false },
                                    nombre: { type: "string" },
                                    descripcion: { type: "string" },
                                    imagen: { type: "string" }
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
                    toolbar: [
                        { name: "create", text: "Agregar premio" }
                    ],
                    columns: [{
                            field:"idPremios",
                            title: "ID"
                        },
                        {
                            field: "nombre",
                            title: "Nombre"
                           
                        }, {
                            field: "descripcion",
                            title: "Descripción"
                        }, {
                            field: "imagen",
                            title: "Imagen",
                            editor: imageDropDownEditor
                        },
                        { 
                            command: ["edit","destroy"],
                            title: "", 
                            width: "170px"
                        }
                    ]
                });
                
                
                $(".k-toolbar.k-grid-toolbar").append('<div id="buttonAddImgs" class="k-button k-button-icontext"><span class="k-icon k-add"></span>Agregar Imágenes</div>');
                
                $("#buttonAddImgs").click(function() {
                    var url = "agregarImgs.php?place=premios";

                    $("#ContentW").html('<div id="windowAddImgs">');

                    var windowAddImgs = $("#windowAddImgs").kendoWindow({
                        visible: false,
                        iframe: false,
                        resizable: true,
                        modal: true,
                        maxWidth: "1024px",
                        actions: ["close"],
                        close: function() { $("#windowAddImgs").html(" "); },
                        refresh: function() { this.center(); }
                    }).data("kendoWindow");

                    windowAddImgs.refresh({ url: url });
                    windowAddImgs.open();
                    windowAddImgs.center();
                });
                
                var imagesDS = new kendo.data.DataSource({
                    transport: {
                        read: {
                            type: "POST",
                            dataType: "json",
                            url: baseURL + "/jsonImages.php?place=premios",
                            data: {}
                        }
                    },
                    schema: {
                        type: "json",
                        model: {
                            id: "securityGroupId",
                            fields: {
                                securityGroupDesc: { validation: { required: true} }
                            }
                        }
                    }
                });
                
                
                function imageDropDownEditor(container, options) {
                    //console.log(options);
                    $('<input required="required" name="'+options.field+'" data-text-field="name" data-value-field="name" data-bind="value:'+options.field+'"/>')
                    .appendTo(container).kendoDropDownList({
                        dataTextField: "name",
                        dataValueField: "name",
                        autoBind: false,
                        dataSource: imagesDS,
                        template:   '<div class="iddl">'+
                                        '<img src="img/${data.type}/${data.name}" alt="${data.name}" />' +
                                        '<div class="name">' +
                                            '${data.name}' +
                                        '</div>' +
                                    '</div>'
                    });
                    //imageDropDownList.data("kendoDropDownList").list.width(360);
                }
                
                
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
                    <h1>Administrar Premios</h1>
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
                <div id="grid" style=""></div>
            </section>
            <div id="ContentW"></div>
        </div>

        <!------------------- Hey, here are the js files... ------------------->

        <!--MS Modern Buttons-->
        <script type="text/javascript" src="modernButtons/js/m-dropdown.min.js"></script>
        <script type="text/javascript" src="modernButtons/js/m-radio.min.js"></script>
    </body>
<? } ?>
</html>
