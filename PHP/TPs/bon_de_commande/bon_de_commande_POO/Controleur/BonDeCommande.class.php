<?php

define('NUMCOMMANDE', $_GET['num']);

class BonDeCommande{

  private $_bdd;

  public function __construct($bdd){
    $this->setBdd($bdd);
  }

  public function setBdd(PDO $bdd){
    $this->_bdd = $bdd;
  }


  public function get_info(){
    $req = $this->_bdd->prepare('SELECT c.contactFirstName, c.contactLastName, c.addressLine1, c.addressLine2, c.city, c.phone, p.productCode, p.productName, od.priceEach, (od.priceEach*od.quantityOrdered) AS prix_total
      FROM customers c
      INNER JOIN orders o
      ON c.customerNumber = o.customerNumber
      INNER JOIN orderdetails od
      ON o.orderNumber = od.orderNumber
      INNER JOIN products p
      ON od.productCode = p.productCode
      WHERE o.orderNumber = :num
      ');

      $req->execute(array(
        'num' => NUMCOMMANDE
      ));

    return $req;
  }

  public function afficher_coordonnees(){
    $infos = $this->get_info();
    $donnees = $infos->fetch();
    ?>
    <p>Prénom : <?= $donnees['contactFirstName']; ?></p>
    <p>Nom : <?= $donnees['contactLastName']; ?></p>
    <p>Adresse 1 : <?= $donnees['addressLine1']; ?></p>
    <p>Adresse 2 : <?= $donnees['addressLine2']; ?></p>
    <p>Ville : <?= $donnees['city']; ?></p>
    <p>Téléphone : <?= $donnees['phone']; ?></p>
    <?php
    $infos->closeCursor();
  }

  public function afficher_bdc(){
    $infos = $this->get_info();
    while ($donnees = $infos->fetch()) :?>
      <tr>
        <td><?= $donnees['productCode'];?></td>
        <td><?= $donnees['productName'];?></td>
        <td><?= number_format($donnees['priceEach'], 2, ',', ' ');?></td>
        <td><?= number_format($donnees['prix_total'], 2, ',', ' ');?></td>
      </tr>
    <?php endwhile;
  }

  public function calcul_somme(){
    $infos = $this->get_info();
    $somme = 0;
    while ($donnees = $infos->fetch()) :
      $somme += $donnees['prix_total'];
    endwhile;
    return $somme;
  }

}

 ?>
