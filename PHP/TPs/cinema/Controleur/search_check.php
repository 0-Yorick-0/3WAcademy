<?php

  if(isset($_POST['search'])
  && !empty($_POST['search']))
  {
    if (preg_match("#^[\d\w]*$#", $_POST['search'])) {
      $search = strtoupper(htmlspecialchars($_POST['search']));
      $search = trim($search); //supprime les espaces avant et après
      include '../Modele/search_req.php';
    }else {
      echo 'pas de caractère spécial svp';
    }
  }else{
    include '../Modele/three_last_req.php';
  }
?>
