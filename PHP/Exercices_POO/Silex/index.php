<?php
session_start();
//index.php
require_once __DIR__.'/vendor/autoload.php'; // Fichier permettant de gérer l'autoloading au niveau de composer


$app = new Silex\Application();
$app['debug'] = true;

// Listes des routes:
$app->match('/hello', function () {  // L'url index.php/hello provoquera l'affichage de 'Hello Word'
  return 'Espèce de buse !';
});

// $app->match('/pages/{slug}', 'Projet\Controllers\PageController::show')
// 		->assert('slug','[\w]+');  // le paramètre d'url {slug} doit être composé de caractères alphanumérics

$app->match('/pages/home', 'Projet\Controllers\PageController::index');

$app->match('/posts/create', 'Projet\Controllers\PostController::create');
// La méthode destroy ne pourra $etre appelée que via un envoi de formulaire avec method="post" et action="post/{id}/delete"
$app->post('post/{id}/delete','Projet\Controllers\PostController::destroy');  

$app->match('/user/{id}', 'Projet\Controllers\UserController::show')
    ->assert('id','[\d]+');  // le paramètre d'url {id} doit être composé de au moins un digit

$app->match('/users', 'Projet\Controllers\UserController::index');

$app->match('/register', 'Projet\Controllers\AuthController::register');

$app->match('/login', 'Projet\Controllers\AuthController::login');

$app->run();
