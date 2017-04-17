<?php

//Optimisation avec des constantes
define('HOST', 'mysql:host=localhost;dbname=bon_de_commande');
define('USER', 'root');
define('PASSWORD', 'troiswa');

try{
  $bdd = new PDO(HOST, USER, PASSWORD);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  die('Erreur : ' . $e->getMessage());
}


?>
