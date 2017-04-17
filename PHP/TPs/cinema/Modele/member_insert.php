<?php
include 'connexion-bdd.php';
include '../Controleur/session_start.php';

$req = $bdd->prepare('INSERT INTO user(username, password, email)
                      VALUES(:username, :password, :email)');

if ($req->execute(array(
  'username' => $pseudo,
  'password' => $pass,
  'email' => $mail
))) {
  header('Location:../Vue/index.php?success=1');
}else{
  echo 'marche pô';
}

?>
