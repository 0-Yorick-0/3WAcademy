<?php
  include 'header.php';
  include_once '../Modele/connexion-bdd.php';
  // include '../Controleur/commande_req.php';
  include '../Controleur/BonDeCommande.class.php';
  $bon_de_commande = new BonDeCommande($bdd);
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
            <?php
              $bon_de_commande->afficher_coordonnees();
            ?>
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
            <?php $bon_de_commande->afficher_bdc();?>
        </tbody>

        <tfoot>
          <tr>
            <th colspan="2"></th>
            <th>Total HT :</th>
            <th>
              <?php
              $somme = $bon_de_commande->calcul_somme();
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
