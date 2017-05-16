"use strict";


$(function()
{
   if ($('#slate').length !== 0) {
        var slate = new Slate('#slate');  // Permet de rendre le canvas avec l'id slate "dessinable"
    
        $('#drawingForm').submit(function(e){
            $(this).find('[name="drawing"]').val(slate.canvas.toDataURL());  // Permet de stoquer les données du canvas dans un champs de formulaire caché

        });

        var context = document.getElementById('slate').getContext('2d');  // On récupère le context du canvas
        
            if(context != null){
                var baseImg = new Image();
                
                baseImg.src = $('#drawingForm').find('[name="drawing_src"]').val();
                
                baseImg.onload = function(){  // Une fois l'image entièrement chargée on l'injecte dans le canvas:
                
                    context.drawImage(baseImg, 0, 0);
            }
        }
   }
    

    if ($('#slider').length !== 0) {
        var slider = new Slider($('#slider'));
    }
    
});

