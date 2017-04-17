<?php
include 'connexion-bdd.php';

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



$req = $bdd->prepare('SELECT a.id, a.titre, a.contenu, a.dob, c.categorie, au.nom
   FROM categories AS c
   INNER JOIN articles AS a
   ON c.id = a.id_categorie
   INNER JOIN auteur AS au
   ON au.id = a.id_auteur
   WHERE a.id = :id
   ORDER BY dob
   ');

$req->execute(array(
  ':id'=> $id_article
));

$donnees = $req->fetch();

//puis on récupère les commentaires associés

$req_article = $bdd->prepare('SELECT com.pseudo, com.content
  FROM comment AS com
  INNER JOIN articles AS a
  ON com.post_id = a.id
  WHERE a.id = :id
  ');

$req_article->execute(array(
  ':id'=> $id_article
));

$comment = $req_article->fetchAll(PDO::FETCH_ASSOC);

$title = 'Article';
$template = 'article';
include 'layout.phtml';
