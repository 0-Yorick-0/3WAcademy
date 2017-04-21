/**
 * Created by wan2-11 on 19/04/17.
 */

function slide(){
    setTimeout(function(){
        imgs[compteur].classList.toggle('hide');

        if(compteur == imgs.length - 1){
            imgs[0].classList.toggle('hide');
        }else{
            imgs[compteur+1].classList.toggle('hide');
        }
        compteur++;
        if(compteur == imgs.length){
            compteur = 0;
        }
        slide();
    },2000);
}
var compteur = 0;
var imgs = document.getElementsByTagName('img');

for(var i = 1; i < imgs.length; i++){
    imgs[i].classList.add('hide');
}



slide();
