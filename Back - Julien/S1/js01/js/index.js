// var text = prompt('Si les ricains n\'étaient pas là');



// alert(text); //alert permet d'afficher une boite de dialogue

console.log('Bienvenue dans la console');

var message = 'Js is so funny';
console.log(message);

var nom = 'Ferlin';
var prenom = 'Yorick';
var age = 31;
var ville = 'Lyon';

console.log("Mon nom est " + prenom + " " + nom + " , j'ai "+ age +" ans et j'habite à "+ ville + ".");

var truth ='Sublime Text c\'est la vie';
console.log(truth);

truth = 'Atom c\'est le doute';
console.log(truth);

ville = 'Paris';

age = 32;

console.log("Mon nom est " + prenom + " " + nom + " , j'ai "+ age +" ans et j'habite à "+ ville + ".");

// Modification de l'age
age = age + 2;
age += 2;
age -= 2;
age *= 2;
age /= 2;

// age = age + " ans";
console.log(age);

if (age >= 18) {
	console.log('Bienvenue');
}

// Vanner Guillaume
var imageNon = document.createElement("img");
imageNon.setAttribute("src", "http://media.gettyimages.com/photos/businessman-leaning-forward-resting-face-against-wall-side-view-picture-id200397972-001?s=170667a");

var imageOui = document.createElement("img");
imageOui.setAttribute("src", "data:image/jpeg;base64,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");

var pEltOui = document.createElement("p");
pEltOui.textContent = "Bravo, il a enfin installé Sublime Text";

var pEltNon = document.createElement("p");
pEltNon.textContent = "Il devrait installer Sublime Text";

var pElt = document.createElement("p");
pElt.textContent = "Ne nous voilons pas la face s'il vous plaît";


var question = prompt('Guillaume a-t-il une vision claire et large du code ?');

if (question === "non") {
	document.body.appendChild(imageNon);
	document.body.appendChild(pEltNon);
}else if(question === "oui") {
	document.body.appendChild(imageOui);
	document.body.appendChild(pEltOui);
} else {
	document.body.appendChild(pElt);
}


/*var noteBac = prompt('Quelle est votre note ?');

if (noteBac == 0) {
	console.log("Vous êtes une buse");
} else if (noteBac > 0 && noteBac <= 11){
	console.log("Pas de mention");
} else if (noteBac > 11 && noteBac <= 14){
	console.log("Assez Bien");
} else if (noteBac > 14 && noteBac <= 16){
	console.log("Bien");
} else if (noteBac > 16 && noteBac <= 18){
	console.log("Très Bien");
} else if (noteBac > 18 && noteBac <= 20){
	console.log("Excellent");
} else {
	console.log("Merci de rentrer une valeur valide");
}*/

document.addEventListener("keydown", function (e) {
	console.log(e.keyCode);
})