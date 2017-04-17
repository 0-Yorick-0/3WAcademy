// /**
// * Exercice 5 :  Bonus Boucle et Tableau
// */
// Créer un tableau des jours du mois de l'année (Janvier, Février, Mars, Avril ...Décembre)
// Affiche tous les mois de l'année
// Compteur le nombre de mois que comporte mon tableau et afficher ce nombre dans une page HTML
// Modifier chaque mois du tableau en mettant une majuscule au départ et le reste en miniscule (fonction toLowerCase())
// Modifier le mois de Mars par "C'est l'anniversaire du formateur!" et le mois de décembre par "C'est Noel"

// Bonus: Compter le nb de mois commençant par un "M" 
// Bonus 2: Demander a l'utilisateur quel mois il souhaite  et dire le mois saisi est dans le tableau des mois...ou pas! (fonction indexOf())


var Mois = {

	tabMois: ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre"], 

	run: function(){
		this.afficherMois();
		this.comptageMois();
		this.ajoutMaj();
		this.remplacerMois();
		this.compterM();
		this.chercherMois();
	},

	insertionElementDiv: function(Elt){
		var divElt = document.getElementById("wrapper");
		divElt.appendChild(Elt);
	},

	insertionElement: function(text) {
		var pElt = document.createElement("p");
		pElt.textContent = text;
		this.insertionElementDiv(pElt);
	},

	insertionElementLi: function(text, ul) {
		var liElt = document.createElement("li");
		liElt.textContent = text;
		console.log(ul);
		ul.appendChild(liElt);
	},

	afficherMois: function(){
		var ulElt = document.createElement("ul");
		for(var i = 0; i < this.tabMois.length; i++) {
			console.log(this.tabMois[i]);
			this.insertionElementLi(this.tabMois[i], ulElt);
		}
		this.insertionElementDiv(ulElt);
	},

	comptageMois: function(){
		var text = "Le nombre de mois est : " + this.tabMois.length;
		this.insertionElement(text);
	},

	ajoutMaj: function(){
		var newTab = this.tabMois.map(function(mois){
			mois = mois.substr(0, 3).toUpperCase() + mois.substring(3).toLowerCase();
			return mois;
		});
		console.log(newTab);
		this.tabMois = newTab;
		console.log(this.tabMois);
		this.afficherMois();
	},

	remplacerMois: function(){
		var selectMois = prompt("Quel mois voulez-vous changer?");
		var nouveauMois = prompt("Que voulez-vous écrire?");
		this.tabMois = this.tabMois.map(function(mois){
		var moisChange = mois.replace(selectMois, nouveauMois);
		return moisChange;
	});
		this.afficherMois();
	},

	compterM: function(){
		var compteurM = 0;
		for (var i = 0; i < this.tabMois.length; i++){
			if (this.tabMois[i].charAt(0) == "M"){
				compteurM++;
			}
		}
		var text = "Le nombre de mois commençant par M est : " + compteurM;
		this.insertionElement(text);
	},

	chercherMois: function(){
		var seekedMonth = prompt("Quel mois voulez-vous rechercher ?");
		if (this.tabMois.indexOf(seekedMonth) == -1) {
			console.log(this.tabMois.indexOf(seekedMonth));
			var text = "Sérieux, tu connais pas tes mois?";
			this.insertionElement(text);
		} else {
			var text = "Le mois " + seekedMonth + " est bien dans le tableau";
			this.insertionElement(text);		
		}
	},
	

};

var lancement = {

	lancerProgramme: function(programme){
		var lancerElt = document.getElementById("lancer");
		lancerElt.addEventListener("click", function () {
		var divElt = document.getElementById("wrapper");
		divElt.removeChild(lancerElt);
		programme.run();
		var quitterElt = document.createElement("a");
		quitterElt.href = "Exercice_5_Boucle.html";
		quitterElt.textContent = "quitter le programme";
		document.body.appendChild(quitterElt);
		});
	},
};


// Execution

lancement.lancerProgramme(Mois);