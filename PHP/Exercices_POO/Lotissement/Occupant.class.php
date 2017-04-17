<?php
class Occupant
{
  protected $_nom;
  protected $_prenom;
  protected $_statut;
  protected $_metier;
  protected $_capital;

  public function __construct($nom, $prenom, $metier, $statut){
    $this->_nom = $nom;
    $this->_prenom = $prenom;
    $this->_metier = $metier;
    $this->_statut = $statut;
  }

  use Magical_Properties;

  use getAndShowInfos;
}
