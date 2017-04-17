<?php
  include 'header.php';
  include_once '../Modele/connexion-bdd.php';
  include '../Modele/commande_req.php';
  // Fixatiion de la TVA
  define('TVA', '0.20');


?>

  <div class="row">
    <div class="container">
      <a href="index.php">Retour à l'index</a>
    </div>
  </div>
  <div class="row">
    <article class="container">
      <div class="panel panel-default col-md-4 pull-right" style="padding:0">
        <div class="panel-heading">Coordonées client</div>
        <div class="panel-body">
          <div class="text-center">
            <p>Prénom : <?= $donnees['contactFirstName']; ?></p>
            <p>Nom : <?= $donnees['contactLastName']; ?></p>
            <p>Adresse 1 : <?= $donnees['addressLine1']; ?></p>
            <p>Adresse 2 : <?= $donnees['addressLine2']; ?></p>
            <p>Ville : <?= $donnees['city']; ?></p>
            <p>Téléphone : <?= $donnees['phone']; ?></p>
          </div>
        </div>
      </div>
    </article>
  </div>

  <div class="row">
    <div class="container">
      <table class="table table-striped table-hover">
        <caption>Commande n° <?= $_GET['num']; ?></caption>

        <thead>
          <tr>
            <th>Reférence</th>
            <th>Produit</th>
            <th>Prix Unitaire</th>
            <th>Prix Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $donnees['productCode'];?></td>
            <td><?= $donnees['productName'];?></td>
            <td><?= number_format($donnees['priceEach'], 2, ',', ' ');?></td>
            <td><?= number_format($donnees['prix_total'], 2, ',', ' ');?></td>
          </tr>
          <?php while ($donnees = $req->fetch()) :?>
            <tr>
              <td><?= $donnees['productCode'];?></td>
              <td><?= $donnees['productName'];?></td>
              <td><?= number_format($donnees['priceEach'], 2, ',', ' ');?></td>
              <td><?= number_format($donnees['prix_total'], 2, ',', ' ');?></td>
            </tr>
          <?php endwhile;
          $req->closeCursor();?>
        </tbody>

        <tfoot>
          <tr>
            <th colspan="2"></th>
            <th>Total HT :</th>
            <th>
              <?php
              $req->execute(array(
                'num' => $_GET['num']
              ));
              $somme = 0;
              while ($donnees = $req->fetch()) :
                $somme += $donnees['prix_total'];
              endwhile;
              echo number_format($somme, 2, ',', ' ') . '€';
              ?>
            </th>
          </tr>
          <tr>
            <th colspan="2"></th>
            <th>TVA :</th>
            <th><?= number_format($somme * TVA, 2, ',', ' ') . '€';?></th>
          </tr>
          <tr>
            <th colspan="2"></th>
            <th>Total TTC :</th>
            <th><?= number_format((($somme * TVA) + $somme), 2, ',', ' ') . '€';?></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
