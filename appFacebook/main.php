<nav id="mainNav">
    <div id="op3" class="option">Cargar cupón <i class="icon-plus"></i></div><div class="clr"></div>
    <div id="op1" class="option">Sabores y Logros <i class="icon-eye-open"></i></div><div class="clr"></div>
    <div id="op2" class="option">Premios <i class="icon-trophy"></i></div><div class="clr"></div>
    
</nav>
<aside id="mainAside" class="page">
    <div id="globito1" class="globito">
        <p>Vení a nuestro local en <span class="bold">Balcarce 602</span> o hace tu pedido al <span class="bold">425252</span></p>
        <img src="../img/globitos-presentacion/globo-4.png" />
        <div class="sombra"></div>
    </div>
    <div id="globito2" class="globito">
        <p>Probá los <span class="bold">50 sabores artesanales Chuao</span> de esta promo</p>
    </div>
    <div id="globito3" class="globito">
        <p>Diplomate como <span class="bold">Experto en Degustación de Helados Chuao</span></p>
        <img src="../img/globitos-presentacion/globo-9.png" />
        <div class="sombra"></div>
    </div>
</aside>
<div class="clr"></div>

<script>
    $(document).ready(function(){
        $("#loading").hide();
        $("#topMenu").hide();
        
        $("#op1").click(function(){
            $("#content").load(baseURL + appURL + "/appFacebook"+ "/logros.php");
            $("#loading").show();
        });
        $("#op2").click(function(){
            $("#content").load(baseURL + appURL + "/appFacebook"+ "/premios.php");
            $("#loading").show();
        })
        $("#op3").click(function(){
            $("#content").load(baseURL + appURL + "/appFacebook"+ "/cargar.php");
            $("#loading").show();
        })
    });
            
</script>