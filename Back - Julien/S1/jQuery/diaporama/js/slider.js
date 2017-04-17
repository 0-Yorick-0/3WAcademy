$('document').ready(function(){
  console.log('jQuery is fuckin\' ready !');

  new WOW().init(); //init du plug in WOW


  $('div#caroussel').slick({//slick
    arrows: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    dots: true,
    infinite: true,
    speed: 500,
    cssEase: 'linear'
  });

  $('.fancybox-thumb').fancybox({//plug-in fancyBox
		prevEffect	: 'none',
		nextEffect	: 'none',
    maxWidth	: 800,
    maxHeight	: 600,
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});

  $('div#firstLine').isotope({//plug isotope
    itemSelector: '.col-md-5',
    layoutMode: 'fitRows',
  });

  $('ul.nav li a').click(function(){
    var filterValue = $(this).attr('data-filter');
    if(filterValue == '*'){
      var filtre = '*';
    }else{
      var filtre = '[data-category = ' + filterValue + ']';
    }
    $('div#firstLine').isotope({
      filter : filtre
    });
  });


  var h1 = $('h1').text();
  console.log(h1);


  $('div.col-md-5').hover(
    function(){ // la fonction hover permet d'insérer une condition, avec 2 fonctions
    $(this).css('opacity', '0.6');
    var alt = $(this).find('img').attr('alt');
    $('p#alt').text(alt).addClass('alt').fadeIn();

    // $('h1').html($('h1').text() + '<br />' + $(this).find('img').attr('alt'));

    $(this).toggleClass('zoom');
  }, function(){
      $(this).css('opacity', '1');
      $(this).toggleClass('zoom');
      $('p#alt').fadeOut();
      // $('h1').text(h1);
    }
  );

  $('button').click(function(){
    var titreImg = $('input#titreImg').val();
    var imgUrl = $('input#imgUrl').val();

    var divElt = $('<div></div>').addClass('col-md-5');

    $('div#firstLine').append(divElt);

    var imgElt = $('<img />').attr({
      'src': imgUrl,
      'alt': titreImg,
    });

    divElt.append(imgElt);
  });









});
