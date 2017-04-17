$(function(){
  console.log('jQuery is fuckin\' ready !');

  //on va chercher le contenu de la page de backup pour mettre à jour le contenu du main
  $('main').click(function(){
    console.log('pouf');
    $('main').load('fonction_load_backup.html', function(data){
      alert('le contenu de la maj est : ' + data);
    });
  });

});
