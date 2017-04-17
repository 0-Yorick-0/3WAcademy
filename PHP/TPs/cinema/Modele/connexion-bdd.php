<?php

//Optimisation avec des constantes
define('HOST', 'mysql:host=localhost;dbname=cinema');//dsn
define('USER', 'root');
define('PASSWORD', 'troiswa');

try{
  $bdd = new PDO(HOST, USER, PASSWORD);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//récupération des erreurs de connexion
  $bdd->exec('SET NAMES utf8');//permet de tout convertir en utf8
}catch(PDOException $e){
  die('Erreur connexion : ' . $e->getMessage());
}


?>
