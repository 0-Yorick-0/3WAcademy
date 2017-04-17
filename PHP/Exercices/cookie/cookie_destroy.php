<?php
    setcookie ('pseudo', '', time() - 3600, '/');
    var_dump($_COOKIE['pseudo']);
    unset($_COOKIE['pseudo']); 

?>
