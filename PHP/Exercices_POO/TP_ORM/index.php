<?php
header('Content-Type: text/html; charset=utf-8');
include ('DB.php');
include ('Model.php');
include ('User.php');

$db = new DB;

$user = $db->queryOne('SELECT id,name FROM users WHERE id = ?', [1]);

var_dump($user);

$db = new DB;

$users = $db->query('SELECT id,name FROM users');

var_dump($users);

$db = new DB;

$db->execute("UPDATE users SET name= :name, updated_at = NOW() WHERE id = :id",
    ['name' => 'Toto', 'id' => 1]);


$user = new User;
$user->setName('JohnDoe')
    ->setEmail('MrNobody@domaine.com')
    ->setPassword('azertyuiop') // le mot de passe sera automatiquement cripté en blowfish
    ->setBirthday('1988-09-21');

$datas = $user->toArray();  // renvoi un tableau associatif
// affichera un tableau associatif avec seulement les 4 index suivants: 'name', 'email', 'password' et 'birthday'
var_dump($datas);


echo 'age : ' . $user->getAge() . '<br />';


$user = new User;
$user = $user->find(1);
var_dump($user);
// Version factorisée des 2 lignes ci-dessus:
// $user = (new User)->find(1);
echo $user->getName();  // Affichera le nom d'utilisateur de l'user ayant l'id = 1

$user = new User();

$user->setName("JohnDoe");
$user->setBirthday("1988-09-21");
$user->setEmail("MrNobody@domaine.com");
$user->setPassword("azertyuiop");

$user = $user->create();

var_dump($user);

$user->update();


// On souhaite récupérer les nformations associée à l'entrée de la table users avec l'id 5
$user = (new User)->find(5);

// On veut en suite modifier son nom d'utilisateur :
$user->setName("Charlie");

$user->update(); // Met à jour les informations associées à l'entrée de la table users avec l'id 5

var_dump($user);

// On veut récupérer toutes les entrées de la tableau users
$users = (new User)->findAll();  // Récupère toutes les entrées de la table users

// Puis on les liste:
foreach($users as $user){

    echo $user->getName() . '<br />';  // $user est un objet de la classe User on ne peut donc pas faire $user['name'] pour afficher le nom.

}