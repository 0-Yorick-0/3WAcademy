<?php

namespace Projet\Controllers;

use Projet\Models\User;

class AuthController{

  protected $user;

  //on instancie automatiquement la classe User pour pouvoir utiliser ses proprietés sans l'instancier à chaque fois
  public function __construct(){
      $this->user = new User;
  }

  public function register(){

    $title = 'Formulaire d\'inscription'; 

    $errors = []; 

    if (!empty($_POST)) {

      extract($_POST);

      $birthday = $year . '-' . monthFormat($month) . '-' . $day;

      $errors = [];

      if(strlen($name) < 3 || strlen($name) > 20){
        $errors[] = 'Le nom doît être compris entre 3 et 20 caractères';
      }

      if(!ctype_alnum($name)){
        $errors[] = 'Le nom doît contenir uniquement des caractères alphanumériques';
      }

      if($name == $this->user->findOneBy('name', $name)){
        $errors[] = 'Le nom est déjà pris';
      }

      if(strlen($password) < 8){
        $errors[] = 'Le mot de passe doît faire au moins 8 caractères';
      }

      if($email == $this->user->findOneBy('email', $email)){
        $errors[] = 'Le mail est déjà pris';
      }
      
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Le mail n\'est pas valide';
      }

      if(empty($errors)){

        $this->user->create($_POST);
        redirect('login');
      }
    }

    $datas = compact('errors', 'title');      

    return view('auth/register', $datas);
       
  }

  public function login(){
    
    $title = 'Login';

    $errors = [];

    if (!empty($_POST)){

      extract($_POST);

      $user = $this->user->findOneBy('name', $name);

      if(!$user || !password_verify($password, $user->getPassword())){
        $errors[] = 'Le nom ou le mot de passe ne correspondent pas';
      }else{
        $_SESSION['userId'] = $user->getId();
        redirect('posts/create');
      }
    }

    $datas = compact('title', 'errors');

    return view('auth/login', $datas);
  }
}
