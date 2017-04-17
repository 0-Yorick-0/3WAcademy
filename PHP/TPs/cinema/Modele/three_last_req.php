<?php

$req = ($bdd->query('SELECT DISTINCT image, title, date_release
  FROM movies
  ORDER BY date_release DESC
  LIMIT 0,3'))->fetchAll();

  include '../Vue/three_last_view.php';

?>
