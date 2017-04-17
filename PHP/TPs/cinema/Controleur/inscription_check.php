<?php

if(isset($_POST['pseudo'])
&& !empty($_POST['pseudo']) && isset($_POST['mail'])
&& !empty($_POST['mail']))
{
  if ($_POST['pass'] == $_POST['confirmPass']) {
      $pseudo = $_POST['pseudo'];
      $mail = $_POST['mail'];
      $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
      include '../Modele/member_insert.php';
  }else{
    echo 'les pass ne matchent pas';
  }
}

?>
