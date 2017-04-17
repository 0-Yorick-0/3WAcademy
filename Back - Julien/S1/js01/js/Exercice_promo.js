/**
*

Exercice pratique:
--------------------------------------------------------------------------------------------------------


 Créer une variable prix en dollar avec une valeur par défaut
 Créer une variable promotion qui sera un nombre
 
 Soustraire le prix à la promotion si le prix est supérieur  à 250 dollar 
 Afficher le nouveau prix promotionné
 Appliquer une réduction de 10$ si le prix est compris entre 400$ et 600$
 Afficher le nouveau prix si il y a eu une réduction
 
 Créer une nouvelle variable prix en euro et faire la conversion du nouveau prix en euro
 Puis afficher le prix en dollar et le prix en euro dans une phrase (concaténation)
 
 
 Appliquer la TVA (20%) aux prix en dollar et prix en euro
 Puis afficher le prix TTC en dollar et euro
 
 
 

*
*/








function arrondir(prix) {// On crée une fonction pour arrondir les prix à 2 chiffres après la virgule
	var prixArrondi = Math.round(prix*100)/100;
	return prixArrondi;
}

do{//tant que le prix rentré n'est pas compris entre 250 et 600 on redemande un prix valide
	var prixDollar = parseInt(prompt('Rentrez un prix entre 250 et 600')); //parseInt convertit la valeur rentrée en un nombre entier
	console.log(prixDollar);
} while (prixDollar < 250 || prixDollar > 600 || isNaN(prixDollar)); //on prévoit le cas où ce fourbe d'utilisateur rentretrait une chaine de caractère


do{//tant que le prix rentré n'est pas compris entre 250 et 600 on redemande un prix valide
	var promo = parseFloat(prompt('Rentrez une promo, comprise entre 0 et 1')); //parseFloat convertit la valeur rentrée en un nombre à virgule
	console.log(promo);
} while (promo < 0 || promo > 1 || isNaN(promo));

if (prixDollar > 250 && prixDollar < 400) {		
	var nouveauPrix = arrondir(prixDollar * promo);//premier cas, on applique la promo puis on arrondit le résultat avec la fonction ci-dessus
	// on crée un élément "p"
	var pElt = document.createElement("p");
	// on lui attribue un texte
	pElt.textContent = "Le nouveau prix est " + nouveauPrix + " $.";
	// on l'insère dans body
	document.body.appendChild(pElt);
	// console.log("Le nouveau prix est " + nouveauPrix + " $.");
} else if (prixDollar >= 400 && prixDollar <= 600) {
	var nouveauPrix = arrondir((prixDollar * promo) - 10);
	var pElt = document.createElement("p");
	pElt.textContent = "Le nouveau prix est " + nouveauPrix + " $.";
	document.body.appendChild(pElt);

	// console.log("Le nouveau prix est " + nouveauPrix + " $.");
}

var tauxChange = 0.94603; 

var prixEuro = arrondir(nouveauPrix * tauxChange);
var pElt = document.createElement("p");
	pElt.textContent = "Le prix en euro est " + prixEuro + " euros, pour prix en dollar de " + nouveauPrix + " $.";
	document.body.appendChild(pElt);
// console.log("Le nouveau prix en euro est " + prixEuro + " euros, le prix en dollar est " + nouveauPrix + " $.");

var TVA = 1.20;

var prixEuroTva = arrondir(prixEuro * TVA);
var prixDollarTva = arrondir(nouveauPrix * TVA);

var pElt = document.createElement("p");
	pElt.textContent = "Le nouveau prix TTC en euro est " + prixEuroTva + " euros, le prix TTC en dollar est " + prixDollarTva + " $.";
	document.body.appendChild(pElt);

// console.log("Le nouveau prix en euro est " + prixEuroTva + " euros, le prix TTC en dollar est " + prixDollarTva + " $.");