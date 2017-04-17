<?php

class ListeBDC
{
  private $_label;
  private $_bdd;

  public function __construct($bdd){
    $this->setBdd($bdd);
  }

  public function setBdd(PDO $bdd){
    $this->_bdd = $bdd;
  }

  public function test_status($status){
    switch ($status) {
      case 'Shipped':
        $label = 'success';
        break;
      case 'On Hold':
        $label = 'default';
        break;
      case 'Disputed':
        $label = 'warning';
        break;
      case 'Cancelled':
        $label = 'danger';
        break;
      case 'Resolved':
        $label = 'info';
        break;
      case 'In Process':
        $label = 'primary';
        break;
      default:
          $label = 'default';
        break;
    }

    $this->_label = $label;

    return $this->_label;
  }

  public function get_info(){
    $req = $this->_bdd->query('SELECT orderNumber, orderDate, shippedDate, status FROM orders ORDER BY orderNumber DESC');

    return $req;
  }

  public function display_List(){
    $info = $this->get_info();
    while($donnees = $info->fetch()):
      $label = $this->test_status($donnees['status']);?>
      <tr>
        <td><a href="commande.php?num=<?= $donnees['orderNumber'];?>"><?= $donnees['orderNumber']; ?></a></td>
        <td><?= $donnees['orderDate']; ?></td>
        <td><?= $donnees['shippedDate']; ?></td>
        <td><span class="label label-<?= $label ?>"><?= $donnees['status']; ?></span></td>
      </tr>
    <?php endwhile;

  }
}
?>
