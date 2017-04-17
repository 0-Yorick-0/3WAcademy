<?php

$sens = $_POST['sens']; //récupération du sens de la traduction dans une variable
$motRecu = strtolower($_POST['mot']);//conversion du mot rentré par l'utilisateur en minuscules

$dico = array(//création du dico i-spécifique
  'chat' => 'cat',
  'guillaume' => 'cyril hanouna'
);


function traduire($mot, $sensTrad, $array){

    if ($sensTrad == 'toEng') {
      $motTraduit = $array[$mot];
    }else{
      $motTraduit = array_search($mot, $array);//la fn array_search renvoie une valeur correspondant à la clé rentrée en paramètre
    }
  return $motTraduit;
}



if (isset($motRecu) && !empty($motRecu)) {//si l'utilisateur a bien réntré une valeur et si celle-ci n'est pas vide
  if (array_key_exists($motRecu, $dico) OR in_array($motRecu, $dico)) {//si le mot rentré par l'utilisateur existe bien dans le tableau '$dico'
    $retour = traduire($motRecu, $sens, $dico);//alors on récupère la traduction dans la variable $retour
    header('Location: traducteur.phtml?mot=' . $retour . '&insert=' . $_POST['mot']);//on repart vers la page d'accueil avec le mot traduit dans l'URL
  }else{
    header('Location: traducteur.phtml?mot=false');//on retourne vers la page d'accueil avec le mot 'false'
  }
}else{
  header('Location: traducteur.phtml?mot=empty');//on retourne vers la page d'accueil avec le mot 'empty'
}?>
