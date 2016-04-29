/*******************************************************************************
 *              
 *                               Funciones Oauth
 *                                  
 *******************************************************************************/

$(document).ready(function(){
    
    $('#register').click(function(event){
        alert("s"); return false;
        event.preventDefault();
        //información del formulario modelo
        var formData    = new FormData(document.getElementById("nuevo_registro"));
        var base_url    = $("#base_url").val();
        
        $.ajax({
            type: "POST",
            url: base_url+"accounts/ingresar_registro",
            secureuri : false,
            //fileElementId :'logo',
            //dataType: 'json',
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false, 
            success: function(res) {
                if(res == 'success'){
                    //alert(res);
                    //Ocultar modal
                    $('#newProf').modal('toggle');
                    $('#newProf').modal('hide');

                   swal({ 

                        title: "Cuenta creada con exito",
                        text:  "Se ha enviado un e-mail de confirmación",
                        type:  "success" 
                    },
                    function(){


                        //window.location.href = 'login.html';
                        var url = base_url;   
                        $(location).attr('href',url);
                    });
                    
                }else{
                    var html = ''+res+'';
                    var errores = $(html).text();
                                       
                    swal({ 

                        title: "Error de validación",
                        text:   errores,
                        type:  "error"
                    });
                }
            }
        });
    });
});

