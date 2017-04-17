$(document).ready(function(){
  console.log("jQuery is fuckin' ready!");

  $('body').css({
    'background': '#697f99',
  'background': '-moz-linear-gradient(45deg, #697f99 0%, #84b1d6 31%, #428cc9 67%, #7db9e8 100%)',
  'background': '-webkit-linear-gradient(45deg, #697f99 0%,#84b1d6 31%,#428cc9 67%,#7db9e8 100%)',
  'background': 'linear-gradient(45deg, #697f99 0%,#84b1d6 31%,#428cc9 67%,#7db9e8 100%)',
  'filter': 'progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#697f99\', endColorstr=\'#7db9e8\',GradientType=1 )',
  'color': 'white',
  'font-family': '"Open Sans Condensed", serif',
  'font-size': '18px',
  });

  // Remonter blur pour tout les input

  $('input').blur(function(){
    if($(this).val() == ''){
      $(this).next('div.alert').slideUp();
      $(this).css('border-color', 'transparent');
    }
  });

  /*
  * Capcha: Générer 3 nombres aléatoire entre 1 et 100 puis créer un champs "Somme"
  * qui propose a l'utilisateur de saisir la somme des 3 chiffres.
  * Quand je clique sur "Enregistrer", si la somme saisie n'est pas correcte par rapport a la somme reelle
  * alors afficher un message d'ereur
  */


  // CAPCHA

  var somme = 0;
  for (var i = 0; i < 3; i++) {
    var nombre = Math.round(Math.random()*(100));
    $('div#capcha span').append(' - ' + nombre + ' - ');
    somme += nombre;
  }

  console.log(somme);

  $('input#sommeCapcha').blur(function(){
    if($(this).val().match(/^\d{1,3}$/)){
      if (parseInt($(this).val()) !== somme) {
        $('div#messageCapcha').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tu connais les additions ?');
      }else{
        $('div#messageCapcha').slideUp();
      }
    }else if ($(this).val() == ''){
      $('div#messageCapcha').slideUp();
    }else{
      $('div#messageCapcha').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Merci de rentrer un format valide (3 chiffres).');
    }
  });

  $('form button#send').click(function(){
    var nom = $('form #name').val();
    if (nom.length < 3) {
      $('span#messageNom').fadeIn().text('Balance plus de caractères !');
      $('input#name').css('background', 'red');
    }else{
      $('span#messageNom').fadeOut();
    }


    var mail = $('form #mail').val();
    if (mail.length < 5){
      $('span#messageMail').fadeIn().text('Sois pas radasse !');
      $('input#mail').css('background', 'red');
    }else{
      $('span#messageMail').fadeOut();
    }

    if(mail.length > 3 && nom.length > 5){
      $('div.form-group').fadeOut(1000);
      $('p.alert').fadeIn();
    }

    if (!$('input#checkHomme').is(':checked') && !$('input#checkFemme').is(':checked')) {
    $('div#sexe').css('color', 'red');
    }

    if($('select#menuSport option[value=none]').is(':selected')){
      $('div#messageSport').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il faut choisir un sport, feignasse !')
    }else{
      $('div#messageSport').slideUp();
    }

    if (($('div#loisirs input:checked').length) < 2) {
      $('div#messageLoisirs').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il faut choisir au moins deux loisirs de sociopathe')
    }else{
      $('div#messageLoisirs').slideUp();
    }

  });//fin du click button

  $('input#name').blur(function(){
    if ($(this).val().match(/^[A-Za-z-]{2,}$/)) {
      $('div#messageNom').slideUp();
    }else if($(this).val() === ''){
      $('div#messageNom').slideUp();
    }else{
      $('div#messageNom').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il faut au moins 2 caractères alphabétiques...');
    }
  });


  $('input#mail').blur(function(){
    if ($(this).val().match(/^[\w.-]+@[\w.-]{2,}\.[a-z]{2,4}$/)) {
      $('div#messageMail').slideUp();
    }else if($(this).val() == ''){
      $('div#messageMail').slideUp();
    }else{
      $('div#messageMail').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il faut choisir un mail valide');
    }
  });

  $('input#tel').blur(function(){
    if ($(this).val().match(/^(\d{2}[. -]?){5}$/)) {
      $('div#messageTel').slideUp();
      $(this).css('border-color', 'green');
    }else if($(this).val() == ''){
      $('div#messageTel').slideUp();
    }else{
      $('div#messageTel').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Format XX-XX-XX-XX-XX stp');
    }
  });

  $('input#dispo').blur(function(){
    if ($(this).val().match(/^[0-2]\d:[0-5]\d$/ig)) {
      $('div#messageDispo').slideUp();
      $(this).css('border-color', 'green');
    }else if($(this).val() == ''){
      $('div#messageDispo').slideUp();
      $(this).css('border-color', 'transparent');
    }else{
      $('div#messageDispo').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Mauvais format');
      $(this).css('border-color', 'red');
    }
  });

  $('input#numCB').blur(function(){
    if ($(this).val().match(/^([\d]{4}-){3}[\d]{4}$/g)) {
      $('div#messageNumCB').slideUp();
      $(this).css('border-color', 'green');
    }else if($(this).val() == ''){
      $('div#messageNumCB').slideUp();
      $(this).css('border-color', 'transparent');
    }else{
      $('div#messageNumCB').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Numéro Invalide');
      $(this).css('border-color', 'red');
    }
  });

  $('input#dateCB').blur(function(){
    if ($(this).val().match(/^[\d]{2}\/[\d]{2}$/g)) {
      var today = new Date();
      var dateTab = $('input#dateCB').val().split("/");
      var date = new Date(20 + dateTab[1], dateTab[0]-1);
      if (date < today){
        $('div#messageDateCB').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Carte Expirée');
        $(this).css('border-color', 'red');
      }else{
        $('div#messageDateCB').slideUp();
        $(this).css('border-color', 'green');
      }
    }else if($(this).val() == ''){
      $('div#messageDateCB').slideUp();
      $(this).css('border-color', 'transparent');
    }else{
      $('div#messageDateCB').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Numéro Invalide');
      $(this).css('border-color', 'red');
    }
  });

  $('input#crypto').blur(function(){
    if ($(this).val().match(/^[\d]{3}$/g)) {
      $('div#messageCrypto').slideUp();
      $(this).css('border-color', 'green');
    }else if($(this).val() == ''){
      $('div#messageCrypto').slideUp();
      $(this).css('border-color', 'transparent');
    }else{
      $('div#messageCrypto').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Numéro Invalide');
      $(this).css('border-color', 'red');
    }
  });



  $('input#cp').blur(function(){
    var cp = $('input#cp').val();

    if(cp.length === 0){
      $('div#messageCP').slideUp();
    }else if(!($(this).val().match(/^\d{5}$/))){
      $('div#messageCP').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Un code postale fait 5 chiffres...');
    }else{
      $('div#messageCP').slideUp();
    }
  });


  /**
* Ajouter le champs Ville juste en dessous du champs CP
* Quand je quitte le champs CP, si le CP commence par "69", completer la ville Lyon
* Si le CP est 69100 , completer "Villeurbanne" dans le champs ville
*/

  $('input#cp').keyup(function(){
    var cp = parseInt($('input#cp').val());
    var debutCP = $('input#cp').val().slice(0,2);
    if (cp == 69100) {
      $('input#ville').val('Désolé pour toi');
    }else if (debutCP == "69") {
      $('input#ville').val('Lyon');
    }else{
      $('input#ville').val('');
    }
  });

  $('input#age').blur(function(){
    var age = $('input#age').val();

    if($(this).val().match(/^\d{1,2}$/)){
      if (age < 18 || age > 99) {
        $('div#messageAge').slideDown().text('Soyons sérieux...');
      }else{
        $('div#messageAge').slideUp();
      }
    }else if(age == ''){
      $('div#messageAge').slideUp();
    }else{
      $('div#messageAge').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> En fait un âge, c\'est un nombre compris entre 1 et 99');
    }
  });

  $('input#facebook').blur(function(){
    if ($(this).val().match(/^(https:\/\/www\.)facebook\.com\/[\w.]+$/ig)) {
      $('div#messageFacebook').slideUp();
      $(this).css('border-color', 'green');
    }else if($(this).val() == ''){
      $('div#messageFacebook').slideUp();
      $(this).css('border-color', 'transparent');
    }else{
      $('div#messageFacebook').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Adresse Invalide');
      $(this).css('border-color', 'red');
    }
  });

  $('input#twitter').blur(function(){
    if ($(this).val().match(/^(https:\/\/)twitter\.com\/[\w]+$/ig)) {
      $('div#messageTwitter').slideUp();
      $(this).css('border-color', 'green');
    }else if($(this).val() == ''){
      $('div#messageTwitter').slideUp();
      $(this).css('border-color', 'transparent');
    }else{
      $('div#messageTwitter').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Adresse Invalide');
      $(this).css('border-color', 'red');
    }
  });

  $('textarea#bio').blur(function(){
    var bio = $('textarea#bio').val();

    if (bio.length < 200 && bio.length > 10){
      if(bio.match(/^[\w. -]{10,200}$/igm)){
        $('div#messageBio').slideUp();
        $('textarea#bio').css('background-color', 'white');
      }else{
        $('div#messageBio').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Pas de caractères spéciaux coco !');
      }
    }else if(bio.length == 0){
      $('div#messageBio').slideUp();
      $('textarea#bio').css('background-color', 'white');
    }else{
      $('div#messageBio').slideDown().text('Sois plus bavard stp...');
      $('textarea#bio').css('background-color', 'pink');
    }

  });

  $('span#fontPlus').click(function(){
    var size = parseInt($('textarea#bio').css('font-size'));
    size++;
    $('textarea#bio').css('font-size', size + 'px');
  });

  $('span#fontMoins').click(function(){
    var size = parseInt($('textarea#bio').css('font-size'));
    size--;
    $('textarea#bio').css('font-size', size + 'px');
  });

  $('textarea#bio').keyup(function(){
      var nbChar = $('textarea#bio').val();
      var nbCharRestants = 200 - nbChar.length;
      $('span#compteurBio').text(nbCharRestants);
      if(nbChar.length < 15){
        $('textarea#bio').css('border-color', 'red');
      }else if (nbChar.length >= 15 && nbChar.length < 25) {
        $('textarea#bio').css('border-color', 'orange');
      }else if (nbChar.length > 25) {
        $('textarea#bio').css('border-color', 'green');
      }
      var text = $('textarea#bio').val();
      $('p#pBio').text(text);
  });

  $('input#name, input#mail').keyup(function(){
    if (($('input#name').val() === $('input#mail').val()) && $('input#name').val() != 0) {
      $('span#messageNom').fadeIn().text('Ton blaze doît être différent de ton mail');
    } else{
      $('span#messageNom').fadeOut()
    }
  });

  $('textarea#bio').keyup(function(){
    var nbChar = $('textarea#bio').val();
    var progress = Math.round(nbChar.length/2) + '%';
    $('div.progress-bar').css('width', progress);
    $('div.progress-bar').text(progress).css({
      'color': 'white',
    });
  });

  $('input#pass').blur(function(){
    if($(this).val().match(/^(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z\d\W]{6,8}$/)) {
      $('div#messagePass').slideUp();
    }else if($(this).val() == ''){
      $('div#messagePass').slideUp();
    }else{
      $('div#messagePass').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Une majuscule, un caractère spécial, un chiffre minimum, sinon tu seras piraté dans ta life');
    }
  });

  $('input#confirmPass').blur(function(){
    var pass = $('input#pass').val().toLowerCase();
    var confirmPass = $('input#confirmPass').val().toLowerCase();
    if ((pass != confirmPass) && pass != '' && confirmPass != '') {
      $('div#messageConfirmPass').slideDown().text('Vos pass ne correspondent pas');
    }else{
      $('div#messageConfirmPass').slideUp().text('');
    }
  });


  // A DETERMINER
  // $('input#reveal').click(function(){
  //   $('input#pass').attr('type', function(index, attr){
  //     console.log(index);
  //     return attr == 'text' ? 'password' : 'text';
  //   });
  // });

  /* Créer une checkbox avec un label "Voir le mot de passe en clair"
* Quand je coche la case , le mot de passe se met en clair
* Voir les fonction attr() pour modifier un attribut
* et la fonction is(':visible')
*/

  $('input#reveal').click(function(){
    if ($('input#pass').is(':password')) {
      $('input#pass').attr('type', 'text');
    }else{
      $('input#pass').attr('type', 'password');
    }
  });

  /**
* Créer 2 bouttons radios pour le Sexe: Homme et Femme
* Puis, quand je clique sur le boutton de formulaire, vérifier que l'un des 2 bouttons radios est cochés
* Si l'un des 2 n'est pas coché, mettre en rouge les label Homme et Femmes
*/

//cf haut de page

/**
* Ajouter une  case à cochée Conditions Général D'utilisation
* Par défaut, on aura le boutton "Enregistrer" du formulaire désactivé (attribut disabled)
* Quand je coche la case a cochée,  activé le boutton (supprimer l'attribut disabled)
* voir la fonction attr() et removeAttr()
*/

$('input#conditions').click(function(){
  if($('input#conditions').is(':checked')){
    $('form button#send').removeAttr('disabled');
    console.log('cochée');
  }else{
    $('form button#send').attr('disabled', 'disabled');
    console.log('décochée');
  }
});

$('form button#reload').click(function(){
  $('input').val('');
  $('input[type=checkbox], input[type=radio]').prop('checked', false);
  $('div.alert').slideUp();
});


/**
* Créer 3 champs pour une date de naissance: jour, mois et année
* Vérifier que le jour soit compris entre 1 et 31, que le mois entre 1 et 12
* et que l'année soit inférieur ou égal à 1988
* Bonus: Voir la fonction Date http://www.w3schools.com/jsref/jsref_obj_date.asp
*/

  $('input#date').blur(function(){
    var date = $('input#date').val();
    if (date.length === 0) {
      $('div#messageDDN').slideUp();
    }
    else if(!date.match(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/)){
      $('div#messageDDN').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il faut rentrer une date au format jj/mm/aaaa');
    }else{
        var dateTab = date.split('/');
        if(dateTab[0] < 1 || dateTab[0] > 31){
          $('div#messageDDN').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Le jour doit être compris entre 1 et 31');
        }else if(dateTab[1] < 1 || dateTab[1] > 12){
          $('div#messageDDN').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Le mois doit être compris entre 1 et 12');
        }else if(dateTab[2] > 1988){
          $('div#messageDDN').slideDown().html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> L\'année doit être inférieure à 1988');
        }else{
          $('div#messageDDN').slideUp();
        }
    }
  });


  /**
* Créer une liste deroulante (<select><option) de sports avec une option "Autre" a la fin
* Quand on selectionne "Autre", cela fait aparaitre un champs de saisie permettant de saisir un autre sport

  Indice: evenement change()

 Bonus: Quand on appuit sur le bouton "enregistrer",  verifie qu'il est selectionner un item dans la liste déroulante
*/

  $('select#menuSport').change(function(){
    if ($('select#menuSport option[value=autre]').is(':selected')) {
      $('input#autre').slideDown();
      console.log('down');
    }else{
      $('input#autre').slideUp();
    }
  });

  $('div#loisirs input#tous').change(function(){
    if($(this).is(':checked')){
      $('div#loisirs input').prop('checked', true);
    }else{
      $('div#loisirs input').prop('checked', false);
    }
  });

  /**
* Ajouter le champs text "Avatar"  où l'utilisateur va saisir une URL d'image
* et quand il quitte le champs(blur) cela fais apparaître en dessous l'image
*/

  $('input#avatar').blur(function(){
    var url = $(this).val();
    if(url.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.?=%-]*)*\/?$/img)){
      $('form #imgAvatar').attr('src', url).fadeIn();
    }else{
      $('form #imgAvatar').fadeOut();
    }
  });

  /**
* Ajouter 6 checkbox pour Les Loisirs de l'utilisteur (Cinema, Musique, Informatique...)
* Quand on clique sur le boutton "Enregistrer", vérifier que l'utilisateur a au moins
* coché 2 loisirs
*/

  //cf plus haut


  // Regex ou Regular Expression

  "Quand il y a une erreur, cela affiche un message d'erreur en dessous du champs"

/*
*  + Verifier qu'un code postale est valide (5 chiffres)
*  +
*/

/**
* Verifier qu'un age est un nombre de 1 ou 2 chiffres
*/

/**
* Verifier que le nom et prénom fasse minimum 2 caractères et que se soit que des alphas avec tirets compris
*/

/**
* AJouter un champs numéro de téléphone au format XX-XX-XX-XX-XX
*/

/**
* Verifier que l'email soit valid avec un @ et un "." et qu'il soit de Google( "gmail.com")
*/

/**
* Verifier que la biographie ne comporte que des caractère alpha avec tiret, point et espace compris
*/



});
