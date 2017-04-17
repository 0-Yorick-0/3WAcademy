<?php

$sens = $_POST['sens'];
$motRecu = strtolower($_POST['mot']);

$dico = array(
  'chat' => 'cat',
  'guillaume' => 'cyril hanouna'
);

function traduire($mot, $sensTrad, $array){

    if ($sensTrad == 'toEng') {
      $motTraduit = $array[$mot];
    }else{
      $motTraduit = array_search($mot, $array);
    }
  return $motTraduit;
}

if (isset($motRecu) && !empty($motRecu)) {

  if (array_key_exists($motRecu, $dico) OR in_array($motRecu, $dico)) {
    $retour = traduire($motRecu, $sens, $dico);
  }else{
    $retour = 'false';
  }
}else{
  $retour = 'empty';
}
?>
