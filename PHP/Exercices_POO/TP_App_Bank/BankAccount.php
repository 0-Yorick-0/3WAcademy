<?php
class BankAccount{

    protected $owner;
    protected $balance;

    public function __construct($balance){
        $this->checkAmount($balance);
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    public function addCash($amount){
        $this->checkAmount($amount);
        $this->balance += $amount;

        return $this;
    }

    public function withdraw($amount){
        $this->checkAmount($amount);
        if($amount > $this->balance){
            throw new Exception('T\'as pas assez mec !');
        }else{
            $this->balance -= $amount;
        }
        return $this;
    }

    protected function checkAmount($amount){
        if (!($amount > 0 && is_int($amount))){
            throw new Exception('Le montant doît être supérieur ou égal à 0 et être un nombre');
        }
    }
}