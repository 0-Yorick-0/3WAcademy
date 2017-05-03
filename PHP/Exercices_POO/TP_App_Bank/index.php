<?php
header('Content-Type: text/html; charset=utf-8');
// On charge la classe User et BankAccount:
include('User.php');
include('BankAccount.php');

try{
    // On créé une instance de la classe User
    $picsou = new User();
    $picsou->setName('Balthazar');

// On créé une première instance de la classe BankAccount
    $bankAccount1 = new BankAccount(10000);  // On ajoute 10.000€ à ce compte en banque lors de sa création

// On créé une première instance de la classe BankAccount
    $bankAccount2 = new BankAccount(50000); // On ajoute 50.000€ à ce compte en banque  lors de sa création


// Ajout des 2 comptes en banque à l'utilisateur $user1:
    $picsou->addBankAccount($bankAccount1);
    $picsou->addBankAccount($bankAccount2);

    echo $bankAccount1->getOwner()->getName() . '</br>';  // Doit afficher 'Balthazar';
    echo count($picsou->getBankAccounts()). '</br>';  // doit afficher 2
    echo $picsou->getCurrentBankAccount()->getBalance(). '</br>';  // Doit afficher 50000;

    echo $picsou->getTotalCash(). '</br>';  // Affiche 60 000 (car 10 000 + 50 000 = 60 000)

// On simule un retrait de 1 000€ sur le compte courant de l'utilisateur 1:
    $picsou->getCurrentBankAccount()->withdraw(1000);
    echo $picsou->getCurrentBankAccount()->getBalance(). '</br>'; // Affiche 49 000


// On simule un ajout de 3 000€ sur le compte courant de l'utilisateur 1:
    $picsou->getCurrentBankAccount()->addCash(3000);
    echo $picsou->getCurrentBankAccount()->getBalance(). '</br>'; // Affiche 52 000


// ETAPE 4

    $john = new User();
    $john->setName('johnDoe');

    $bankAccount3 = new BankAccount(18000);

    $john->addBankAccount($bankAccount3);

// On simule un transfère d'argent entre $john et $picsou:
    $john->sendMoneyTo($picsou,8000);  // $john donne 8 000€ à $picsou

    echo $picsou->getCurrentBankAccount()->getBalance(). '</br>'; // Affiche 60 000  (car 52 000 + 8 000 = 60 000)
    echo $john->getCurrentBankAccount()->getBalance(). '</br>'; // Affiche 10 000  (car 18 000 - 8 000 = 10 000)

    // ETAPE 5:

    $toto = new User();

    $tata = new User();

    $bankAccount1 = new BankAccount(1000);
    $bankAccount2 = new BankAccount(2000);

    $toto->addBankAccount($bankAccount1);
    $tata->addBankAccount($bankAccount2);

    // Doit provoquer l'affichage d'une erreur car Toto n'a que 1 000€ sur son compte et ne peut donc pas envoyer 3 000€
    $toto->sendMoneyTo($tata,3000);
}catch (Exception $e){
    echo '<div class="alert alert-danger">
                <p>Message: '.  $e->getMessage() .'</p>
                <p>Fichier: '. $e->getFile() .'</p>
                <p>Numéro de ligne: '. $e->getLine().'</p>
          </div>';
}

