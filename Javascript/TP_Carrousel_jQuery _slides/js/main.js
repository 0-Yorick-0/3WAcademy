"use strict";
$(function(){
    console.log('jQuery is fuckin\' ready!');

    var $slides = $("#slider #container img");
    var $activeSlide = $slides.eq(0);
    var $pagination = $("#pagination");
    var nbSlides = $slides.length;
    var onProcess = false;
    var activeSlideIndex = 0;
    var $slideToShow;
    //Mise en place de l'autoplay
    var autoPlay = false;
    var interval;

    //définition dynamique de la largeur de la div qui va contenir toutes les images
    var $container = $('#slider #container');
    var largeur = 600*nbSlides;
    $container.css('width', largeur + 'px');

    //génération des span qui vont contenir les pastilles de pagination
    var html = "";
    for(let i = 0; i < $slides.length; i++){
      html += "<span></span>";
    }
    $pagination.html(html);

    var $pages = $("#pagination span");

    function updatePagination(){
        if(activeSlideIndex == nbSlides){
            activeSlideIndex = 0;
        }else if(activeSlideIndex < 0){
            activeSlideIndex = nbSlides - 1;
        }
        $pages.removeClass('active');
        $pages.eq(activeSlideIndex).addClass('active');
    }

    updatePagination();

    function goToSlide(direction){
        if(!onProcess){
            onProcess = true;
            switch(direction){
                case '+':
                    if($activeSlide.index() == 0){
                        $slideToShow = $activeSlide.siblings().last();
                        $container.css('left', '-600px');
                        $activeSlide.before($slideToShow);
                    }else{
                        $slideToShow = $activeSlide.prev();
                    }
                    $container.animate({
                        left: direction + '=600px'
                    }, 1000, function(){
                        onProcess = false;
                        //Maj de l'image active
                        $activeSlide = $slideToShow;
                        activeSlideIndex--;
                        //Maj de la pagination, afin d'avoir le bon bouton 'active'
                        updatePagination();
                    });
                    break;
                case'-':
                    $slideToShow = $activeSlide.next();
                    $container.animate({
                        left: direction + '=600px'
                    }, 1000, function(){
                        onProcess = false;
                        if($slideToShow.is(':last-child')){
                            $slideToShow.after($slideToShow.siblings());
                            $container.css('left', 0);
                        }
                        $activeSlide = $slideToShow;
                        activeSlideIndex++;
                        updatePagination();
                    });
                    break;
            }
        }
    }

    function goToNextSlide() {
        goToSlide('-');
    }

    function goToPrevSlide() {
        goToSlide('+');
    }

    function play(){
        autoPlay = true;
        interval = setInterval(goToNextSlide, 2000);
    }

    function stop(){
        autoPlay = false;
        clearInterval(interval);
    }

    $('#pagination span').click(function(){
        console.log($activeSlide.index());
        console.log($(this).index());

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
        goToNextSlide();
    });

    $('.fa-backward').click(function(){
        goToPrevSlide();
    });

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
                goToPrevSlide();
                break;
            case 39:
                goToNextSlide();
                break;
            case 32:
                $('#controls #play').click();
                break;
        }
    });

});