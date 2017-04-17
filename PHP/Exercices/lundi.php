<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

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

    <h2>Exercice : Variables</h2>
<?php
  $adresse = '110 Rue de la mort';
  $cp = 69100;
  $ville = 'Villeurdead';
  $pays = 'Franchouillard';
  $coordonnees = array(
    'longitude' => '45',
    'lattitude' => '4.8'
  );
  $villeurdead = '<img src="http://orig11.deviantart.net/18e0/f/2010/328/c/f/apocalypse_by_sethpda-d33hvxo.jpg" alt="villeurdead" style="width:50%"/>';
?>

<div class="panel panel-default col-md-6">
  <!-- Default panel contents -->
  <div class="panel-heading">Exercice 0</div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">Adresse :<?php echo $adresse ?></li>
    <li class="list-group-item">Code Postale : <?php echo $cp ?></li>
    <li class="list-group-item">Ville : <?php
      if ($ville == 'Villeurdead'){
        echo 'Villeurdead :' . $villeurdead;
      }
    ?></li>
    <li class="list-group-item">Pays :<?php echo $pays ?></li>
    <li class="list-group-item">Coordonnees : <?php
      foreach ($coordonnees as $key => $elt) {
        echo $key . ' : ' . $elt . '<br />';
      }
     ?></li>
  </ul>
</div>

  <div class="clearfix"></div>

  <h2>Les Tableaux :</h2>

    <?php $ingredients = array('vieux café crade', 'biscuits écrasés', 'insectes morts', 'vomi de chaton tout mignon', 'cheescake');?>

    <ul class="list-group col-md-6">
      <?php
        foreach ($ingredients as $elt) {
          ?><li class="list-group-item"><?php
            if($elt == 'cheescake'){
              echo $elt . ', vraiment dégueu';
            }else{
              echo $elt;
            }
          ?></li><?php
        }
      ?>
    </ul>

    <div class="clearfix"></div>

    <h2>Les Tableaux Associatifs</h2>

    <?php

    $infosTrois = array('Duboulet', 'Jeannine', 'jeannineduboulet@gmail.com');
    $tagsTrois = array('1', '2', '3', '4');
    $articleTrois = array(
      'titre' => 'numéro 3',
      'résumé' => 'bah voilà...',
      'description' => '<p>Voici une description qui claque des culs</p>',
      'catégorie' => 'article',
      'note' => 15,
      'image' => 'http://www.tasse-toi.com/images/t/tel/telephone-gonflable-geant.jpg',
      'tags' => $tagsTrois,
      'infosAuteur' => $infosTrois
    );

    $infosDeux = array('Dugravos', 'Ambroise', 'ambroisedugravos@gmail.com');
    $tagsDeux = array('1', '2', '3', '4');
    $articleDeux = array(
      'titre' => 'numéro 2',
      'résumé' => 'bah voilà...',
      'description' => '<p>Voici une description qui claque des culs</p>',
      'catégorie' => 'article',
      'note' => 9,
      'image' => 'http://www.tasse-toi.com/images/t/tel/telephone-gonflable-geant.jpg',
      'tags' => $tagsDeux,
      'infosAuteur' => $infosDeux
    );

      $infosUn = array('Dugland', 'Robert', 'robertdugland@gmail.com');
      $tagsUn = array('1', '2', '3', '4');
      $articleUn = array(
        'titre' => 'numéro 1',
        'résumé' => 'bah voilà...',
        'description' => '<p>Voici une description qui claque des culs</p>',
        'catégorie' => 'article',
        'note' => 7,
        'image' => 'http://www.tasse-toi.com/images/t/tel/telephone-gonflable-geant.jpg',
        'tags' => $tagsUn,
        'infosAuteur' => $infosUn
      );

      $articles = array($articleUn, $articleDeux, $articleTrois);

      ?>
      <div class="col-md-6">
      <?php
      foreach ($articles as $key) {
        if ($key['note'] < 8) {
          $background = 'danger';
        }else if($key['note'] > 8 AND $key['note'] < 10 ){
          $background = 'warning';
        }else{
          $background = 'success';
        }
        ?>
        <h3>Tableau</h3>
        <div class="panel alert-<?php echo  $background; ?>">
          <div class="panel-body">
            <?php
            foreach ($key as $newKey => $value) {
              if ($newKey == 'tags' || $newKey == 'infosAuteur') {
                foreach ($value as $keyTag) {
                  echo $keyTag . '<br />';
                }
              }else{
                echo  $newKey . ' : ' . $value . '<br />';
              }
            }?>
        </div>
      </div>
    <?php
      }
      ?>
    </div>

    <div class="clearfix"></div>

    <h2>Exercice 3: Les Fonctions</h2>

    <?php
      function supprimerEspace($string)
      {
        $newString = str_replace(' ', '', $string);
        echo $newString;
      }

      supprimerEspace('Voici une phrase sans espace');

    ?>

    <h2>Exercice 3: Les Fonctions</h2>

    <?php
      function afficherMessage($message, $icone, $h = 'h3', $class = 'warning'){

        $alert = '<div class="alert alert-' . $class . '" role="alert"><img src="' . $icone . '" style="width:100px; border-radius:100%"/> <' . $h .'>' . $message .'</' . $h .'></div>';
        echo $alert;
      }

      afficherMessage('Yo!','http://www.gablescinema.com/media/filmassets/slides/big_lebowski_12.jpg.420x330_q85_crop-smart.jpg', 'h1', 'danger');
    ?>

    <h2>Exercice 4: Les Fonctions</h2>

    <?php
      function afficherDate($date){
        $phrase = 'Le ' . $date['jour'] . ' ' . $date['mois'] . ' ' . $date['année'] . ' à ' . $date['heure'] . 'h' . $date['minutes'];
        echo $phrase;
      }

      $date = array(
        'année' => '2016',
        'mois' => 'Mars',
        'jour' => '16',
        'heure' => '20',
        'minutes' => '50'
      );

      afficherDate($date);
    ?>

    <h2>Exercice 5: Les Fonctions</h2>

    <?php
      function compterMots($array){
        $somme = 0;
        foreach ($array as $key) {
          $nbMot = str_word_count($key);
          $somme += $nbMot;
        }
        echo 'Le tableau ' . $array . ' contient ' . $somme . ' mots.';
      }

      $tabMots = array(
        'Le monde se divise en deux parties',
        'ceux qui ont un pistolet chargé et ceux qui creusent',
        'toi, tu creuses'
      );

    ?>

    <div class="alert alert-success" role="alert"><?php compterMots($tabMots); ?></div>

    <h2>Exercice 5: Les Fonctions</h2>

    <?php
      function capitalizeName($array){
        foreach ($array as $key) {
          $motCapitalized = '<p>' . ucfirst($key) . '</p>';
          echo '<li>' . $motCapitalized . '</li>';
        }
      }

      $tabNames = ['edmond', 'eusèbe', 'sigismond'];

    ?>

    <div class="alert alert-success">
      <ul>
        <?php capitalizeName($tabNames); ?>
      </ul>
    </div>

    <h3>Exercice 5: Deuxième partie</h3>

    <?php
      function totalPrix($array){
        $somme = 0;
        $moyenne = 0;
        foreach ($array as $produit) {
            $somme += $produit['prix'];
        }
        echo 'La somme des prix vaut ' . $somme . ' et  la moyenne est : ' . $somme / count($array);
      }

      $produits =[
				[
				"titre" => "Produit1",
				"description" => "description1",
				"quantite" => 1,
				"prix" => 3
				],
				[
					"titre" => "Produit2",
					"description" => "description2",
					"quantite" => 1,
					"prix" => 4
				],
				[
					"titre" => "Produit3",
					"description" => "description3",
					"quantite" => 1,
					"prix" => 5
				],
				[
					"titre" => "Produit4",
					"description" => "description4",
					"quantite" => 1,
					"prix" => 6
				],
				[
					"titre" => "Produit5",
					"description" => "description5",
					"quantite" => 1,
					"prix" => 7
				]
		];


    ?>

    <div class="panel panel-primary">
  <div class="panel-body">
    <?php totalPrix($produits) ?>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
