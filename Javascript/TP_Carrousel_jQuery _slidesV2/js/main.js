"use strict";
$(function(){
    console.log('jQuery is fuckin\' ready!');

    var $slides = $("#slider #container img");
    var $activeSlide = $slides.eq(0);
    var $pagination = $("#pagination");
    var nbSlides = $slides.length;
    var onProcess = false;
    var targetIndex;

    //Mise en place de l'autoplay
    var autoPlay = false;
    var interval;

    var $container = $('#slider #container');
    //définition dynamique de la largeur de la div qui va contenir toutes les images
    function setContainerWidth(container){
        var imgWidth = $activeSlide.css('width').replace('px', '');
        var widthContainer = (imgWidth * nbSlides);
        container.css('width', widthContainer + 'px');
    }

    setContainerWidth($container);

    //génération des span qui vont contenir les pastilles de pagination
    var html = "";
    for(let i = 0; i < $slides.length; i++){
      html += "<span id=" + i + "'></span>";
    }
    $pagination.html(html);

    var $pages = $("#pagination span");

    function updatePagination(index){
        $pages.removeClass('active');
        //l'index récupéré est celui de la slide à montrer
        $pages.eq(index).addClass('active');
    }

    updatePagination(0);


    function goToSlide(targetIndex){
        if(!onProcess){
            onProcess = true;
            //$slides.eq(targetIndex) = récupération de la slide dans la collection initiale
            //.index() nous donne sa position relative dans le DOM
            var indexSlideToShow = $slides.eq(targetIndex).index();
            //on fixe l'index de la slide active par rapport à sa position relative dans le DOM
            var indexActiveSlide = $activeSlide.index();
            var delta = indexActiveSlide - indexSlideToShow;

            var translation = delta * 600;
            //activeSlide est définie par rapport à la collection initiale, donc de manière absolue
            $activeSlide = $slides.eq(targetIndex);

            var direction = (translation < 0)? '-' : '+';

            $container.animate({
                left: direction + '=' + Math.abs(translation) + 'px'//4
            }, 600, 'linear', function(){
                onProcess = false;

                //Maj de l'image active
                updatePagination(targetIndex);
            });
        }
    }

    $pages.click(function(){
        //targetIndex est déclaré par rapport à la position de la span cliquée, donc du slide dans la collection initiale
        targetIndex = $(this).index();
        goToSlide(targetIndex);
    });

    $('#controls .fa-play').click(function(){
        if(!autoPlay){
            play();
            $(this).toggleClass('fa-play fa-stop');
        }else{
            stop();
            $(this).toggleClass('fa-play fa-stop');
        }
    });

    $('.fa-forward').click(function(){

        if($activeSlide.is(':last-child') && !onProcess){
            $container.css('left', '0px');
            $activeSlide.after($activeSlide.siblings());
        }
        targetIndex = $slides.index($activeSlide.next());

        goToSlide(targetIndex);
    });

    $('.fa-backward').click(function(){
        var rewind = -(nbSlides - 1) * 600;
        if($activeSlide.is(':first-child') && !onProcess) {
            $activeSlide.before($activeSlide.siblings());
            $container.css('left', rewind + 'px');
        }
            targetIndex = $slides.index($activeSlide.prev());
        goToSlide(targetIndex);
    });

    function play(){
        autoPlay = true;

        interval = setInterval(function(){
            $('.fa-forward').click();
        }, 2000);
    }

    function stop(){
        autoPlay = false;
        clearInterval(interval);
    }

    $("#slider").mouseover(function(){
        if(autoPlay){
            stop();
            autoPlay = true;
        }
    });

    $("#slider").mouseleave(function(){
        if(autoPlay){
            play();
        }
    });

    $(document).keydown(function(e){
        switch(e.keyCode){
            case 37:
                $('.fa-backward').click();
                break;
            case 39:
                $('.fa-forward').click();
                break;
            case 32:
                $('#controls #play').click();
                break;
        }
    });

});