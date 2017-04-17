$(document).ready(function(){

    console.log('good');
    $.scrollify({
      section : '.section',
      scrollbars : false,
      easing: "easeOutExpo",
      interstitialSection : "footer, header",
      offset : 0,
    });



      $('.dial#fontSize').knob({
        min: 0,
        max: 100,
        step: 2,
        width: '50',
        height: '50',
        displayPrevious: true,
        change: function(v){
          $('div textarea').css('font-size', v);
        },
        format: function(v){
          return v + '%';
        },

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
              $('input#progressBar').trigger(//faire appel à la méthode du plugin pour modifier la couleur
                  'configure',
                  {
                    "fgColor":"#FF0000"
                  }
              );
            }else if(v >= 25 && v < 50){
              $('input#progressBar').trigger(
                  'configure',
                  {
                      "fgColor":"green"
                  }
              );
            }
          },
        thickness: '.1',
        inputColor: 'white',
      });



      $('textarea#bio').keyup(function(){
        var bioLength = $(this).val().length;
        $('input#progressBar').prop('value', bioLength/2);
        $('input#progressBar').val(bioLength/2).trigger('change');
      });


  $('button#alert').click(function(){
    $.sweetModal({
    	content: 'This is a success.',
    	icon: $.sweetModal.ICON_SUCCESS,
    });
  });

  $('button#confirm').click(function(){
    $.sweetModal.confirm('Titled Confirm', 'Confirm please?', function() {
    	$.sweetModal('Thanks for confirming!');
    }, function() {
    	$.sweetModal('You declined. That\'s okay!');
    });
  });

  $('button#youtube').click(function(){
      $.sweetModal({
    	title: 'This guy is stupid..but fun...but stupid',
    	content: 'https://www.youtube.com/watch?v=l7r4WoDFymU',
    	theme: $.sweetModal.THEME_DARK
    });
  });

  new WOW().init();






});
