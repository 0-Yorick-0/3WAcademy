//jQuery(document).ready(function() {
$(function(){  // synthaxe simplifiée de la ligne n°1 passé en commentaire
	console.log('jQuery is fuckin\' ready !');
    var colors = [];
    var accessories = [];

// Gestion des coloris
colors = [
	{
		title : 'Silver / Noir' ,
		image : 'fauteuil-silver-noir.png',
		LPPR : true,
		price : 2700
	},
	{
		title : 'Silver / Rouge' ,
		image : 'fauteuil-silver-rouge.png',
		LPPR : true,
		price : 2800
	},
	{
		title : 'Bleu / Noir' ,
		image : 'fauteuil-bleu.png',
		LPPR : true,
		price : 2900
	},
	{
		title : 'Rouge / Noir' ,
		image : 'fauteuil-rouge-noir.png',
		LPPR : true,
		price : 2900
	}
];
// Gestion des accessoires
    accessories = [
        {
            title : 'Adaptateur Chargeur Batterie' ,
            image : 'adaptateur.png',
            description : 'Permet d\'adapter le chargeur de la baterrie',
            LPPR : true,
            price : 40
        },
        {
            title : '2 ème Batterie' ,
            image : '2eme-batterie.png',
            description : 'Batterie de rechange longue durée',
            LPPR : false,
            price : 400
        },
        {
            title : 'Commande tiers Personne' ,
            image : 'commande-tiers-personne.png',
            description : '',
            LPPR : false,
            price : 70
        },
        {
            title : 'Commande paramètrable' ,
            image : 'commande-parametrage.png',
            description : '',
            LPPR : false,
            price : 80
        },
        {
            title : 'Kit Batterie All Inclusive' ,
            image : 'kit-batterie-all-inclusive.png',
            description : '',
            LPPR : false,
            price : 100
        },
        {
            title : 'Appui tête' ,
            image : 'appuie-tete.png',
            description : '',
            LPPR : false,
            price : 60
        },

        {
            title : 'Pantographe' ,
            image : 'pantographe.png',
            description : '',
            LPPR : false,
            price : 200
        },
        {
            title : 'Repose Pieds XL' ,
            image : 'repose-pieds-xl.png',
            description : '',
            LPPR : false,
            price : 20
        },
        {
            title: 'Roues avant Bandages Larges' ,
            image : 'roues-avant-bandages.png',
            description : '',
            LPPR : false,
            price : 80
        },
        {
            title : 'Assise Réhaussée' ,
            image : 'assise-rehaussee.png',
            description : '',
            LPPR : false,
            price : 90
        },
        {
            title : 'Assise Modulable' ,
            image : 'assise-modulable.png',
            description : '',
            LPPR : false,
            price : 90
        },
        {
            title : 'Joystick Standard' ,
            image : 'joystick-standard.png',
            description : '',
            LPPR : false,
            price : 0
        },
        {
            title : 'Porte Bagages' ,
            image : 'porte-bagage.png',
            description : '',
            LPPR : false,
            price : 300
        },
        {
            title : 'Saccoche' ,
            image : 'sacoche.png',
            description : '',
            LPPR : false,
            price : 70
        },
        {
            title : 'Porte Canne' ,
            image : 'porte-canne.png',
            description : '',
            LPPR : false,
            price : 70
        }
        ,
        {
            title : 'Sac de transport' ,
            image : 'sac-transport.png',
            description : '',
            LPPR : false,
            price : 120
        }
    ];

	var viewer = $('#viewer');
    var formColorsArea = $('#form_colors');
    var $formAccessoriesArea = $('#form_accessories');
    var total = 0;
    var radioValue = 0;

    var imgChair = $('img.color');

    function manageAccessories(param, src, container){
        var imgAccess = $('<img class="accessory" src="'+ src + '">');
        if(param){
            container.append(imgAccess);
        }else{
            $('img[src="' + src + '"]').remove();
        }
    }

	for(let color of colors){
		var radio = $('<input type="radio" name="color" data-price="' + color.price + '" data-layer="' + color.image + '" value = "' + color.title + '">' + color.title + '<br>');
		formColorsArea.append(radio);
	}

    for(let access of accessories){
        var checkBox = $('<div class="element">\
            				<input data-description="' + access.description + '" data-price="' + access.price + '" data-lppr="' + access.LPPR + '" id="accessory_' + jQuery.inArray(access, accessories)+ '" type="checkbox" name="accessories[]" data-layer="' + access.image + '" value="' + jQuery.inArray(access, accessories)+ '">\
            				<label for="accessory_' + jQuery.inArray(access, accessories)+ '">' + access.title + '</label>\
							<span class="price">' + access.price + '€\
							<span class="lppr">*</span>\
							</span>\
						</div>');
        $formAccessoriesArea.append(checkBox);
    }

    var $boutons = $('input[type = checkbox],input[type= radio]'); // je recupere un objet avec tous les boutons checkbox et radio

	$boutons.change(function(){
		var price = parseInt($(this).attr("data-price"));
        var src = './images/' + $(this).data('layer');

		if($(this).is('input[type = radio]')){
			imgChair.attr('src', './images/' + $(this).data('layer'));
			total -= radioValue;
			total += price;
			radioValue = price;
		}else if($(this).is('input[type = checkbox]') && $(this).is(':checked')){
            total += price;
            manageAccessories(true, src, viewer);
		}else{
            total -= price;
            $('<img class="accessory" src="' + src + '">').remove();
            manageAccessories(false, src, viewer);
		}
        $('#total').html(total);
	});

});