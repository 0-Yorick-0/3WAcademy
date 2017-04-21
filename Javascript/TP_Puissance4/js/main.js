/**
 * Created by wan2-11 on 20/04/17.
 */
console.log("it works !");

/*
 Définit un alias $ pour document.querySelector
 */
var $ = document.querySelector.bind(document);

var board = $('#board');
var dom_tab = [];
board.innerHTML = '';

var table = document.createElement('table');

for(var i = 0; i < 6; i++){
    var trElt = document.createElement('tr');
    dom_tab[i] = trElt;
    for(var j = 0; j < 7; j++){
        tdElt = document.createElement('td');
        trElt.appendChild(tdElt);
        dom_tab[i][j] = tdElt;
    }
    table.appendChild(trElt);
}

board.appendChild(table);
dom_tab[0][0].textContent = "0-0";
dom_tab[0][1].textContent = "0-1";
dom_tab[1][1].textContent = "1-1";