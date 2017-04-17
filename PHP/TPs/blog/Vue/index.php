<?php include 'header.php';?>

    <main class="container">

      <div class="row">
        <form method="post" action="affichage_billets.php" class="col-md-6">
          <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
            <?php
              if ($_GET['titre'] == 'vide'):?>
              <p>Met donc un titre</p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="titre">Auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Votre nom" required>
            <?php
              if ($_GET['auteur'] == 'vide'):?>
              <p>Met donc ton nom</p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" rows="8" cols="65" required></textarea>
            <?php
              if ($_GET['contenu'] == 'vide'):?>
              <p>Met donc un contenu</p>
            <?php endif; ?>
          </div>
          <!-- Radios -->
          <div class="radio">
            <label>
              <input type="radio" name="categorie" id="sympa" value="1" checked>
              sympa
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="categorie" id="pasCool" value="2">
              pas cool
            </label>
          </div>
          <div class="radio disabled">
            <label>
              <input type="radio" name="categorie" id="vraimentPasCool" value="3">
              vraiment pas cool
            </label>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>

    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
