$(function(){
  console.log('jQuery is fuckin\' ready !');

  //on va chercher le contenu de la page de backup pour mettre à jour le contenu du main
  $('#subSearch').click(function(e){
    e.preventDefault();
    var search = $('input#search').val().toUpperCase();
    console.log(search);
    if (search == 'POO') {
      $('main').load('fonction_load_backup.html #article3');
    }else if (search == 'HTML') {
        $('main').load('fonction_load_backup.html #article1');
    }else if (search == 'PHP') {
        $('main').load('fonction_load_backup.html #article2');
    }else{
      $('main').text('Pas d\'article correspondant');
    }
  });

});
