<?php
  include 'header.php';
  $tableau = 'films';
  include '../Modele/requete.php';
?>

    <main class="container">

      <div class="row">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Affiche</th>
              <th>Titre</th>
              <th>Date de sortie</th>
              <th>Note</th>
            </tr>
          </thead>
          <?php while ($donnees = $req->fetch()) :?>
          <tr>
            <td><img src="<?= $donnees['image']?>" alt="" style="max-width: 10%"></td>
            <td><?= $donnees['title']?></td>
            <td><?= $donnees['date_release']?></td>
            <td><?= $donnees['note_presse']?></td>
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
