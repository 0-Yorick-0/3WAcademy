<?php
setcookie('pseudo', $_POST['pseudo'], time() + 30, '/', null, false, true);

header('Location: cookie.php');
?>
