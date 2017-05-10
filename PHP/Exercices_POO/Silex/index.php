<?php
//index.php
require_once __DIR__.'/vendor/autoload.php'; // Fichier permettant de gérer l'autoloading au niveau de composer

$app = new Silex\Application();
$app['debug'] = true;

// Listes des routes:
$app->match('/hello', function () {  // L'url index.php/hello provoquera l'affichage de 'Hello Word'
  return 'Espèce de buse !';
});

$app->match('/page/{slug}', 'Projet\Controllers\PageController::show')
		->assert('slug','[\w]+');  // le paramètre d'url {slug} doit être composé de caractères alphanumérics

$app->run();
