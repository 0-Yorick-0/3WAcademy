<?php
  session_start();
  if (isset($_COOKIE['pseudo']) && !empty($_COOKIE['pseudo'])) {
    $_SESSION['pseudo'] = $_COOKIE['pseudo'];
    // $_POST['pseudo'] = $_COOKIE['pseudo'];
    // $passCookie = $_COOKIE['pass'];
    //
    // include '../Controleur/connexion_check.php';
  }
?>
