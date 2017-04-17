<?php
  switch ($tableau) {
    case 'actors':
      $req = $bdd->query('SELECT firstname, lastname, dob, city FROM actors');
      break;
    case 'directors':
      $req = $bdd->query('SELECT firstname, lastname, dob, note FROM directors');
      break;
    case 'films':
      $req = $bdd->query('SELECT image, title, date_release, note_presse FROM movies');
      break;
    case 'top5':
      $top5 = $bdd->query('SELECT title, note_presse FROM movies WHERE note_presse IS NOT NULL ORDER BY note_presse DESC LIMIT 0, 5');
      break;
    case 'top_bides':
      $top_bides = $bdd->query('SELECT title, note_presse FROM movies WHERE note_presse IS NOT NULL ORDER BY note_presse LIMIT 0, 5');
      break;
    default:

      break;
  }

?>
