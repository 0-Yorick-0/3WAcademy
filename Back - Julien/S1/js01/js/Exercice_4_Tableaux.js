// ## Exercice 4: les Tableaux

// L'utilisateur saisit un montant HT, le résultat TTC s'affiche en HTML.


// ## Détails
// * L'affichage en HTML utilisera des fonction de manipulation de la DOM suivantes: appendChild(),  
// * Le taux de TVA utilisé est le taux normal en vigueur en France.
// * Le taux de TVA n'est pas variable il faut donc utiliser une constante. (mot clefs "const" en JS)
// * Il faut réafficher toutes les informations : le montant HT, le montant de TVA et le résultat TTC.
// * Attention au type de donnée renvoyé par prompt(), c'est une chaine de caractère. Utilisé parseInt()
// * Le montant HT peut être à virgule… utiliser une fonction d'arrondit
// * Enfin, Demander 8 autres prix à l'utilisateurs, appliquer la TVA pour chacun des prix et afficher ces prix dans le HTML
//   Vous pouvez utiliser les tableaux et les boucles

// Bonus 2: Modifier le programme pour afficher la date de saisi de chaque prix 
// tel que : "Vous avez saisis le prix 15€ le Mardi 11 Février 2014 à 10:30:27"



var conversion = {

	prixUser: [],
	prixTTC: 0,
	tauxTVA: 0,
	nbPrix: 0,
	dateDeSaisie: [],
 

	run: function(){
		this.setNbPrix(); // on demande à l'utilisateur combien de prix il veut rentrer
		this.setPrixUser();//on demande le prix à l'utilisateur
		this.affichagePrixUser();
		this.seMoquerDeGuillaume();// on se moque de Guillaume
	},

	//TOOLS

	arrondir: function(prix) {
		var arrondi = Math.round(prix*100)/100;
		console.log("prix arrondi : " + arrondi);
		return arrondi;
	},

	appliquerTVA: function(prix) {
		const tauxTVA = 20;
		this.tauxTVA = tauxTVA;
		var prixConverti = this.arrondir(prix * ((this.tauxTVA/100) + 1));
		console.log("taux TVA : " + this.tauxTVA + " pourcent");
		this.prixTTC = prixConverti;
		console.log("prix converti : " + this.prixTTC);
		return prixConverti;
	},

	// miseEnValeur: function(element) {
	// 	var strong = '<strong>' + element + '</strong>';
	// 	var strongElt;
	// 	strongElt.innerHTML += strong;
	// 	console.log(strongElt);
	// 	return strongElt;
	// },

	insertionElement: function(text) {
		var pElt = document.createElement("p");
		pElt.textContent = text;
		document.body.appendChild(pElt);
	},

	date: function() {
		var tabJours = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
		var tabMois = ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre"];

		var date = new Date(); //on instancie la classe native Date

		var jour = tabJours[date.getDay()];//on utilise la proprieté getDay qui renvoie un nombre, qui sera l'indice de notre tableau de jour
		var numeroJour = date.getDate();
		var mois = tabMois[date.getMonth()];
		var annee = date.getFullYear();
		console.log("jour :" + jour + " numero du jour :" + numeroJour + " mois : " + mois + " annee : " + annee);

		var heure = date.getHours();
		var minutes = date.getMinutes();
		var secondes = date.getSeconds();

		var dateDuJour = "le " + jour + " " + numeroJour + " " + mois + " à " + heure + "h" + minutes + "m" + secondes + "s";
		console.log(dateDuJour);
		return dateDuJour;
	},

	//Fonction exécutives

	setNbPrix: function() {
		var nbPrix;
			do {
				if(isNaN(nbPrix) && nbPrix !== undefined){
					var nbPrix = Math.round(parseFloat(prompt("Veuillez saisir un nombre svp")));
					this.nbPrix = nbPrix;
					console.log("nb de prix saisi par User : " + this.nbPrix);
				}else {
					var nbPrix = parseFloat(prompt("Combien de prix voulez-vous rentrer ?"));
					this.nbPrix = nbPrix;
					console.log("nb prix saisi par User : " + this.nbPrix);
				}
			} while (isNaN(nbPrix));

	},

	setPrixUser: function () {
		for (var i = 0; i < this.nbPrix; i++) {
			var prixUser;
			do {
				if(isNaN(prixUser) && prixUser !== undefined){
					var prixUser = this.arrondir(parseFloat(prompt("Veuillez saisir un prix HT, et pas une chaine de caracteres")));
					this.prixUser[i] = prixUser;
					this.dateDeSaisie[i] = this.date();
					console.log("prix saisi par User : " + this.prixUser);
				}else {
					var prixUser = this.arrondir(parseFloat(prompt("Veuillez saisir un prix HT")));
					this.prixUser[i] = prixUser;
					this.dateDeSaisie[i] = this.date();
					console.log("prix saisi par User : " + this.prixUser);
				}
			} while (isNaN(prixUser));
		}
	},

	affichagePrixUser: function() {
		for (var i = 0; i < this.nbPrix; i++) {
			var prixTTC = this.appliquerTVA(this.prixUser[i]);
			var text = "Vous avez saisi le prix " + this.prixUser[i] + " € " + this.dateDeSaisie[i] + ". Le montant de la TVA est de " + this.tauxTVA + " %, le prix TTC est de " + this.prixTTC + " €.";
			this.appliquerTVA(this.prixUser);
			this.insertionElement(text);
		}
	},

	seMoquerDeGuillaume: function(){
		var reponse = prompt("Voulez-vous vous moquer de Guillaume ?");
		if(reponse == "oui"){
			var text = "Guillaume devrait VRAIMENT installer Sublime Text.";
			this.insertionElement(text);
		}
	},

};

//Execution


var lancerElt = document.getElementById("lancer");

lancerElt.addEventListener("click", function () {
	document.body.removeChild(lancerElt);
	conversion.run();
	var quitterElt = document.createElement("a");
	quitterElt.href = "Exercice_4_Tableaux.html";
	quitterElt.textContent = "quitter le programme";
	document.body.appendChild(quitterElt);
});





// var pElt = document.getElementById("test");
// pElt.innerHTML += "<strong>Gras</strong>";


