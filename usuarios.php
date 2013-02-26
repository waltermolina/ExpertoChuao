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
        <!--JS COLOR-->
        <script src="js/jscolor/jscolor.js"></script>
        
        <script>
            
            function doResize() {
                $("#grid").data("kendoGrid").refresh();
            };

            var resizeTimer;
            $(window).resize(function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(doResize, 1000);
            });
            
      var imagesDS;
            var imageDropDownList
            var baseURL = window.location.protocol + "//" + window.location.host + "/Apps/Chuao";
            $(document).ready(function() {
                $("#grid").kendoGrid({
                    dataSource: {                        
                        transport: {
                            read: {
                                type: "GET",
                                dataType: "json",
                                url: baseURL + "/jsonTables.php?table=Usuario"
                            },
                            create: {
                                type: "GET",
                                url: baseURL + "/jsonSave.php?table=Usuario",
                                data: {},
                                complete: function(jqXHR, textStatus) {
                                    if (textStatus == 'success') {
                                        $("#grid").data("kendoGrid").dataSource.read();
                                    }
                                }
                            },
                            update: {
                                type: "GET",
                                url: baseURL + "/jsonUpdate.php?table=Usuario",
                                data: {},
                                complete: function(jqXHR, textStatus) {
                                    if (textStatus == 'success') {
                                        $("#grid").data("kendoGrid").dataSource.read();
                                     
                                    }
                                }
                            },
                            destroy: {
                                type: "GET",
                                url: baseURL + "/jsonDelete.php?table=Usuario",
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
                                id:"idSabores",
                                fields: {
                                    idUsuario: { type: "number", editable: false },
                                    uid: { type: "string" },
                                    username: { type: "string" },
                                    type: { type: "string" },
                                    pass: { type: "string" },
                                    nombre: { type: "string" },
                                    apellido: { type: "string" },
                                    email: { type: "string" },
                                    fechaNac: { type: "string" },
                                    telefono: { type: "string" },
                                    celular: { type: "string" }
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
                    toolbar: [
                        { name: "create", text: "Agregar Usuario" }
                    ],
                    dataBound:function(){$(".k-grid-edit").click(function(){ 
                            setInterval(function(){jscolor.bind();},1500);
                        });
                    },
                    columns: [
                        { field: "uid", title: "UID" },
                        { field: "username", title: "Nombre de Usuario"},
                        { field: "pass", title: "Contraseña", 
                            template: '********', //reemplaza el valor de password por un string vacio
                            editor: function(container, options) {
                                $(container).html('<input type="password" class="k-input k-textbox" name="password" required="required" data-bind="value:password">'); 
                            }
                        },
                        { field: "nombre", title: "Nombre" },
                        { field: "apellido", title: "Apellido" },
                        { field: "type", title: "Tipo de Usuario" },
                        { field: "email", title: "Email" },
                        { command: ["edit","destroy"], title: "", width: "170px" }
                    ]
                });
                $(".k-toolbar.k-grid-toolbar").append('<div id="buttonAddImgs" class="k-button k-button-icontext"><span class="k-icon k-add"></span>Agregar Imágenes</div>');
                
                $("#buttonAddImgs").click(function() {
                    var url = "agregarImgs.php?place=sabores";

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
                
              
                
              
                
                
            }); //end document ready
            
              var imagesDS = new kendo.data.DataSource({
                    transport: {
                        read: {
                            type: "GET",
                            dataType: "json",
                            url: baseURL + "/jsonImages.php?place=sabores"
                        }
                    },
                    schema: {
                        type: "json",
                        model: {
                            id: "id",
                            fields: {
                              
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
                    <h1>Administrar Usuarios</h1>
                    <div class="clr"></div>
                    <p>En esta sección puede obtener un listado detallado de todos los usuarios del sistema. Puede crear usuarios, editarlos o eliminarlos.</p>
                    <p>Los usuarios del sistema pueden ser Administradores o Básicos. Un Usuario Básico es una persona que ha utilizado la aplicación de facebook para participar.
                        Un Usuario Administrador es una persona que tiene acceso al Panel de Control del Sistema.</p>
                    <p><span  class="bold">Atención.</span> Debe tener especial cuidado al manipular Usuarios Básicos, debido a que puede ocasionar pérdida de datos sensibles.</p>
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
