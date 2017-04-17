$(document).ready(function(){
  console.log('jQuery is fuckin\' ready !');

  $('[data-toggle="popover"]').popover({
    animation: true,
    delay: {'show': 500, 'hide': 100},
    trigger: 'click',
  });


  $(function () {//tooltip
    $('[data-toggle="tooltip"]').tooltip({
      animation: true,
      html: true,
    });
  })


  $('ul.nav-pills a').click(function (e) {
    e.preventDefault(); //empêche le comportement par défaut et supprime donc l'ancre dans l'URL
    $(this).tab('show');//montre la bonne tabulation
  })




});
