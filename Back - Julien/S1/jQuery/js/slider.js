$('document').ready(function(){
  console.log('jQuery is fuckin\' ready !');

  $('body').css('background-color', 'black');

  $('img').mouseover(function(){
    $(this).css('opacity', '0.6');
    $('h1').append('<br />' + $(this).attr('alt'));
  });

  $('img').mouseleave(function(){
    $(this).css('opacity', '1');
    $('h1').text().replace('gros', '');
  });













});
