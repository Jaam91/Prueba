$(document).ready(function(){
        
        $('#otro').hide();
    
    $("select[name='Implemento\\[grupo_muscular\\]']").change(function(){

        if ($(this).val()== '-Otro-') { 

             $('#otro').show();

        }else{

            $('#otro').hide();
        }
        
        
    });
});