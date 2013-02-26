<article id="sentidos" class="page white">
    <header class="page">Usando los sentidos</header>
    <div class="clr"></div>
    <div class="sentidosImg">
        <img src="img/sentidos.png"><div class="clr"></div>
    </div>
    <div class="sentidosText">
        <p>
            Al degustar prestamos particular atención a las propiedades sensoriales
            (organolépticas) de un helado y nos basamos en ellas para decidir su nivel de calidad.
        </p>
        <p>
            <span class="bold">Según la Asociación Americana de Productos Lácteos,</span>
            la propiedad sensorial más importante en los helados es el <span class="bold">sabor</span>
            (flavor); a continuación la <span class="bold">textura</span> y por último, bastante distante, se encuentra el 
            <span class="bold">color</span>.
        </p>
    </div>
    <div class="clr"></div>
    <div id="sentidosTabstrip">

    </div>
</article>

<div class="clr"></div>
<script>
    $(document).ready(function(){
        $("#loading").hide();
        $("#topMenu").show();
        $("#topOp2").hide().siblings().show();
        
        $("#sentidosTabstrip").kendoTabStrip({
            animation: { 
                open: { effects: false}, 
                close: { effects: false} 
            },
            dataTextField: "text",
            //dataImageUrlField: "imageUrl",
            dataContentField: "content",
            dataSource: [
                {
                    text: 'Vista',
                    //imageUrl: "../../content/shared/icons/sports/baseball.png",
                    content: '<img src="img/vista.png" />'+
                        '<div class="tabText">'+
                            '<p>Al observar cómo el heladero arma un cucurucho, se tiene idea sobre la '+
                            '<span class="bold">consistencia</span> del producto. El <span class="bold">color</span> '+
                            'del helado, la <span class="bold">forma</span> y el <span class="bold">tamaño</span> del '+
                            'copete, la decoración, sus <span class="bold">defectos visibles</span> y el <span class="bold">brillo</span> '+
                            'de las coberturas y baños son propiedades apreciadas por los receptores existentes en la retina del ojo.</p>'+
                        '</div>'+
                        '<div class="clr"></div>'
                },
                {
                    text: "Tacto",
                    //imageUrl: "../../content/shared/icons/sports/golf.png",
                    content: '<img src="img/tacto.png" />'+
                        '<div class="tabText">'+
                            '<p>Al introducir una cuchara y al revolver el helado se puede percibir su textura. '+
                            'Hay que focalizar en atributos como la <span class="bold">consistencia, cremosidad '+
                            'viscosidad, arenosidad, grasitud y dureza</span> del helado.</p>'+
                        '</div>'+
                        '<div class="clr"></div>'
                },
                {
                    text: "Gusto",
                    //imageUrl: "../../content/shared/icons/sports/swimming.png",
                    content: '<img src="img/gusto.png" />'+
                        '<div class="tabText">'+
                            '<p>Se conocen 4 gustos: <span class="bold">ácido, amargo, salado y dulce</span>, los '+
                            'cuáles son percibidos por células especiales ubicadas en diferentes zonas de la '+
                            'lengua y de la cavidad faríngea.</p>'+
                            '<p>A su vez, <span class="bold">la consistencia, cremisidad, viscosidad, arenosidad, '+
                            'grasitud y dureza</span> son atributos de la textura percibidos por diversos receptores '+
                            'bucales cuando se aplasta el helado y desliza entre la lengua y el paladar, o cuando se lo '+
                            'muerde.</p>'+
                        '</div>'+
                        '<div class="clr"></div>'
                },
                {
                    text: "Oído",
                    //imageUrl: "../../content/shared/icons/sports/snowboarding.png",
                    content: '<img src="img/oido.png" />'+
                        '<div class="tabText">'+
                            '<p>También puede colaborar este sentido al escuchar el ruido producido al morder un '+
                            'cucurucho o una oblea, permitiendo sacar conclusiones sobre su <span class="bold">quebrabilidad '+
                            'y frescura</span>.</p>'+
                        '</div>'+
                        '<div class="clr"></div>'
                },
                {
                    text: "Olfato",
                    //imageUrl: "../../content/shared/icons/sports/snowboarding.png",
                    content: '<img src="img/olfato.png" />'+
                        '<div class="tabText">'+
                            '<p>Existen miles de olores originados por sustancias que escapan del alimento y penetran '+
                            'en las fosas nasales. El olor puede ser <span class="bold">frutal, almendrado '+
                            'chocolatado, mentolado, rancio, etc</span>. Sin embargo, la baja temperatura del helado ' +
                            'disminuye la volatilización de los componentes, perdiendo importancia este sentido frente a '+
                            'las otras propiedades sensoriales.</p>'+
                        '</div>'+
                        '<div class="clr"></div>'
                }
            ]

        }).data("kendoTabStrip").select(0);
        
        
    });
</script>