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


// The hard part

var gestionPromo = { //on crée la classe qui va gérer tout les événements
	// on définit une série de proprietés 
	prixDollar: 0,
	promo: 0,
	nouveauPrix: 0,
	prixEuro: 0,
	tauxChange: 0.94603,
	TVA: 1.20,

	run: function() { //permet de lancer le programme
		this.setPrixDollar(); //on demande à l'utilisateur de rentrer un prix
		this.setPromo(); //on demande à l'utilisateur de rentrer une promo
		this.doPromo(); // on applique la promo
		this.affichagePrixEuro(); //on demande à afficher le prix en Euro, la conversion se fait automatiquement au sein de la classe
		this.affichagePrixTVA(); //on demande à afficher les prix avec TVA
	},

	arrondir: function(prix) {// On crée une fonction pour arrondir les prix à 2 chiffres après la virgule
	var prixArrondi = Math.round(prix*100)/100;
	//console.log(prixArrondi);
	return prixArrondi;
	},

	conversion: function(){
		var prixEuro = this.arrondir(this.nouveauPrix * this.tauxChange);
		this.prixEuro = prixEuro;
		//console.log("conversion : " + this.prixEuro);
	},

	insertionElement: function(text) {
		var pElt = document.createElement("p");
		// on lui attribue un texte
		pElt.textContent = text;
		// on l'insère dans body
		document.body.appendChild(pElt);
	},

	affichagePrixPromo: function() {
		var text = "Le nouveau prix promotionné est " + this.nouveauPrix + " $.";
		this.insertionElement(text);
	},

	affichagePrixEuro: function() {
		this.conversion(this.nouveauPrix);
		var text = "Le prix en euro est " + this.prixEuro + " euros, pour prix en dollar de " + this.nouveauPrix + " $.";
		this.insertionElement(text);
	},

	affichagePrixTVA: function() {
		var prixEuroTva = this.arrondir(this.prixEuro * this.TVA);
		var prixDollarTva = this.arrondir(this.nouveauPrix * this.TVA);
		var text = "Le nouveau prix TTC en euro est " + prixEuroTva + " euros, le prix TTC en dollar est " + prixDollarTva + " $.";
		this.insertionElement(text);
	},

	setPrixDollar: function() {
		do{//tant que le prix rentré n'est pas compris entre 250 et 600 on redemande un prix valide
		var prix = parseInt(prompt('Rentrez un prix entre 250 et 600')); //parseInt convertit la valeur rentrée en un nombre entier
		//console.log(prixDollar);
		} while (prix < 250 || prix > 600 || isNaN(prix)); //on prévoit le cas où ce fourbe d'utilisateur rentretrait une chaine de caractère
		this.prixDollar = prix;
		console.log(this.prixDollar);
	},

	setPromo: function() {
		do{//tant que le prix rentré n'est pas compris entre 250 et 600 on redemande un prix valide
		var taux = parseFloat(prompt('Rentrez une promo, comprise entre 0 et 1')); //parseFloat convertit la valeur rentrée en un nombre à virgule
		//console.log(promo);
		} while (taux < 0 || taux > 1 || isNaN(taux));
		this.promo = taux;
		console.log(this.promo);
	},

	doPromo: function() {
		if (this.prixDollar > 250 && this.prixDollar < 400) {		
			var nouveauPrix = this.arrondir(this.prixDollar * this.promo);//premier cas, on applique la promo puis on arrondit le résultat avec la fonction ci-dessus
			this.nouveauPrix = nouveauPrix;
			this.affichagePrixPromo(nouveauPrix);
			console.log("Le nouveau prix est " + this.nouveauPrix + " $.");
			} else if (this.prixDollar >= 400 && this.prixDollar <= 600) {
			console.log(this.prixDollar);
			console.log(this.promo);
			var nouveauPrix = this.arrondir((this.prixDollar * this.promo) - 10);
			this.nouveauPrix = nouveauPrix;
			this.affichagePrixPromo(nouveauPrix);
			console.log("Le nouveau prix est " + this.nouveauPrix + " $.");
		}
	},
};

// The easy part


gestionPromo.run();
