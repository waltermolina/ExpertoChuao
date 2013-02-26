<div id="premios" class="page">
    <header>
        <h1>Premios</h1>
        <p>Esta es la lista de premios que puedes obtener. Según tu progreso se irán habilitando para que los reclames.</p>
    </header>
    <div class="clr"></div>
    <ul class="ch-grid" id="premiosList"></ul>
</div>
<div class="clr"></div>

<script type="text/x-kendo-tmpl" id="premiosTemplate">
    <li id="premio${idPremios}">
        <div class="imgContainer">
            #imgPath(imagen, idPremios)#
        </div>
        <div class="page squared detallePremio">
            <h1>${nombre}</h1>
            <p>${descripcion}</p>
            #generateClaimButton(idPremios)#
        </div>
    </li>
</script>

<script>
    var imgFolderURL = "/Apps/Chuao/img/premios/";
    function imgPath(imagen, idPremios){
        setTimeout( function(){
            img = '<img src="' + baseURL + imgFolderURL + imagen + '" />'+
                '<div class="clr"></div>';
            $("#premio" + idPremios + "> .imgContainer").html(img);
        },500);
    }
    function generateClaimButton(idPremios){
        setTimeout( function(){
            content = '<a href="javascript:void(0)" onClick="claimPrice('+idPremios+')" class="m-btn mini red">¡Lo quiero!</a>';
            $("#premio" + idPremios + "> .detallePremio").append(content);
        },500);
    }
    
    function claimPrice(idPremios){
        
    }
    
    
    $(document).ready(function(){        
        $("#loading").hide();
        $("#topMenu").show();
        $("#topOp2").hide().siblings().show();
        
        $("#premiosList").kendoListView({
            dataSource: {                        
                transport: {
                    read: {
                        type: "GET",
                        dataType: "json",
                        url: baseURL + appURL + "/jsonTables.php?table=Premios"
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
            template: kendo.template($("#premiosTemplate").html())
        }).removeClass("k-widget");
        //$("#saboresList").removeClass("k-widget");
    }); //end document ready
    
</script>