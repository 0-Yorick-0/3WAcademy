<?php

  include '../Controleur/reception_form.php';
  include '../Vue/header.php';

  // $reponse = $bdd->query('SELECT * FROM articles ORDER BY dob DESC LIMIT 0, 5');

  $reponse = $bdd->query('SELECT a.id, a.titre, a.contenu, a.dob, c.categorie, au.nom
     FROM categories AS c
     INNER JOIN articles AS a
     ON c.id = a.id_categorie
     INNER JOIN auteur AS au
     ON au.id = a.id_auteur
     ORDER BY dob
     DESC LIMIT 0, 5');

  while($donnees = $reponse->fetch()):?>

  <div class="container">
    <div class="row">
      <div class=" col-md-6 col-md-push-3">

      <div class="panel panel-default">
        <div class="panel-heading panel-primary">
          <h3 class="panel-title"><?= '#' . $donnees['id'] . ' ' . htmlspecialchars($donnees['titre']);?></h3>
        </div>
        <div class="panel-body">
          <p><?= htmlspecialchars($donnees['contenu']);?></p>
          <p>Auteur : <?= htmlspecialchars($donnees['nom']); ?></p>
        </div>
        <div class="panel-footer"><span><?= htmlspecialchars($donnees['dob']);?></span><span class="pull-right"><?= htmlspecialchars($donnees['categorie']);?></span></div>
      </div>

      </div>
    </div>
  </div>

<?php endwhile;
  $reponse->closeCursor();
?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
