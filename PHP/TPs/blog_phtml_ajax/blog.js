$(document).ready(function({

  console.log('jQuery is fuckin\' ready');

  $('addPost').click(function(
    $.post({
      'admin.php', //page cible côté serveur
      {
        titre : $('input#titre').val(),
        auteur : $('input#auteur').val(),
        contenu : $('input#contenu').val(),
        categorie : $('input[name=categorie]:checked', 'formAddPost').val()
      },
      function(data){
        if (data == 'Success') {
          alert('Formulaire envoyé');
        }else{
          alert('ça a foiré :/')
        }
      },
      'text'
    });
  ));



}));
