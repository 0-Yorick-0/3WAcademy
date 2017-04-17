<?php
class Proprietaire extends Occupant
{
  private $_date_achat;
  private $_budget;

  use Magical_Properties;

  public function payerActrice($somme, $actrice){
    $this->_budget -= $somme;
    $actrice->_capital += $somme;
  }
}
