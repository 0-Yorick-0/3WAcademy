<?php
namespace Projet\Controllers;

use Projet\Models\User;  // On importe la classe User (à vous de résoudre le bug qui se produira lors de l'importation)

class UserController {


  // Listera tous les membres inscrits
  // @get: index.php/users
  public function index(){

    // Lister les utilisateurs dans le template contenu dans le dossier ressources/views/user/list.phtml
    $users = (new User)->findAll();

    $title = "Liste des membres :";

    $datas = compact('title', 'users');

    return view('user/list', $datas);

  }

  // Afficher le profil d'un utilisateur
  // @get: index.php/user/{id}
  public function show($id){  // $id est l'id de l'utilisateur dont on veut afficher le détail

    // Afficher les informations dans le template contenu dans le dossier ressources/views/user/profile.phtml
    $user = (new User)->findOneBy('id', $id);

    $title = "Profil de " . $user->getName();

    $datas = compact('title', 'user');
    // print_r($datas);
    return view('user/profile', $datas);

  }
}
