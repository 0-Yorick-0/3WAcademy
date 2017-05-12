"use strict";


$(function()
{
   if ($('#slate').length !== 0) {
        var slate = new Slate('#slate');  // Permet de rendre le canvas avec l'id slate "dessinable"
    
        $('#drawingForm').submit(function(){
    
        $(this).find('[name="drawing"]').val(slate.canvas.toDataURL());  // Permet de stoquer les données du canvas dans un champs de formulaire caché
    
    });
   }
    

    if ($('#slider').length !== 0) {
        var slider = new Slider($('#slider'));
    }
    
});

