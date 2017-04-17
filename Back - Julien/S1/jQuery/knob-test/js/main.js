$(document).ready(function(){

  console.log('jQuery is fuckin\' ready');


var color = 'orange';

  $('.dial#fontSize').knob({
    min: 0,
    max: 100,
    step: 2,
    width: '50',
    height: '50',
    displayPrevious: true,
    change: function(v){
      $('div textarea').css('font-size', v);
        if (v < 25) {
          $('.dial#fontSize').trigger(//faire appel à la méthode du plugin pour modifier la couleur
              'configure',
              {
                  "fgColor":"#FF0000"
              }
          );
        }else if(v >= 25 && v < 50){
          $('.dial#fontSize').trigger(
              'configure',
              {
                  "fgColor":"green"
              }
          );
        }
      },
    format: function(v){
      return v + '%';
    },
    fgColor : color,
    thickness: '.3',
    inputColor: 'white',
  });

  $('input#progressBar').knob({
    min: 0,
    max: 100,
    step: 1,
    width: '50',
    height: '50',
    format: function(v){
      return v + '%';
    },
    change: function(v){
        if (v < 25) {
          $('.dial#fontSize').trigger(//faire appel à la méthode du plugin pour modifier la couleur
              'configure',
              {
                  "fgColor":"#FF0000"
              }
          );
        }else if(v >= 25 && v < 50){
          $('.dial#fontSize').trigger(
              'configure',
              {
                  "fgColor":"green"
              }
          );
        }
      },
    thickness: '.1',
    fgColor: color,
    inputColor: 'white',
  });



  $('textarea#bio').keyup(function(){
    var bioLength = $(this).val().length;
    $('input#progressBar').prop('value', bioLength/2);
    $('input#progressBar').val(bioLength/2).trigger('change');
  });










});
