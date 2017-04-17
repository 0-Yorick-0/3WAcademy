<?php
include 'session_start.php';

$_SESSION = array(); //on vide la variable de session
session_destroy();

setcookie('pseudo', '', time(), '/', null, false, true);// on détruit le cookie
setcookie('pass', '', time(), '/', null, false, true);

header('Location:../Vue/index.php');
?>
