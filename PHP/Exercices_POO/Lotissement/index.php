<?php
  require 'function.php';
  require 'magical_properties.trait.php';
  require 'getProperties.trait.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercice Lotissement</title>

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

    <?php
      $ma_maison = new Maison(3, 500, 3, true, 3, 10000000, true);
      $proprio = new Proprietaire('Lubrique', 'Stanley', 'Acteur-Réalisateur', 'Propriétaire');
      $proprio->_budget = 10000;
      $actrice1 = new Occupant('Saglice', 'Vanessa', 'Actrice', 'Locataire');
      $actrice2 = new Occupant('Savienh', 'Cindy', 'Actrice',  'Locataire');
    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <table class="table-bordered">
            <caption><h3>Mon studio de tournage</h3></caption>
            <thead>
              <tr>
                <th>Numéro</th>
                <th>Propriétaire</th>
                <th>Nombre d'occupants</th>
                <th>Prix</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $ma_maison->_numero ?></td>
                <td><?= $proprio->_nom . ' ' . $proprio->_prenom ?></td>
                <td><?= $ma_maison->_nb_occupant ?></td>
                <td><?= $ma_maison->_prix ?></td>
              </tr>
            </tbody>
          </table>
              <!-- Button trigger modal -->
          <a data-toggle="modal" data-target="#myModal">
            Plus d'infos
          </a>
        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <table class="table-bordered">
          <caption>Les occupants</caption>
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Statut</th>
              <th>Métier</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $proprio->_nom ?></td>
              <td><?= $proprio->_prenom ?></td>
              <td><?= $proprio->_statut ?></td>
              <td><?= $proprio->_metier ?></td>
            </tr>
              <tr>
                <td><?= $actrice1->_nom ?></td>
                <td><?= $actrice1->_prenom ?></td>
                <td><?= $actrice1->_statut ?></td>
                <td><?= $actrice1->_metier ?></td>
              </tr>
              <tr>
                <td><?= $actrice2->_nom ?></td>
                <td><?= $actrice2->_prenom ?></td>
                <td><?= $actrice2->_statut ?></td>
                <td><?= $actrice2->_metier ?></td>
              </tr>
          </tbody>
        </table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
