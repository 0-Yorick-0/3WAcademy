<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Credi</title>

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
  <body style="padding-bottom:20rem">

    <div class="container">

      <header class="row page-header">
        <h1 class="text-center">Les exos du credi</h1>
      </header>

      <div class="row">

        <h2>Exo 1</h2>

        <?php
          $titre = 'Mon curé chez les nudistes';
          $synopsis = 'La rencontre de la spiritualité et de l\'humour français';
          $annee = 1982;
        ?>

        <div class="panel panel-success col-md-6" style="padding:0">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Titre : </strong><?php echo $titre ?></h3>
          </div>
          <div class="panel-body">
            <strong>Synopsis : </strong><?php echo $synopsis ?>
          </div>
          <div class="panel-footer"><strong>Année : </strong><?php echo $annee ?></div>
        </div>

      </div>

      <div class="row">

        <?php
          $titre = 'Les Gauloises Blondes';
          $synopsis = 'Nos ancêtres avaient la gaule';
          $annee = 1988;
        ?>

        <div class="panel panel-success col-md-6" style="padding:0">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Titre : </strong><?php echo $titre ?></h3>
          </div>
          <div class="panel-body">
            <strong>Synopsis : </strong><?php echo $synopsis ?>
          </div>
          <div class="panel-footer"><strong>Année : </strong><?php echo $annee ?></div>
        </div>

      </div>

      <div class="row">

        <?php
          $titre = 'La Prof donne des leçons particulières';
          $synopsis = ' La vraie raison de l\'absentéisme scolaire enfin révélée';
          $annee = 1975;
        ?>

        <div class="panel panel-success col-md-6" style="padding:0">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Titre : </strong><?php echo $titre ?></h3>
          </div>
          <div class="panel-body">
            <strong>Synopsis : </strong><?php echo $synopsis ?>
          </div>
          <div class="panel-footer"><strong>Année : </strong><?php echo $annee ?></div>
        </div>

      </div>


      <!-- Exo 4 -->

      <h2>Exo 4: </h2>
      <div class="row">
          <div class="col-md-8">
            <?php
              $enerve = 'Je parle pas aux cons ça les instruit.';
              $inventif = 'L\'ingéniosité en amour, c\'est comme la poésie en littérature. On peut s\'en passer, mais c\'est dommage.';
              $venal = 'Quand on parle pognon, à partir d’un certain chiffre, tout le monde écoute.';
              $gentleman = 'Un gentleman, c’est celui qui est capable de décrire Sophia Loren sans faire de geste.';
            ?>

            <table class="table table-bordered">
              <thead>
                <tr>
                  Tableau d'humeur :
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Citation :</strong></td>
                  <td><strong>Humeur : </strong></td>
                  <td><strong>Icône : </strong></td>
                </tr>
                <tr>
                  <td><?php echo $enerve; ?></td>
                  <td>Enervé</td>
                  <td><i class="fa fa-frown-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <td><?php echo $inventif; ?></td>
                  <td>Inventif</td>
                  <td><i class="fa fa-smile-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <td><?php echo $venal; ?></td>
                  <td>Vénal</td>
                  <td><i class="fa fa-dollar" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <td><?php echo $gentleman; ?></td>
                  <td>Gentleman</td>
                  <td><i class="fa fa-thumbs-up" aria-hidden="true"></i></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      <!-- Exo 5 -->
      <div class="row">
          <div class="col-md-8">
            <?php
              $titreFilms = array(
                $intouchable = array(
                  'titre' => 'Intouchables',
                  'img' => '<img src="http://fr.web.img6.acsta.net/medias/nmedia/18/82/69/17/19806656.jpg" style="display:block;max-width:20%" />',
                  'note' => 1
                ),
                $avatar = array(
                  'titre' => 'Avatar',
                  'img' => '<img src="https://images-na.ssl-images-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_UY1200_CR90,0,630,1200_AL_.jpg"  style="display:block;max-width:20%"/>',
                  'note' => 3
                ),
                $livingDead = array(
                  'titre' => 'Night Of The Living Dead',
                  'img' => '<img src="http://fr.web.img3.acsta.net/c_300_300/medias/nmedia/18/60/07/04/18655295.jpg"  style="display:block;max-width:20%"/>',
                  'note' => 5
                )
              );
            ?>

            <table class="table table-bordered">
              <thead>
                <tr>
                  Flims :
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td><strong>Titre :</strong></td>
                  <td><strong>Affiche : </strong></td>
                  <td><strong>Note : </strong></td>
                </tr>

                <?php
                  foreach ($titreFilms as $film => $array) {
                    echo '<tr>';
                    foreach ($array as $key => $value) {
                      echo '<td>';
                      if ($key == 'note') {
                        echo str_repeat('<i class="fa fa-star" aria-hidden="true"></i>', $value);
                      }else{
                      echo $value . '</td>';
                      }
                    }
                    echo '</tr>';
                  }
                ?>

              </tbody>
            </table>
          </div>
      </div>

      <div class="row">
        <h2>Exo 6 :</h2>
        <div class="col-md-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Majuscule - Minuscule</strong></h3>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item"><strong>Nom Majuscule : <?php echo strtoupper('nelsonmandelaavecunchapeaugrotesque'); ?></strong></li>
                <li class="list-group-item"><strong>Prénom Majuscule :</strong><?php echo ucfirst('coluche') ?></li>
                <li class="list-group-item"><strong> Chaîne Minuscule :</strong> <?php echo strtolower('BATMAN')?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <h2>Exo 6 : Palindrome</h2>
        <?php $phrase ='Even in Eden I win eden in Eve'; ?>
        <div class="col-md-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Palindrome</strong></h3>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item"><strong>Phrase à l'endroit: <?php echo strtoupper($phrase); ?></strong></li>
                <li class="list-group-item"><strong>Phrase à l'envers :</strong><?php echo str_replace(' ', '', strrev($phrase)); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <h2>Exo 6 : phrase mélangée</h2>
        <?php $phrase ='I\'ll be back'; ?>
        <div class="col-md-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Palindrome</strong></h3>
            </div>
            <div class="panel-body">
                <strong>Phrase à l'envers :</strong><?php echo str_shuffle($phrase); ?>
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-md-12" style="display:flex;justify-content:space-around">
                  <button type="button" class="btn btn-danger" id="rate">Raté</button>
                  <button type="button" class="btn btn-warning" id="pasMal">Pas mal</button>
                  <button type="button" class="btn btn-success" id="hasta">Hasta La Vista Baby!</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <h2>Exo 7 : Transfert de prenom</h2>
        <div class="col-md-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Formulaire :</h3>
            </div>
            <div class="panel-body">
              <form class="form-inline" action="prenom.php" method="post">
                <div class="form-group">
                  <label for="exampleInputName2">Ton nom :</label>
                  <input type="text" class="form-control" placeholder="Jane Doe" name="prenom">
                </div>
                <input type="submit" value="Envoyer"/>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <?php
            $tabEleve = array(
              $people = array(
                'Elève 1' => 'Guillaume',
                'Elève 2' => 'Fatma',
                'Elève 3' => 'JP',
                'Elève 4' => 'Romain',
                'Elève 5' => 'Christophe',
                'Prof' => 'Julien'
              ),
              $icones = array(
                $student = '<i class="fa fa-graduation-cap" aria-hidden="true"></i>',
                $teacher = '<i class="fa fa-h-square" aria-hidden="true"></i>'
              )
            );
          ?>

          <table class="table table-bordered">
            <thead>
              <tr>
                <strong>The Crew</strong>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td><strong>Statut :</strong></td>
                <td><strong>Nom : </strong></td>
                <td><strong>Ico :</strong></td>
              </tr>

              <?php foreach ($tabEleve as $array) :
                if ($array == $people) :
                  foreach ($array as $key => $value):?>
                  <tr>
                    <td><?= $key; ?></td>
                    <td><?= $value; ?></td>
                    <td><?php
                      if ($key == 'Prof') {
                        echo $teacher;
                      }else{
                        echo $student;
                      }
                     ?></td>
                  </tr>
                <?php endforeach;
              endif;
            endforeach;
                ?>
            </tbody>
        </div>

      </div>



    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><blockquote>“Quand j'entends discourir des cons au restaurant, je suis affligé, mais je me console en songeant qu'ils pourraient être à ma table.”</blockquote></h4>
          </div>
          <div class="modal-body">
            <ul class="list-group">
              <li class="list-group-item"><strong>Nom : </strong>Dard</li>
              <li class="list-group-item"><strong>Prénom : </strong>Frederic</li>
              <li class="list-group-item"><strong>Age : </strong>Mort</li>
              <li class="list-group-item"><strong>Date de naissance : </strong>29 juin 1921</li>
              <li class="list-group-item"><strong>Ville : </strong>Saint-Chef</li>
              <li class="list-group-item"><img src="https://upload.wikimedia.org/wikipedia/commons/0/03/Fr%C3%A9d%C3%A9ric_Dard_%281992%29_by_Erling_Mandelmann.jpg" alt="Frederic Dard"></li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <footer class="container-fluid" style="border-top: 1px solid grey;margin-top: 5rem;padding:2rem;position:fixed;bottom:0;left:0; width:100%;background: black;color:white">



      <div class="row">
          <div class="col-md-8 text-center">
            <a href="https://www.wikiwand.com/fr/Fr%C3%A9d%C3%A9ric_Dard" class="text-uppercase" data-toggle="modal" data-target="#myModal" id="lienAuteur">San Antonio</a>
          </div>
          <div class="col-md-4">
            Ce site à été visité <?php
            //ouverture du ficher compteur avec r+ (en lecture et écriture)
            $compteur = fopen('/var/www/html/3wa/php/Exercices/compteur', 'r+');
            //on récupère le nombre de vue dans une variable avec fgets qui lit la première ligne
            $vues = fgets($compteur);
            //on l'incrémente
            $vues = $vues + 1;
            // //on remet le curseur au début du fichier
            fseek($compteur, 0);
            //on écrit avec fputs
            fputs($compteur, $vues);
            //fermetuer du fichier
            fclose($compteur);
            echo $vues
            ?> fois.
          </div>
      </div>

    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/credi.js">

    </script>
  </body>
</html>
