<div id="logros" class="page">
    <header>
        <h1>Tus logros</h1>
        <p>Los sabores que tienen la tilde son los que has probado. Puedes hacer click en cualquier sabor para obtener detalles.</p>
    </header>
    <div class="clr"></div>
    <ul class="ch-grid" id="saboresList">
    </ul>
</div>
<div class="clr"></div>
<div id="windowDetails">
    <header>
        <div class="imgContainer"></div>
        <h1></h1>
    </header>
    <article></article>
</div>



<script type="text/x-kendo-tmpl" id="saboresTemplate">
    <li onclick="openDetails('${nombre}','${descripcion}','http://lorempixel.com/100/100', '${color}')">
        <div class="imgContainer">
            <span>.</span>
            <img src="http://lorempixel.com/100/100" />
        </div>
        <div class="clr"></div>
        <h1>${nombre}</h1>
        <div class="clr"></div>
    </li>
</script>

<script>
    $(document).ready(function(){
        $("#loading").hide();
        $("#topMenu").show();
        $("#topOp1").hide().siblings().show();
                        
        $("#saboresList").kendoListView({
            dataSource: {                        
                transport: {
                    read: {
                        type: "GET",
                        dataType: "json",
                        url: baseURL + appURL + "/jsonTables.php?table=Sabores"
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
        }).removeClass("k-widget");
        //$("#saboresList").removeClass("k-widget");
    }); //end documnt ready
            
    function openDetails(nombre, descripcion, imagen,color){
        console.log(nombre, descripcion, imagen,color);
        var windowDetails = $("#windowDetails").kendoWindow({}).data("kendoWindow");
                
        $("#windowDetails > header").css({
            'border-color': '#'+color 
        });
        $("#windowDetails > header > h1").text(nombre);
        $("#windowDetails > header > .imgContainer").html('<img src="'+imagen+'">');
        $("#windowDetails > article").text(descripcion);
                
                
        windowDetails.open();
        windowDetails.center();
    }
            
</script>