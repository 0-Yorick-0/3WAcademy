<?php

//Optimisation avec des constantes
define('HOST', 'mysql:host=localhost;dbname=blog');
define('USER', 'root');
define('PASSWORD', 'troiswa');

try{
  //on peut se passer de la méthode setAttribute en envoyant un tableau assoc directement en paramètre de new PDO
  $bdd = new PDO(HOST, USER, PASSWORD, [
	    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	    ]);
  //setAttribute n'accepete que 2 paramètres maxi : setAttribute(ATTRIBUTE, OPTION), donc il faut le réécrire autant de fois qu'il y a d'options
  // $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $bdd->exec('SET NAMES utf8');
}catch(PDOException $e){
  die('Erreur : ' . $e->getMessage());
}
