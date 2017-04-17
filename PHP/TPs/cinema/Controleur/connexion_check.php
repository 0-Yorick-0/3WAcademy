<?php
if(isset($_POST['pseudo'])
&& !empty($_POST['pseudo'])
&& empty($_POST['remember']))
{
  $pseudo = $_POST['pseudo'];
  $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
  include '../Modele/member_check.php';

}elseif (isset($_POST['pseudo'])
&& !empty($_POST['pseudo'])
&& !empty($_POST['remember'])) {
  $cookie = true;
  $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
  $pseudo = $_POST['pseudo'];
  include '../Modele/member_check.php';
}

// if (!empty($_POST)) {
//
//   $errors = array();
//
//   if (empty($_POST['pseudo'] || !preg_match('#^[\d\w_]+$#', $_POST['pseudo'])) {
//     $errors['pseudo'] = "Pseudo invalide, merci de rentrer un caractère alphanumérique";
//   }
//
//   if (empty($_POST['password']) {
//     $errors['password'] = "Merci de rentrer un mot de passe";
//   }
// }

?>
