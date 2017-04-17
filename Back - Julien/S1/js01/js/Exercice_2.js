/**
* Exercice 2: Sommes des notes

* Créer 8 notes comprises entre 0 et 20 et qui seront générées aléatoirement (http://www.w3schools.com/jsref/jsref_random.asp)
* Afficher ces 8 notes dans la console 
* Ajouter 2 points pour chacune des notes et réafficher ces notes 
* Afficher un message d'erreur si l'une des notes n'est pas un chiffre qui soit compris en 0 et 20 
* Jeter une Exception si l'une des notes est égale à 0 ou à 20 (OU ||)
* Compter le nombre de notes qui soit supérieur à 10 et afficher le nombre de noté supérieur à 10  
* Afficher la moyenne de ces 8 notes dans une phrase en console
* Modifier le programme pour demander ces 8 notes à l'utilisateur avec la fonction prompt() 

-----------------------------------------------------------------------------


* Bonus 2 : Stocker ces 8 notes dans un tableau
* Bonus 3: Afficher la note la plus petite et la note la plus grande
*/

var Notes = []; //création du tableau qui va contenir les notes

for (var i = 0; i < 8; i++) { //on boucle la création de valeur et le rangement dasn le tableau
	var note = parseInt(prompt("Veuillez rentrer une note comprise entre 0 et 20"));
	Notes[i] = note;
}
console.log(Notes);


// for (var i = 0; i < 8; i++) {
// 	Notes[i] = Math.floor((Math.random() * 21));
// 	console.log(Notes[i]);
// }

var NotesPlusDeux = Notes.map(function (note){ //on boucle le changement des variables du tableau dans un nouveau tableau
	var nouvelleNote = note + 2;
	if (nouvelleNote > 20) {
		console.log("Nouvelle note : " + nouvelleNote);
		alert("Une note ne peut être supérieure à 20. La note vaut " + nouvelleNote);
	} else if(nouvelleNote == 0 || nouvelleNote == 20){
		throw "La note vaut" + nouvelleNote;
	} else {
		console.log("Nouvelle note : " + nouvelleNote);
	}
	return nouvelleNote;
});


var compteur = 0;
Notes.forEach(function (note){
	if (note > 10) {
		compteur++;
	}
});
console.log("Le nombre de notes supérieures à 10 est : " + compteur);

var somme = 0;
Notes.forEach(function (note){
	somme += note;
});

var moyenne = somme/8;
console.log("La moyenne des notes est de : " + moyenne);


var NotePlusGrande = NotesPlusDeux[0];
var NotePlusPetite = NotesPlusDeux[0];

NotesPlusDeux.forEach(function (note){
	if (note > NotePlusGrande) {
		NotePlusGrande = note;
	}
	if (note < NotePlusPetite) {
		NotePlusPetite = note;
	}
});
console.log("La note la plus grande est : " + NotePlusGrande);
console.log("La note la plus petite est : " + NotePlusPetite);
