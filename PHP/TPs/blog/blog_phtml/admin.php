<?php
//on récupère la connexion bdd
include 'connexion-bdd.php';

//si l'on vient de la page add_post, on va vérifier les infos rentrées par l'utilisateur :
if($_POST){
  $error = array();
  if (empty($_POST['titre']) || !preg_match('#^[a-zA-Z0-9\. ]+$#', $_POST['titre'])) {
    $error['titre'] = "Merci de remplir un titre valide";
  }

  if (empty($_POST['contenu'])) {
    $error['contenu'] = "Merci de rentrer un contenu";
  }

  if(empty($error)){
    $req = $bdd->prepare('INSERT INTO articles(titre, contenu, id_categorie, id_auteur)
    VALUES(:titre, :contenu, :id_categorie, :id_auteur)');
    $req->execute(array(
      'titre' => $_POST['titre'],
      'contenu' => $_POST['contenu'],
      'id_categorie' => $_POST['categorie'],
      'id_auteur' => $_POST['auteur']
    ));
    header('Location:admin.php');
  }else{
    '<pre>' . print_r($error) . '</pre>';
  }
}

$req = $bdd->query('SELECT a.id, a.titre, a.contenu, a.dob, c.categorie, au.nom
   FROM categories AS c
   INNER JOIN articles AS a
   ON c.id = a.id_categorie
   INNER JOIN auteur AS au
   ON au.id = a.id_auteur
   ORDER BY dob
   DESC LIMIT 0, 5');

$donnees = $req->fetchAll();

$title = 'Panneau de configuration';
$template = "admin";
include 'layout.phtml';
