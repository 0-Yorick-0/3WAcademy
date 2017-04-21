"use strict";
$(function(){
    console.log('jQuery is fuckin\' ready!');

    var $slides = $("#slider img");
    var $activeSlide = $slides.eq(0);
    var $pagination = $("#pagination");
    var nbSlides = $slides.length;
    var onProcess = false;

    var html = "";
    for(var i = 0; i < $slides.length; i++){
      html += "<span></span>";
    }
    $pagination.html(html);
    var $pages = $("#pagination span");

    function getRandomIntInclusive(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min +1)) + min;
    }

    function updatePagination(){
        //on récupère l'index de l'image active
        var activeSlideIndex = $activeSlide.index();
        $pages.removeClass('active');
        $pages.eq(activeSlideIndex).addClass('active');
    }

    updatePagination();

    function goToSlide(indexSlideToShow){
        if(!onProcess){
            //correspond à l'image qu'on souhaite afficher (grâce au param indexSlideToShow)
            var $slideToShow = $slides.eq(indexSlideToShow);
            onProcess = true;
            $activeSlide.fadeOut(1000, function(){
                onProcess = false;
            });
            $slideToShow.fadeIn(1000);
            //Maj de l'image active
            $activeSlide = $slideToShow;
            //Maj de la pagination, afin d'avoir le bon bouton 'active'
            updatePagination();
        }
    }

    function goToNextSlide() {
        if($activeSlide.index() < nbSlides - 1){
            goToSlide($activeSlide.index() + 1);
        }else{
            goToSlide(0);
        }
    }

    function goToPrevSlide() {
        if($activeSlide.index() == 0){
            goToSlide(nbSlides - 1);
        }else{
            goToSlide($activeSlide.index() - 1);
        }
    }

    function goToRandSlide(){
        do{
            var indexSlideToShow = getRandomIntInclusive(0,nbSlides);
            goToSlide(indexSlideToShow);
        }while(indexSlideToShow !== $activeSlide.index());
    }

    $('.fa-backward').click(function(){
        goToPrevSlide();
    });

    $(document).keydown(function(e){
        if(e.keyCode === 37){
            goToPrevSlide();
        }
    });

    $('.fa-forward').click(function(){
        goToNextSlide();
    });

    $(document).keydown(function(e){
        if(e.keyCode === 39){
            goToNextSlide();
        }
        if(e.keyCode == 32){
            switch (autoPlay){
            case true:
                stop();
                $('#controls .fa-stop').toggleClass('fa-play fa-stop');
                break;
            case false:
                play();
                $('#controls .fa-play').toggleClass('fa-play fa-stop');
                break;
            }
        }
    });

    $('.fa-random').click(function(){
        goToRandSlide();
    });

    $('#pagination span').click(function(){
       goToSlide($(this).index());
    });

    //Mise en place de l'autoplay
    var autoPlay = false;
    var interval;

    function play(){
        autoPlay = true;
        interval = setInterval(goToNextSlide, 2000);
    }

    function stop(){
        autoPlay = false;
        clearInterval(interval);
    }

    $('#controls .fa-play').click(function(){
       if(!autoPlay){
           play();
           $(this).toggleClass('fa-play fa-stop');
       }else{
           stop();
           $(this).toggleClass('fa-play fa-stop');
       }
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


});