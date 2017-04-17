// Commencer en jQuery

$(document).ready(function(){//Quand le doc html et sa DOM sont prêts
  console.log("jQuery est prêt");

  //Les sélécteurs

  //Je séléctionne tous les h3 et je change la couleur en orange
  $('h3').css('color', 'orange');

  //$('button') est un sélécteur qui séléctionne les bouttons
  $('buttonmodifH3').click(function()
  {
    $('h3#title').css('color', 'blue');
  });


  //modifier la couleur et la font-size des paragraphes
  $('button#modifP').click(function(){
    //version longue
    //$('p').css('color', 'green').css('font-size', '23px');
    //version raccourcie
    $('p').css({
      'color': 'green',
      'font-size': '23px',
    });
    $('h3').fadeOut();//permet la disparition progressive de l'élément
  });

  //révélation de la div
  $('button.btn').click(function(){
    $('div#monImage').slideToggle(2000).find('img').css('width', '30%');
  });

  $('div#monImage img').mouseover(function(){
    $('div#monImage p').slideDown(1000);
  });

  $('div#monImage img').mouseout(function(){
    $('div#monImage p').slideUp(1000);
  });

});
