/**
 * Created by wan2-11 on 18/04/17.
 */

    var question1 = {
        question : "Quel est le prénom de Dieu",
        reponse : ["chuck norris", "yorick"]
    }
    var question2 = {
        question : "Guillaume a-t-il une dignité ?",
        reponse : ["non", "vraiment pas", "carrément pas"]
    }
    var question3 = {
        question : "A quoi reconnaît-on les cons ?",
        reponse : ["ils osent tout"]
    }

    var datas = [question1, question2, question3];

    //fonctions
    function afficherResultat(param){
        if(param){
            displayAnswer.style.display = "block";
            displayAnswer.classList.remove("panel-danger");
            displayAnswer.classList.add("panel-success");
            displayAnswer.childNodes[1].textContent = "Bonne réponse";
            displayAnswer.childNodes[3].textContent = "Quel talent !";
        }else{
            displayAnswer.style.display = "block";
            displayAnswer.classList.remove("panel-success");
            displayAnswer.classList.add("panel-danger");
            displayAnswer.childNodes[1].textContent = "Mauvaise réponse";
            displayAnswer.childNodes[3].textContent = "La bonne réponse était : " + datas[compteur].reponse.join(" ou ");
        }
    }

    //initialisation des variables
    var score = 0;
    var compteur = 0;
    var playerAnswer;
    var questionElt = document.getElementById('question');
    var pElt = document.querySelector("#score p");
    var validateButton = document.getElementById("valider");
    var replayButton = document.getElementById("rejouer");
    var displayAnswer = document.getElementById('displayAnswer');

    //on insère la question
    questionElt.textContent = datas[compteur].question;

    //on cache le bouton Rejouer
    replayButton.style.display = "none";

    //on cache le block réponse
    displayAnswer.style.display = "none";

    var form = document.querySelector('form');

    form.addEventListener("submit", function(e){

        playerAnswer = form.elements.reponse.value;

        form.elements.reponse.value = '';

        if (datas[compteur].reponse.indexOf(playerAnswer.toLowerCase()) !== -1) {
            afficherResultat(true);
            score++;
        } else {
            afficherResultat(false);
        }

        compteur++;

        if(compteur < datas.length){
            questionElt.textContent = datas[compteur].question;
        }else{
            validateButton.style.display = "none";
            replayButton.style.display = "block";
            replayButton.addEventListener("click", function(){
                validateButton.style.display = "block";
                replayButton.style.display = "none";

                compteur = 0;
                score = 0;

                questionElt.textContent = datas[compteur].question;
                displayAnswer.style.display = "none";
            });
        }

        //on met à jour le score
        pElt.textContent = "";
        pElt.textContent = "Votre score est : " + score + "/3";

        e.preventDefault();
    });








