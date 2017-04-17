$(document).ready(function(){
  console.log('jQuery is fuckin\' ready !');

  $('button').click(function(){
    $.sweetModal({
    title : 'I\'m your father, Luke',
    theme : $.sweetModal.THEME_DARK
    })
  });

  $(window).unload(function(){
    return 'what?!';
  });

});
