<?php

if($req = ($bdd->query("SELECT DISTINCT image, title, date_release, note_presse
  FROM movies
  WHERE UPPER(title)
  LIKE '%$search%'"))->fetchAll())
{

  include '../Vue/tab_films.php';

}else if($req = ($bdd->query("SELECT DISTINCT firstname, lastname, image, dob, city
  FROM actors
  WHERE UPPER(lastname) LIKE '%$search%'
  OR UPPER(firstname) LIKE '%$search%'
  OR CONCAT(UPPER(firstname), ' ', UPPER(lastname)) LIKE '%$search%'
  "))->fetchAll()){

    $metier = "Acteur";
    include '../Vue/tab_actors.php';

}else if($req = ($bdd->query("SELECT DISTINCT firstname, lastname, image, dob
  FROM directors
  WHERE UPPER(lastname) LIKE '%$search%'
  OR UPPER(firstname) LIKE '%$search%'
  OR CONCAT(UPPER(firstname), ' ', UPPER(lastname)) LIKE '%$search%'
  "))->fetchAll()){
    $metier = "Réalisateur";
    include '../Vue/tab_directors.php';

}else{
  echo 'pas de donnée correspondante';
}




?>
