<?php
require 'Lotissement.class.php';

class Maison extends LotissementAbstract
{
    private $_nb_pieces;
    private $_superficie;
    private $_etage;
    private $_jardin;
    private $_nb_occupant;
    private $_numero = 12;
    private $_prix;
    private $_piscine;

    public function __construct($piece, $superficie, $etage, $jardin, $occupant, $prix, $piscine = false)
    {
        $this->_nb_pieces = $piece;
        $this->_superficie = $superficie;
        $this->_etage = $etage;
        $this->_jardin = $jardin;
        $this->_nb_occupant = $occupant;
        $this->_prix = $prix;
        $this->_piscine = $piscine;
    }

    use Magical_Properties;

    use getAndShowInfos;

}
