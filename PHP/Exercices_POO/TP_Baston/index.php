<?php
header('Content-Type: text/html; charset=utf-8');
include('Perso.php');
try {

    $warrior = new Perso('Warrior',100,30);  // On créé une isntance de la classe Perso qui aura comme propriété $name = Warrior, $pv = 100, $force = 30

    $destructor = new Perso('Desctructor',90,40);  // On créé une deuxième instance de la classe Perso qui aura comme propriété $name = Destructor, $pv = 90, $force = 40

    // Destructor va frapper Warrior une fois (Warrior va donc prendre 40 points de dégat et il lui restera 60pv)
    $destructor->frapper($warrior);

    // On affiche la pv de Warrior
    echo 'Il reste '.$warrior->getPv().' PV à Warrior';  // affichera 60

    // Warrior va frapper Destructor 2 fois (Destructor va donc prendre 2 x 30 points de dégat et il lui restera 30pv):
    $warrior->frapper($destructor)
            ->frapper($destructor)
            ->frapper($destructor);


    echo 'Il reste '.$destructor->getPv().' PV à Destructor';


}catch (Exception $e){
    // Affichera le message passé en paramètre de la classe Exception (c à d le verdicte du combat)
    echo $e->getMessage().'<br/>';
    // renvoi le nom du ficheir à l'origine de 'lexception
    echo $e->getFile().'<br/>';
    // renvoi le numéro de la ligne ayant provoqué l'exception
    echo $e->getLine().'<br/>';
}