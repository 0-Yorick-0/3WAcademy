<?php if ($_GET['cookie-empty'] == 'yes'){
    setcookie('pseudo', null, time() - 30, '/', null, false, true);
    $cookie_empty = true;
    echo $_COOKIE['pseudo'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <form action="reception_form.php" method="post" >
      <div class="form-group">
        <!-- <label for="mail">Votre Nom : </label>
        <input type="text" class="form-control" id="mail" placeholder="nom..." name="nom">
      </div> -->
      <div class="form-group">
        <label for="pseudo">Votre Pseudo : </label>
        <input type="text" class="form-control" id="pseudo" placeholder="pseudo..." name="pseudo">
      </div>
      <button type="submit" class="btn btn-default">Envoyer</button>
    </form>

    <?php if (!empty($_COOKIE['pseudo'])):?>
      <p>salut <?= $_COOKIE['pseudo']; ?></p>
    <?php endif; ?>

    <a href="cookie.php?cookie-empty=yes">Vider le cookie</a>


    <?php
      if($cookie_empty):?>
      <p>Le cookie est vide : <?php var_dump($_COOKIE['pseudo']);?></p>
    <?php endif;?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
