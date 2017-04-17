$(function(){

  console.log('jQuery is fuckin\' ready');

  $('#addPost').click(function(){
    console.log('click');
    console.log($('input#titre').val());
    console.log($('option[name=auteur]').val());
    console.log($('textarea#contenu').val());
    console.log($('input[name=categorie]:checked').val());
    $.post(
      'admin.php', //page cible côté serveur
      {
        titre : $('input#titre').val(),
        auteur : $('option[name=auteur]').val(),
        contenu : $('textarea#contenu').val(),
        categorie : $('input[name=categorie]:checked').val()
      },
      function(data){
        if (data) {
          alert('Formulaire envoyé : ' + data);//on récupère les données renvoyées par le serveur
        }else{
          alert('ça a foiré :/')
        }
      },
      'text'
    );
  });



});
