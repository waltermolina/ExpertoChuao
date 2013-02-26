$(function(){
	
    var dropbox = $('#dropbox'),
    message = $('.message', dropbox);
	
    dropbox.filedrop({
        // The name of the $_FILES entry:
        paramname:'pic', //
	fallback_id: 'realInput',	
        maxfiles: 5, //cantidad maxima de archivos en paralelo
        maxfilesize: 2, //tama�o maximo en mb
        url: urlCI, //archivo php que realiza la carga
		
        uploadFinished:function(i,file,response){
            $.data(file).addClass('done');
        // response is the JSON object that post_file.php returns
        },
		
        error: function(err, file) {
            switch(err) {
                case 'BrowserNotSupported':
                    showMessage('¡Tu navegador no soporta carga de archivos vía HTML5!');
                    break;
                case 'TooManyFiles':
                    alert('¡Demasiados Archivos! Selecciona máximo 5 archivos...');
                    break;
                case 'FileTooLarge':
                    alert('¡'+file.name+' es muy grande! Tamaño máximo: 2mb.');
                    break;
                default:
                    break;
            }
        },
		
        // Called before each upload is started
        beforeEach: function(file){
            if(!file.type.match(/^image\//)){
                alert('¡Solo se admiten imágenes!');
                // Returning false will cause the
                // file to be rejected
                return false;
            }
        },
		
        uploadStarted:function(i, file, len){
            createImage(file);
        },
		
        progressUpdated: function(i, file, progress) {
            $.data(file).find('.progress').width(progress);
        }
    	 
    });
	
    var template = '<div class="preview">'+
    '<span class="imageHolder">'+
    '<img />'+
    '<span class="uploaded"><span>.</span></span>'+
    '</span>'+
    '<div class="progressHolder">'+
    '<div class="progress"></div>'+
    '</div>'+
    '</div>'; 
	
	
    function createImage(file){

        var preview = $(template), 
        image = $('img', preview);
			
        var reader = new FileReader();
		
        image.width = 100;
        image.height = 100;
		
        reader.onload = function(e){
			
            // e.target.result holds the DataURL which
            // can be used as a source of the image:
			
            image.attr('src',e.target.result);
        };
		
        // Reading the file as a DataURL. When finished,
        // this will trigger the onload function above:
        reader.readAsDataURL(file);
		
        message.hide();
        preview.appendTo(dropbox);
		
        // Associating a preview container
        // with the file, using jQuery's $.data():
		
        $.data(file,preview);
    }

    function showMessage(msg){
        message.html(msg);
    }

});