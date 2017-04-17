$(document).ready(function(){

  console.log('jQuery is fuckin\' ready');

  $('a.awake').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    return $.growl({ title: "Growl", message: "The kitten is awake!" });
  });

  $('a.attack').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    return $.growl.error({ title: "Growl", message: "The kitten is attacking!" });
  });

  $('a.cute').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    return $.growl.notice({ title: "Growl", message: "The kitten is cute!" });
  });

  $('a.ugly').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    return $.growl.warning({ title: "Growl", message: "The kitten is ugly!" });
  });









});
