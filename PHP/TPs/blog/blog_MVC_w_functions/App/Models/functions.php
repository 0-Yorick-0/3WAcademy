<?php
function getBillets(int $offset, int $limit){
  //récupération de la bdd sous forme de globale
  global $bdd;
  //requète joignant toutes les tables en vu de l'affichage des billets sur la page d'accueil
  $req = $bdd->prepare('SELECT a.id, a.titre, a.contenu, a.dob, c.categorie, au.nom
     FROM categories AS c
     INNER JOIN articles AS a
     ON c.id = a.id_categorie
     INNER JOIN auteur AS au
     ON au.id = a.id_auteur
     ORDER BY dob
     DESC LIMIT :offset, :limit');

  $req->bindParam(':offset', $offset, PDO::PARAM_INT);
  $req->bindParam(':limit', $limit, PDO::PARAM_INT);
  $req->execute();

  return $req;
}

function getBillet(int $id){
  //récupération de la bdd sous forme de globale
  global $bdd;
  $req = $bdd->prepare('SELECT a.id, a.titre, a.contenu, a.dob, c.categorie, au.nom
     FROM categories AS c
     INNER JOIN articles AS a
     ON c.id = a.id_categorie
     INNER JOIN auteur AS au
     ON au.id = a.id_auteur
     WHERE a.id = :id
     ORDER BY dob
     ');

  $req->bindParam(':id', $id, PDO::PARAM_INT);

  $req->execute();

  $donnees = $req->fetch();

  return $donnees;
}

function getComs($id){

  //récupération de la bdd sous forme de globale
  global $bdd;

  $req = $bdd->prepare('SELECT com.pseudo, com.content
    FROM comment AS com
    INNER JOIN articles AS a
    ON com.post_id = a.id
    WHERE a.id = :id
    ');

  $req->bindParam(':id', $id, PDO::PARAM_INT);

  $req->execute();

  $comment = $req->fetchAll();

  return $comment;
}
