/**
 * Created by wan2-11 on 18/04/17.
 */

if(window.confirm("Voulez-vous jouer?")){
    var question1 = {
        question : "Quel est le prénom de Dieu",
        reponse : "Chuck Norris"
    }
    var question2 = {
        question : "Guillaume a-t-il une dignité ?",
        reponse : ["non", "vraiment pas", "carrément pas"]
    }
    var question3 = {
        question : "A quoi reconnaît-on les cons ?",
        reponse : "Ils osent tout"
    }

    var datas = [question1, question2, question3];

    var score = 0;
    var playerAnswer;

    datas.forEach(function(question){
        do{
            playerAnswer = prompt(question.question);
            playerAnswer = playerAnswer.trim();
        }while(playerAnswer == "");


        if(!Array.isArray(question.reponse)){
            if(playerAnswer.toLowerCase() == question.reponse.toLowerCase()) {
                score++;
            }else{
                alert("La bonne réponse était : " + question.reponse);
            }
        }else {
            if (question.reponse.indexOf(playerAnswer.toLowerCase()) !== -1) {
                score++;
            }else{
                alert("La bonne réponse était : " + question.reponse.join(" ou "));
            }
        }
    });

    var divElt = document.getElementById('score');
    var pElt = document.createElement("p");
    pElt.textContent = "Votre score est : " + score + "/3";
    divElt.appendChild(pElt);

}else{
    alert("Bah écoutes....vas donc parler avec Célia");
}




