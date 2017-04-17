<?php
include '../Models/connexion-bdd.php';
require '../Models/functions.php';

//si l'on vient de la page add_comment, on va vérifier les infos rentrées par l'utilisateur :
if($_POST){
  $error = array();

  if (empty($_POST['pseudo']) || !preg_match('#^[a-zA-Z0-9]+$#', $_POST['pseudo'])) {
    $error['auteur'] = "Merci de remplir un nom d'auteur valide";
  }

  if (empty($_POST['content'])) {
    $error['content'] = "Merci de rentrer un contenu";
  }

  if(empty($error)){
    $req = $bdd->prepare('INSERT INTO comment(pseudo, content, post_id) VALUES(:pseudo, :content, :post_id)');
    $req->execute(array(
      'pseudo' => $_POST['pseudo'],
      'content' => $_POST['content'],
      'post_id' => $_GET['id']
    ));
    header('Location:article.php?id=' . $_GET['id']);
  }else{
    print_r($error);
  }
}


// si $_GET n'est pas vide et si c'est bien un entier on le valide, sinon, retour à l'index
if (array_key_exists('id', $_GET) AND ctype_digit($_GET['id'])) {
  $id_article = $_GET['id'];
}else{
  header('Location:index.php');
}
//on fait une reqête pour récupérer un article
$donnees = getBillet($id_article);

//puis on récupère les commentaires associés

$comment = getComs($id_article);

$title = 'Article';
$template = 'article';
include '../../Public/Views/layout.phtml';
