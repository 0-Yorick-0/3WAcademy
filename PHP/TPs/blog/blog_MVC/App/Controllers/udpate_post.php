<?php
//on récupère la connexion bdd
include '../Models/connexion-bdd.php';

//si l'utilisateur a validé la modification de son article
if($_POST){
echo $_POST['id'];
  $error = array();
  if (empty($_POST['titre']) || !preg_match('#^[a-zA-Z0-9\.]+$#', $_POST['titre'])) {
    $error['titre'] = "Merci de remplir un titre valide";
  }

  if (empty($_POST['contenu'])) {
    $error['contenu'] = "Merci de rentrer un contenu";
  }

  if(empty($error)){
    $req = $bdd->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, id_categorie = :id_categorie
    WHERE id = :id');
    $req->execute(array(
      'titre' => $_POST['titre'],
      'contenu' => $_POST['contenu'],
      'id_categorie' => $_POST['categorie'],
      'id' => $_POST['id']
    ));
    header('Location:admin.php');
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
   ');

$req->execute(array(
  ':id'=> $id_article
));

$donnees = $req->fetch();


$title = 'Modifier Article';
$template = 'udpate_post';
include '../../Public/Views/layout.phtml';
