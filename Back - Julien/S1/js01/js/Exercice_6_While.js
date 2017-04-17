/**
* Boucle while(): "tant que"

***************************************** Nombre d'Or *************************************

* Générer un nombre aléatoire entre 1 et 15 (Math.random())
* Demander à l'utilisateur  de deviner ce nombre aléatoire (prompt() et parseInt())
* Si le nombre est une lettre ou un caractères spécial , demander de resaisir le chiffre

* Il a perdu si...: Il a atteint 10 tentatives de devinette, afficher "Vous avez perdu"
* Il a gagné si...: Si le nombre saisis est le nombre aléatoire, on arrete le jeu et on affiche
  son nombre d'essai "Vous avez gagné au bout de 2 tentatives!"

* Bonus: On stockera tous les essais des nombres saisies dans un tableau
et affichera tous ces essais si il a perdu avec la solution

* Bonus 2: On affichera si il est près du nombre à trouver selon un écart type de 2 ( +/- 2)
Afficher le message "Vous êtes bouillant"

* Bonus 3: Demander le niveau d'entrée du jeu au début:
  niveau débutant(nombre aléatoire entre 1 et 15, 10 chances)
niveau intermédiaire(nombre aléatoire entre 1 et 25, 8 chances)
niveau professionnel (nombre aléatoire entre 1 et 40, 4 chances)

* Bonus 4: A l'aide d'une fonction et boucle, demander si il a perdu ou gagner
de vouloir rejouer ce qui relancera depuis le debut le jeu.

*/

//classe lanceur, qui gère le lancement du programme et l'affichage des options de jeu

var lancement = {

	difficulte: '', //proprieté de notre classe

	toggleElement: function(Elt) {// pour enlever un element dans le html
 		document.querySelector(Elt).classList.toggle("hidden");
		console.log("toggle " + Elt);
	},

	checkDifficulte: function(){//pour savoir quelle option de difficulté l'utilisateur a choisi
		var formElt = document.getElementsByName('difficulte');
		for (var i = 0; i < formElt.length; i++){
			if (formElt[i].checked){
				// console.log("formElt[i]" + formElt[i]);
				this.difficulte = formElt[i].value;
				// console.log("difficulté séléctionnée : " + formElt.value);
				// console.log("difficulté parametrée : " + this.difficulte);
			}
		}
		if (this.difficulte == '')// si aucune valeur récupérée
		{
			console.log("difficulté : " + this.difficulte);
			alert("Pas de niveau de difficulté choisi");

		}
	},

	init: function(isFirst, programme){
		this.toggleElement('#relancer');
		this.toggleElement('.resultat');
		document.querySelector(".resultat").innerHTML = '';
		this.difficulte = '';
		if(isFirst){
			document.querySelector("#lancer").addEventListener("click", function(){
				console.log("click on lancer");
				lancement.lancerProgramme(programme, lancement.difficulte);
				console.log("nombre d'or : over");
			});
			document.querySelector("#relancer").addEventListener("click", function(){
				lancement.toggleElement("form");
				lancement.toggleElement("#lancer");
				lancement.init(false);
		});
		}
		console.log("affect-end");
	},

	//fonction de lancement du programme (ici nombredOr)
	lancerProgramme: function(programme)
	{
		lancement.toggleElement("form");
		console.log("prgrm on");
		lancement.toggleElement("#lancer");
		lancement.toggleElement("#relancer");
		this.toggleElement('.resultat');
		console.log(programme);
		this.checkDifficulte();
		programme.run(this.difficulte);
	},
};

//classe nombre d'Or

var nombredOr = {

	nombre: 0, //nombre généré
	reponse: 0, // réponse du joueur
	tabEssais: [], //tableau où seront stockés les essais
	difficulte: '',
	nombreMin: 0,
	nombreMax: 0,
	nombreChances: 0,
	//la fonction qui va lancer les différentes étapes du programme
	run: function(difficulte, start){
		if(start !== undefined){
			console.log("param diff : " + start);
			this.difficulte = difficulte;
			console.log("difficulté reçue par nombredOr : " + this.difficulte);
			this.setParamJeu();
			this.genererNombre();
			this.comparer();
		}
	},

	setParamJeu: function(){
		//on teste la difficulté
		switch(this.difficulte){
			case "debutant":
				this.nombreMin = 1;
				this.nombreMax = 15;
				this.nombreChances = 10;
				break;
			case "intermediaire":
				this.nombreMin = 1;
				this.nombreMax = 25;
				this.nombreChances = 8;
				break;
			case "professionnel":
				this.nombreMin = 1;
				this.nombreMax = 40;
				this.nombreChances = 4;
				break;
			default:
		}
	},

	genererNombre: function(){
		var nombre = Math.floor(Math.random() * (this.nombreMax - this.nombreMin + 1)) + this.nombreMin;
		this.nombre = nombre;
		console.log("le nombre généré : " + this.nombre);
	},

	devinette: function(){
		do {
			var reponse = prompt("Merci de rentrer un nombre entre 1 et " + this.nombreMax);
		} while(isNaN(reponse));
		this.reponse = parseInt(reponse);
	},



	insertionElement: function(text){
		var pElt = document.createElement("p");
		pElt.textContent = text;
		document.querySelector("div").appendChild(pElt);
	},

	insertionElementLi: function(text, ul) {
		var liElt = document.createElement("li");
		liElt.textContent = text;
		ul.appendChild(liElt);
	},

	ecartType: function(nombre){
		var ecartType = this.nombre - nombre;
		if (ecartType <= 2 && ecartType >= -2 && ecartType !== 0) {
			alert("Vous êtes chaud(e) bouillant(e) !");
		}
	},


	comparer: function(){
		var compteur = 0;
		while(this.reponse !== this.nombre && compteur <= (this.nombreChances -1)){
			this.devinette();
			this.tabEssais.push(this.reponse);
			compteur++;
			this.ecartType(this.reponse);
		}
		 if (this.reponse == this.nombre) {
	 	var text = "Bravo vous avez gagné en " + compteur + " essai(s), vous pouvez adopter un air hautain et condescendant";
		this.insertionElement(text);
		} else {
			var text = "Vous êtes un gros blaireau, ayez honte de vous-même et écoutez du Maître Gim's";
			this.insertionElement(text);
			var ulElt = document.createElement("ul");
			for (var i = 0; i < this.tabEssais.length; i++){
				var text = "Essais " + (i + 1) + " :" + this.tabEssais[i];
				this.insertionElementLi(text, ulElt);
			}
			document.querySelector("div").appendChild(ulElt);
			var solution = "La solution était : " + this.nombre ;
			this.insertionElement(solution);
		}
	},
};



// Execution

lancement.init(true, nombredOr);
