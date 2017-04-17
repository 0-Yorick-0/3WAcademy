'use strict';

var saisie = {
	nombre: 0,

    run: function(){
    	this.saisie();
    	this.afficherNombre();
    },

    insertionElement: function(text){
	    var pElt = document.createElement("p");
	    pElt.textContent = text;
	    document.body.appendChild(pElt);
	},

	saisie: function(){
		do{
			this.nombre = parseFloat(prompt("Veuillez saisir un nombre svp"));
		}while(isNaN(this.nombre));
	},

	afficherNombre: function(){
		var text = "Le nombre saisi est : " + this.nombre;
		this.insertionElement(text);		
	},
};

saisie.run();
