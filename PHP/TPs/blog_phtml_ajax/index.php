<?php
//on récupère la connexion bdd
include 'connexion-bdd.php';

//requète joignant toutes les tables en vu de l'affichage des billets sur la page d'accueil
$req = $bdd->query('SELECT a.id, a.titre, a.contenu, a.dob, c.categorie, au.nom
   FROM categories AS c
   INNER JOIN articles AS a
   ON c.id = a.id_categorie
   INNER JOIN auteur AS au
   ON au.id = a.id_auteur
   ORDER BY dob
   DESC LIMIT 0, 5');

$title = 'Accueil';
$template = 'index';
include 'layout.phtml';
