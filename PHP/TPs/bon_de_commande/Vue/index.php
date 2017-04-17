<?php
  include 'header.php';
  include '../Modele/connexion-bdd.php';
  include '../Controleur/info_commande.php';
?>

    <main class="container">

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <td>Commande</td>
            <td>Date de la commande</td>
            <td>Date de la livraison</td>
            <td>Statut</td>
          </tr>
        </thead>
        <tbody>
          <?php
          while($donnees = $req->fetch()):
            switch ($donnees['status']) {
              case 'Shipped':
                $label = 'success';
                break;
              case 'On Hold':
                $label = 'default';
                break;
              case 'Disputed':
                $label = 'warning';
                break;
              case 'Cancelled':
                $label = 'danger';
                break;
              case 'Resolved':
                $label = 'info';
                break;
              case 'In Process':
                $label = 'primary';
                break;
              default:
                  $label = 'default';
                break;
            }
          ?>
            <tr>
              <td><a href="commande.php?num=<?= $donnees['orderNumber'];?>"><?= $donnees['orderNumber']; ?></a></td>
              <td><?= $donnees['orderDate']; ?></td>
              <td><?= $donnees['shippedDate']; ?></td>
              <td><span class="label label-<?= $label ?>"><?= $donnees['status']; ?></span></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>

    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
