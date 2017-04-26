var link;

function getSiblings(elt){
    var siblings = [];
    var parent = elt.parentNode;

    for(let child of parent.childNodes){
        //nodeType == 1 pour un élément réel du DOM (pas d'espace)
        if(child !== elt && child.nodeType == 1){
            siblings.push(child);
        }
    }
    return siblings;
}

function updateContent(url, id){
    var xhr = new XMLHttpRequest();

    xhr.open("GET", url, true);

    xhr.send(null);

    xhr.onload = function(){
        var htmlContent = xhr.responseText;
        var divElt = document.getElementById(id);
        divElt.innerHTML = htmlContent;
    }
}

var liens = document.querySelectorAll('a.list-group-item');


for(let lien of liens){
    lien.addEventListener("click", function (e) {
        e.preventDefault();
        //retrait de la classe active pour les autres liens
        for(let sibling of getSiblings(this)){
            sibling.classList.remove('active');
        }
        //ajout de la classe active pour ce lien
        this.classList.add('active');
        //récupération du contenu textuel et ajout de ".html"
        link = this.getAttribute('href');
        updateContent(link, 'corps');
        link = link.replace('pages/', '').replace('.html', '');
        //ajout de l'ancre dans l'url
        window.location.hash = link;
    });
}

window.addEventListener("load", function(){
    var ancre = window.location.hash;
    if(ancre !== ''){
        ancre = ancre.replace('#', '');

        link = 'pages/' + ancre + '.html';

        var aElt = document.querySelector('a[href="' + link + '"]');
        aElt.click();
    }
});