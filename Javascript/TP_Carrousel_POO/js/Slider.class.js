/**** Cr�ation de l'objet Slider ****/

// Lien utile: https://developer.mozilla.org/fr/docs/Web/JavaScript/Introduction_%C3%A0_JavaScript_orient%C3%A9_objet

// Etape 1: Cr�er la focntion constructeur Slider prenant en param�tre un objet jQuery qui sera une div contenant des images (donc notre div "slider1" ou "slider2")
function Slider(slider){
    // - slider : contient l'objet jQuery du slider (div "slider1" ou "slider2") transmis par le param�tre de la fonction constructeur Slider
    this.slider = slider;
	// - slides : contient toutes les images du slider
    this.slides = slider.children();
	// - nbSlides : contient le nombre total de slides
    this.nbSlides = this.slides.length;
	// - currentSlide : contient l'image courante (par d�faut il s'agit de la premi�re)
    // this.currentSlide = this.slides.eq(0);
    this.currentSlide = this.slides.eq(localStorage.getItem("slide" + this.slider.attr('id')) || 0);
	//indexSlideToShow: contient l'index de la slide suivante
	this.indexSlideToShow;
    // - isActive : variable t�moin servant � d�finir si le slider est en lecture automatique ou non.
    this.isActive = false;
    // - onProcess : sert de témoin indiquant si un changement de slide est déjà en cours
	this.onProcess = false;
	// - timer : contiendra l'interval qui devra d�clencher la m�thode "gotoNextSlide" toutes les 2 secondes
    this.timer;
    // // IMPORTANT: les propri�t�s ci-dessous seront toutes intialement vides et d�finies ult�rieurement lors de la phase d'initialisation de l'objet Slider
    //
    // - controls : contiendra un objet jQuery contenant les �l�ments d'interagir avec le slider (boutons pr�c�dent, play, suivant, al�atoire
    // ainsi que le conteneur de pagination).
	this.controls;
	// NB: Cette propri�t� sera initialement vide et d�finit par la suite.
    //
	// - pages : contiendra une collection d'objet jQuery relative aux  �l�ments span situ�s dans la div .pagination
    this.pages;
	// - prevButton : bouton image pr�c�dante
    this.prevButton;
	// - nextButton : bouton image suivante
    this.nextButton;
	// - playButton : bouton play
    this.playButton;
	// - randomButton : bouton image al�atoire
    this.randomButton;

    this.init();

}
/*
	
	-> Un prototype contenant XX m�thodes:

			
	- generateControls : Aura pour r�le de d�finir la propri�t� "controls" contenant les �l�ments de contr�le du slider (boutons pr�c�dent, play, suivant, al�atoire 
	ainsi que le conteneur de pagination (vide dans un premier temps) d�finit dans cet objet jQuery: 
	*/
Slider.prototype.generateControls = function(){
    var controls = $('<div class="control">\
		<div class="pagination"></div>\
			<button class="prev"><i class="fa fa-backward"></i></button>\
			<button class="play"><i class="fa fa-play"></i></button>\
			<button class="next"><i class="fa fa-forward"></i></button>\
			<button class="random" title="Sélectionner une image aléatoire"><i class="fa fa-random"></i></button>\
		</div>\
		');
    this.controls = controls;
    // Une fois l'objet jQuery ci-dessus stock� dans la propri�t� "controls" de l'objet Slider, faire appara�tre son contenu juste en dessous du slider.
    //     Astuce: http://api.jquery.com/after
    this.slider.after(this.controls);
};

	// - generatePagination: Aura pour r�le de g�n�rer dynamiquement la pagnation en fonction du nombre de slide.
	// 1) Le code html � g�n�rer est celui-ci: <span class="active">1</span><span>2</span><span>3</span><span>4</span>
	// 	2) Il devra ensuite �tre ins�rer dans la div ayant la class "pagination".
	// 3) Une fois affich�s il faudra mettre � jour la propri�t� pages.

Slider.prototype.generatePagination = function(){
    var html = "";
    for(var i = 1; i < this.nbSlides + 1; i++){
        html += "<span>" + i + "</span>";
    }
    this.controls.find('div.pagination').html(html);
    this.pages = this.controls.find('div.pagination span');
};

	// - updatePagination : Sert � affecter la classe active sur l'�l�ment de pagination correspondant � la slide visible
	// // Si par exemple la slide 2 est visible alors on applique la classe active sur le 2�me �l�ment de pagination
	// Astuce: http://api.jquery.com/index/

Slider.prototype.updatePagination = function(){
	this.pages.removeClass('active');
	this.pages.eq(this.currentSlide.index()).addClass('active');
};

	// - gotoSlide : Prend en param�tre l'index de la slide a afficher. (0 = slide num�ro une, 1 = slide num�ro 2 etc.). Il faudra aussi m�moriser cette valeur dans le navigateur grace � la propri�t� localStorage de l'objet window (https://developer.mozilla.org/en-US/docs/Web/API/Storage/LocalStorage)
Slider.prototype.gotoSlide= function(indexSlideToShow){
	if(!this.onProcess){
		this.onProcess = true;
        if(this.currentSlide.index() !== indexSlideToShow){
            this.indexSlideToShow = indexSlideToShow;
            var $slideToShow = this.slides.eq(indexSlideToShow);
            this.currentSlide.fadeOut(700, function(){
                this.onProcess = false;
            }.bind(this));
            $slideToShow.fadeIn(700);
            this.currentSlide = $slideToShow;
            localStorage.setItem("slide" + this.slider.attr('id'), this.currentSlide.index());
            this.updatePagination();
		}else{
        	this.onProcess = false;
		}
	}
};
	// - gotoNextSlide : Servira � afficher la slide suivante
Slider.prototype.gotoNextSlide = function(){
	if(this.currentSlide.is(':last-child')){
		this.indexSlideToShow = 0;
	}else{
        this.indexSlideToShow = this.currentSlide.next().index();
	}
	this.gotoSlide(this.indexSlideToShow);
};
	// - gotoPrevSlide : Servira � afficher la slide précédente
Slider.prototype.gotoPrevSlide = function(){
	if(this.currentSlide.is(':first-child')){
		this.indexSlideToShow = this.slides.last().index();
	}else{
        this.indexSlideToShow = this.currentSlide.prev().index();
	}
    this.gotoSlide(this.indexSlideToShow);
};
	// - clickOnPage : Se d�clenche quand on clique sur un �l�ment de pagination. Cette m�thode prend en param�tre l'�venement (event) et nous permettra de r�cup�rer l'index de l'�l�ment de pagination cliqu� et ainsi afficher l'image correspondante
	// Astuce: http://api.jquery.com/event.target/
Slider.prototype.clickOnPage = function(e){
    this.indexSlideToShow = $(e.target).index();
    console.log(this.indexSlideToShow)
	this.gotoSlide(this.indexSlideToShow);
};
	// - autoPlay : Se d�clenche quand on clique sur le bouton PLAY
Slider.prototype.autoplay = function(e){
    if(!this.isActive){
        this.play();
        this.playButton.toggleClass('fa-play fa-stop');
    }else{
        this.stop();
        this.playButton.toggleClass('fa-play fa-stop');
    }
};
	//- play : Sert � lancer la lecture automatique du slider
Slider.prototype.play = function(){
    this.isActive = true;
    this.timer = setInterval(this.gotoNextSlide.bind(this), 2000);
};
	//- stop : Sert � mettre sur pause la lecture automatique du slider
Slider.prototype.stop = function(){
    this.isActive = false;
    this.timer = clearInterval(this.timer);
};
	//- onMouseOver : Si la lecture automatique du slider est en cours alors on la met sur pause lorsque que le slider est survol�.
Slider.prototype.onMouseOver = function(){
	if(this.isActive){
		this.stop();
		this.isActive = true;
	}
};
	//- onMouseLeave : Si l'icone du bouton PLAY en mode "lecture" (symbole stop) alors on relance la lecture automatique du slider.
Slider.prototype.onMouseLeave = function () {
    if(this.isActive){
        this.play();
    }
};
	//- randomSlide :  Sert � afficher al�atoirement une slide
Slider.prototype.randomSlide = function(){
	do{
        this.indexSlideToShow = rand(0, this.nbSlides - 1);
	}while(this.indexSlideToShow == this.currentSlide.index());
    this.gotoSlide(this.indexSlideToShow);
};

Slider.prototype.getLast = function(){
	this.currentSlide.show();
	this.updatePagination();
};

Slider.prototype.init = function () {
    this.generateControls();
    this.generatePagination();
    this.getLast();

    this.prevButton = this.controls.find('.fa-backward');
    this.nextButton = this.controls.find('.fa-forward');
    this.playButton = this.controls.find('.fa-play');
    this.randomButton = this.controls.find('.fa-random');

    this.prevButton.click(this.gotoPrevSlide.bind(this));
    this.nextButton.click(this.gotoNextSlide.bind(this));
    this.playButton.click(this.autoplay.bind(this));
    this.randomButton.click(this.randomSlide.bind(this));

    this.pages.click(this.clickOnPage.bind(this));

    this.slider.mouseover(this.onMouseOver.bind(this));
    this.slider.mouseleave(this.onMouseLeave.bind(this));
};
/*

		5) Afficher par d�faut la derni�re slide consult� depuis la derni�re consultation.

*/
