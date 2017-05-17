<?php
session_start();
//index.php
require_once __DIR__.'/vendor/autoload.php'; // Fichier permettant de gérer l'autoloading au niveau de composer


$app = new Silex\Application();
$app['debug'] = true;

// Listes des routes:

//PageConroller
$app->get('/', 'Projet\Controllers\PageController::index');

$app->match('/pages/home', 'Projet\Controllers\PageController::index');


//PostController
$app->match('/posts/create', 'Projet\Controllers\PostController::create');
// La méthode destroy ne pourra $etre appelée que via un envoi de formulaire avec method="post" et action="post/{id}/delete"
$app->post('post/{id}/delete','Projet\Controllers\PostController::destroy');  

$app->post('post/{id}/edit','Projet\Controllers\PostController::update');

$app->match('post/{id}', 'Projet\Controllers\PostController::show'); 


//CommentController
$app->post('comment/{id}', 'Projet\Controllers\CommentController::create');

$app->post('comment/{id}/delete', 'Projet\Controllers\CommentController::destroy');


//UserController
$app->match('/user/{id}', 'Projet\Controllers\UserController::show')
    ->assert('id','[\d]+');  // le paramètre d'url {id} doit être composé de au moins un digit

$app->match('/user/{id}/edit', 'Projet\Controllers\UserController::edit');

$app->match('/users', 'Projet\Controllers\UserController::index');


//AuthController
$app->match('/register', 'Projet\Controllers\AuthController::register');

$app->match('/login', 'Projet\Controllers\AuthController::login');

$app->match('/signout', 'Projet\Controllers\AuthController::signOut');

$app->run();