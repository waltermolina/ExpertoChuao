
<div id="cupon">                    
    <header>
        <h1>CHUAO</h1>
        <h2>Experto en Degustación de Helados</h2>
        <h3>ID: <input id="inputIdCupon" placeholder="id del cupón..." /></h3>
        <p class="fechaCupon">20/12/2021 20:12:00</p>
    </header>
    <div id="saboresCupon"></div>
</div>

<div id="cargar" class="page white">
    <h1>Ingresá el ID del cupón que deseas cargar</h1>
</div>
<div class="clr"></div>


<script>
    //var baseURL = window.location.protocol + "//" + window.location.host + "/Apps/Chuao";
    $(document).ready(function(){
        $("#loading").hide();
        $("#topMenu").show();
        $("#topOp3").hide().siblings().show();
    }); //end document ready       
</script>