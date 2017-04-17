<?php

  include_once '../Modele/connexion-bdd.php';


  if (!$_GET['nav']) {

    if (isset($_POST['auteur']) && !empty($_POST['auteur'])) {
      //on va aller chercher l'id de l'auteur, à condition que ce dernier existe
      ($req = $bdd->prepare('SELECT id FROM auteur WHERE nom = :nom'));
      $req->execute(array(
        'nom' => $_POST['auteur']
      ));

      if (!($donnees = $req->fetch())) {
        $req = $bdd->prepare('INSERT INTO auteur(nom) VALUES(:nom)');
        $req->execute(array(
          'nom' => $_POST['auteur']
        ));
      }
    }
    if (isset($_POST['titre']) && !empty($_POST['titre'])) {
      if (isset($_POST['contenu']) && !empty($_POST['contenu'])) {
        $req = $bdd->prepare('INSERT INTO articles(titre, contenu, id_categorie, id_auteur) VALUES(:titre, :contenu, :id_categorie, :id_auteur)');
        $req->execute(array(
          'titre' => $_POST['titre'],
          'contenu' => $_POST['contenu'],
          'id_categorie' => $_POST['categorie'],
          'id_auteur' => $donnees['id']
        ));
        $req->closeCursor();
      }else{
        header('Location: index.php?contenu=vide');
      }
    }else{
      header('Location: index.php?titre=vide');
    }

  }
?>
