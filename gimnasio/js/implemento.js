$(document).ready(function(){
        
        $('#otro').hide(); //Ocultamos la etiqueta al principio
    
    $("select[name='Implemento\\[grupo_muscular\\]']").change(function(){//Comienza la función

        if ($(this).val()== '-Otro-') { //Si elegimos -Otro-, nos mostrará el div con el id otro para agregar un nuevo grupo muscular
             $('#otro').show();

        }else{
            $('#otro').hide();
        }
        
        
    });
});