<?php
  include_once '../Modele/connexion-bdd.php';
  include '../Controleur/session_start.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinéma</title>

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

    <header class="container-fluid">
      <div class="row">
        <h1 class="text-center">Cinéma</h1>
      </div>

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Accueil</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="acteurs.php">Acteurs</a></li>
              <li><a href="directors.php">Réalisateurs</a></li>
              <li><a href="films.php">Films</a></li>

              <!--Dropdown-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Top 5 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li data-toggle="modal" data-target="#myModalTop5"><a href="#">Top 5 des meilleurs films</a></li>
                  <li data-toggle="modal" data-target="#myModalTopBides"><a href="#">Top 5 des films les plus nuls</a></li>
                </ul>
              </li>

              <!-- Connexion/Inscription -->
              <?php
                if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])):?>
                  <li><a href="profil.php">Bonjour <?= htmlspecialchars($_SESSION['pseudo']);?></a></li>
                  <li><a href="../Controleur/deconnexion.php">Déconnexion</a></li>
              <?php else:?>
                  <li data-toggle="modal" data-target="#connexionModal"><a href="#">Connexion</a></li>
                  <li data-toggle="modal" data-target="#inscriptionModal"><a href="#">Inscription</a></li>
              <?php endif;?>
            </ul>
            <!-- Barre de recherche-->
            <form class="navbar-form navbar-right" method="post" action="index.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
              </div>
              <button type="submit" class="btn btn-default">Envoyer</button>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <!-- Modal Top5-->
      <div class="modal fade" id="myModalTop5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Top 5 des meilleurs films</h4>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Note</th>
                  </tr>
                </thead>
                <?php $tableau = 'top5';
                include '../Modele/requete.php';
                while ($donnees = $top5->fetch()) :?>
                <tr>
                  <td><?= $donnees['title']?></td>
                  <td><?= $donnees['note_presse']?></td>
                </tr>
              <?php endwhile;?>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal TopBides-->
      <div class="modal fade" id="myModalTopBides" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Top 5 des pires navets</h4>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Note</th>
                  </tr>
                </thead>
                <?php $tableau = 'top_bides';
                include '../Modele/requete.php';
                while ($donnees = $top_bides->fetch()) :?>
                <tr>
                  <td><?= $donnees['title']?></td>
                  <td><?= $donnees['note_presse']?></td>
                </tr>
              <?php endwhile;?>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Connexion -->
      <div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Connexion</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" action="../Controleur/connexion_check.php">

                <div class="form-group">
                  <label for="inputPseudo" class="col-sm-2 control-label">Pseudo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pseudo" placeholder="Votre pseudo" name="pseudo" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pass" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember"> Se souvenir de moi
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Connexion</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Inscription -->
      <div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Inscription</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" action="../Controleur/inscription_check.php">

                <div class="form-group">
                  <label for="inputPseudo" class="col-sm-2 control-label">Pseudo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPseudo" placeholder="Votre pseudo" name="pseudo" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputMail" class="col-sm-2 control-label">Mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputMail" placeholder="Votre pseudo" name="mail" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pass" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="confirmPassword" class="col-sm-2 control-label">Confirmer Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Password" name="confirmPass" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember"> Se souvenir de moi
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Inscription</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>
