<?php
  include 'header.php';
  $tableau = 'directors';
  include '../Modele/requete.php';
?>

    <main class="container">

      <div class="row">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Date de naissance</th>
              <th>Note</th>
            </tr>
          </thead>
          <?php while ($donnees = $req->fetch()) :?>
          <tr>
            <td><?= $donnees['firstname']?></td>
            <td><?= $donnees['lastname']?></td>
            <td><?= $donnees['dob']?></td>
            <td><?= $donnees['note']?></td>
          </tr>
        <?php endwhile;?>
        </table>
      </div>

    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
