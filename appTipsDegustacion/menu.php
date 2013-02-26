<header id="mainHeader" class="page">
    Te dejamos algunos tips para que seas un Experto en Degustación
</header>
<nav id="mainNav">
    <div id="op1" class="option orange">Sabor vs. Gusto</div><div class="clr"></div>
    <div id="op2" class="option orange">Usando los Sentidos</div><div class="clr"></div>
    <div id="op3" class="option orange">Guía de Degustación</div><div class="clr"></div>
</nav>

<div class="clr"></div>

<script>
    $(document).ready(function(){
        $("#loading").hide();
        $("#topMenu").hide();
        
        $("#op1").click(function(){
            $("#content").load(baseURL + appURL + "/appTipsDegustacion"+ "/saborGusto.php");
            $("#loading").show();
        })
        $("#op2").click(function(){
            $("#content").load(baseURL + appURL + "/appTipsDegustacion"+ "/sentidos.php");
            $("#loading").show();
        })
        $("#op3").click(function(){
            $("#content").load(baseURL + appURL + "/appTipsDegustacion"+ "/degustacion.php");
            $("#loading").show();
        })
        
    });
            
</script>