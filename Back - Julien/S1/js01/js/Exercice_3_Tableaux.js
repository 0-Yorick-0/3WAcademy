/**
* Exercice Tableaux, Boucles et Conditions :
* 
* Créer un tableau de 10 nombres générer aléatoirement entre 1 et 100
* Ajouter +1 si le nombre est compris entre 10 et 30, +2 si ce nombre est compris entre 50 et 70, +5 si le nombre est supérieur à 70 
* Afficher chaque nombre du tableau dans le HTML (avec appendChild()) si le nombre est supérieur à 10
* Afficher la somme de tous les nombres et la moyenne des nombres
* 
* 
*/


function arrondir(nombre) {
	var arrondi = Math.floor(nombre);
	return arrondi;
} 

function insererElt(nombre) {
	var pElt = document.createElement("p");
	pElt.textContent = nombre;
	document.body.appendChild(pElt);
}

var nombres =[];
var somme = 0;

for (var i = 0; i < 10; i++) {
	nombres[i] = arrondir(((Math.random()*100)+1));
	console.log(nombres[i]);

	if(nombres[i] > 10 && nombres[i] < 30){
		nombres[i] += 1;
	} else if(nombres[i] > 50 && nombres[i] < 70) {
		nombres[i] += 5;
	} else if (nombres[i] >= 70){
		nombres[i] += 5;
	}

	if (nombres[i] > 10) {
		insererElt(nombres[i]);
	}

	somme += nombres[i];
}

var texteSomme = "La somme est : " + somme;

insererElt(texteSomme);

var moyenne = "La moyenne est : " + somme/nombres.length;

insererElt(moyenne);

