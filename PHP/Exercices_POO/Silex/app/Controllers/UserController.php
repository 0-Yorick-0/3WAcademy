<?php
namespace Projet\Controllers;

use Projet\Models\User;  

use Projet\Models\Post;

class UserController extends \System\Controller{


  // Listera tous les membres inscrits
  // @get: index.php/users
  public function index(){

    // Lister les utilisateurs dans le template contenu dans le dossier ressources/views/user/list.phtml
    $users = (new User)->findAll();

    $title = "Liste des membres :";

    $datas = compact('title', 'users');

    return $this->view('user/list', $datas);

  }

  // Afficher le profil d'un utilisateur
  // @get: index.php/user/{id}
  public function show($id){  // $id est l'id de l'utilisateur dont on veut afficher le détail

    // Afficher les informations dans le template contenu dans le dossier ressources/views/user/profile.phtml
    $user = (new User)->find($id);

    $posts = (new Post)->getAllFromAuthor($id);

    $title = "Profil de " . $user->getName();

    $datas = compact('title', 'user', 'posts');
    // print_r($datas);
    return $this->view('user/profile', $datas);

  }

  public function edit(){

    $title = 'Modifier votre profil';

    $errors = [];

    if(!empty($_POST['name'])){

      $errors = $this->editInfos();
    }

    if(!empty($_POST['password'])){

      $errors = $this->editPassword();
    }

    $datas = compact('title', 'errors');

    return $this->view('user/edit', $datas);
  }

  public function editInfos(){

      extract($_POST);
  
      if(strlen($name) < 3 || strlen($name) > 20){
        $errors[] = 'Le nom doît être compris entre 3 et 20 caractères';
      }

      if(!ctype_alnum($name)){
        $errors[] = 'Le nom doît contenir uniquement des caractères alphanumériques';
      }

      if($this->getUser()->getName() !== $name && $name == (new User)->findOneBy('name', $name)){
        $errors[] = 'Le nom est déjà pris';
      }

      if($this->getUser()->getEmail() !== $email && $email == (new User)->findOneBy('email', $email)){
        $errors[] = 'Le mail est déjà pris';
      }
      
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Le mail n\'est pas valide';
      }

      if(empty($errors)){
        $this->getUser()->hydrate($_POST)
                        ->update();
        redirect('user/' . $_SESSION['userId']);
      }

      return $errors;
  }

  public function editPassword(){

      extract($_POST);

      if(!password_verify($password, $this->getUser()->getPassword())){
      $errors[] = 'l\'ancien mot de passe n\'est pas valide';
      }

      if($newpassword !== $confirmpassword){
      $errors[] = 'erreur dans la confirmation de mot de passe';
      }

      if(strlen($password) < 8){
      $errors[] = 'Le mot de passe doît faire au moins 8 caractères';
      }

      if(empty($errors)){
        $this->getUser()->setPassword($newpassword)
                        ->update();
        redirect('user/' . $_SESSION['userId']);
      }

      return $errors;
  }

}
