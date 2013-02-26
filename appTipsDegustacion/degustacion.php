<article id="degustacion" class="page white">
    <header class="page">Guía de Degustación</header>
    <div class="clr"></div>
    <div class="degustacionImg">
        <img src="img/degustar.png"><div class="clr"></div>
    </div>
    <div class="degustacionText">
        <p>La mejor forma de percibir el sabor del helado consiste en 
            <span class="bold">deslizarlo lentamente por toda la superficie
                de la lengua, respirando y exhalando aire por la nariz</span>.
        </p>
        <p>Si se va a efectuar un análisis que abarque todas las propiedades
            sensoriales del helado y se carece de suficiente experiencia, sugerimos
            la siguiente guía práctica resumida.
        </p>
    </div>
    <div class="clr"></div>
    <div id="degustacionTabstrip">

    </div>
</article>

<div class="clr"></div>
<script>
    $(document).ready(function(){
        $("#loading").hide();
        $("#topMenu").show();
        $("#topOp3").hide().siblings().show();
        
        $("#degustacionTabstrip").kendoTabStrip({
            animation: { 
                open: { effects: false}, 
                close: { effects: false} 
            },
            dataTextField: "text",
            //dataImageUrlField: "imageUrl",
            dataContentField: "content",
            dataSource: [
                {
                    text: '1',
                    //imageUrl: "../../content/shared/icons/sports/baseball.png",
                    content: '<img src="img/aspecto.png" />'+
                        '<div class="tabText">'+
                            '<p><span class="bold">Aspecto</span></p>'+
                            '<p>Observar: </p>'+
                            '<ul class="dotList">'+
                                '<li>Que el <span class="bold">tono</span> sea el apropiado, ni muy intenso ni muy pálido.</li>'+
                                '<li>La <span class="bold">uniformidad del color</span> en toda la superficie.</li>'+
                                '<li>Si el <span class="bold">copete</span> mantiene la forma.</li>'+
                                '<li>La presencia de <span class="bold">partículas quemadas</span>.</li>'+
                                '<li>La presencia de <span class="bold">partículas o grumos blancuzcos</span>.</li>'+
                                '<li>Cualquier otro <span class="bold">detalle llamativo</span>.</li>'+
                            '</ul>'+
                        '</div>'+
                        '<div class="clr"></div>'
                },
                {
                    text: "2",
                    //imageUrl: "../../content/shared/icons/sports/golf.png",
                    content: '<img src="img/texturaManual.png" />'+
                        '<div class="tabText">'+
                            '<p><span class="bold">Textura Manual</span></p>'+
                            '<ul class="dotList">'+
                                '<li>Hundir lentamente la cucharita hasta el fondo del helado: sentir la <span class="bold">consistencia o firmeza.</li>'+
                                '<li>Revolver lentamente para percibir <span class="bold">viscosidad</span>.</li>'+
                                '<li>Levantar despacio la cucharita hasta por encima de la superficie y observar la liga o <span class="bold">arrastre</span> del helado (no debe ser excesiva).</li>'+
                                '<li>Modelar un pequeño copete para estudiar la <span class="bold">plasticidad</span> del alimento.</li>'+
                            '</ul>'+
                        '</div>'+
                        '<div class="clr"></div>'
                },
                {
                    text: "3",
                    //imageUrl: "../../content/shared/icons/sports/swimming.png",
                    content: '<img src="img/texturaBucal.png" />'+
                        '<div class="tabText">'+
                            '<p><span class="bold">Textura Bucal</span></p>'+
                            '<p>Deslizar el helado apretando la lengua contra el paladar y percibir: </p>'+
                            '<ul class="dotList">'+
                                '<li><span class="bold">Sensación fría</span> (no debe ser muy intensa)</li>'+
                                '<li>Consistencia o <span class="bold">cuerpo</span>.</li>'+
                                '<li>Presencia de <span class="bold">cristales de hielo</span> (se derriten posteriormente).</li>'+
                                '<li>Presencia de <span class="bold">cristales de lactosa</span> (la arenosidad no desaparece).</li>'+
                                '<li>Tiempo que tarda en <span class="bold">derretirse</span> (no debe fundir muy rápido).</li>'+
                                '<li><span class="bold">Viscosidad</span> de helado ya fundido (resistencia que opone la mezcla al ser deslizada por la boca).</li>'+
                            '</ul>'+
                        '</div>'+
                        '<div class="clr"></div>'
                },
                {
                    text: "4",
                    //imageUrl: "../../content/shared/icons/sports/snowboarding.png",
                    content: '<img src="img/sabor.png" />'+
                        '<div class="tabText">'+
                            '<p><span class="bold">Sabor</span></p>'+
                            '<p>Paladear una nueva porción del helado respirando y exhalando por la nariz varias veces y juzgar: </p>'+
                            '<ul class="dotList">'+
                                '<li>Si el <span class="bold">sabor es agradable, dulce y equilibrado</span>.</li>'+
                                '<li>Si falta <span class="bold">sabor</span>.</li>'+
                                '<li>Si hay <span class="bold">exceso de saborizante</span>.</li>'+
                                '<li>Si se detectan <span class="bold">sabores defectuosos:</span> rancio, amargo, agrio, metálico, recalentado, otros.</li>'+
                            '</ul>'+
                        '</div>'+
                        '<div class="clr"></div>'
                }
            ]

        }).data("kendoTabStrip").select(0);
        
        
    });
</script>