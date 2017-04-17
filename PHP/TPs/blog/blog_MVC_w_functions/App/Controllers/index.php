<?php
//on récupère la connexion bdd
include '../Models/connexion-bdd.php';
require '../Models/functions.php';

//requète joignant toutes les tables en vu de l'affichage des billets sur la page d'accueil
$req = getBillets(0, 5);

$title = 'Accueil';
$template = 'index';
include '../../Public/Views/layout.phtml';
