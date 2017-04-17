<?php
include_once 'connexion-bdd.php';
include '../Controleur/session_start.php';

$req = $bdd->prepare('SELECT id, password
                      FROM user
                      WHERE username = :username');

$req->execute(array(
  'username' => $pseudo,
));
if ($donnees = $req->fetch()) { //si le fetch renvoie bien des infos, c'est bon
  // echo $donnees['password'];
    if (password_verify($_POST['pass'], $donnees['password'])) {
      if ($cookie) {
        setcookie('pseudo', $pseudo, time() + 3600*24*365, '/', null, false, true);
        setcookie('pass', $donnees['password'], time() + 3600*24*365, '/', null, false, true);
      }
      $_SESSION['pseudo'] = $pseudo;
      echo $_SESSION['pseudo'];
      header('Location:../Vue/index.php');
    }else{
      echo 'mauvais pass';
    }
}else{
  echo 'mauvais id';
}

?>
