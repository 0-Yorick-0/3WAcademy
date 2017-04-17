<?php
//on récupère la connexion bdd
include '../Models/connexion-bdd.php';

// si $_GET n'est pas vide et si c'est bien un entier on le valide, sinon, retour à l'index
if (array_key_exists('id', $_GET) AND ctype_digit($_GET['id'])) {
  $id_article = $_GET['id'];
}else{
  header('Location:index.php');
}

$req = $bdd->prepare('DELETE FROM articles
WHERE id = :id');
$req->execute(array(
  'id' => $id_article
));

header('Location:admin.php');
