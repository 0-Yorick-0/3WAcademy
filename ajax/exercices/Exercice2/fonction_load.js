$(function(){
  console.log('jQuery is fuckin\' ready !');

  $('button#button1').click(function(){
    if ($('article#artRec1').html() == '') {
      console.log('coucou');
      $('article#artRec1').load('fonction_load_backup.html #article1', function(data){
        $('button#modalBS').trigger('click');
        $('div.modal-body').html(data);
      });
    }else{
      $('article#artRec1').toggle('slow');
    }
  });

  $('button#button2').click(function(){
    if ($('article#artRec2').html() == '') {
      console.log('coucou2');
      $('article#artRec2').load('fonction_load_backup.html #article2');
    }else{
      $('article#artRec2').toggle('slow');
    }
  });



});
