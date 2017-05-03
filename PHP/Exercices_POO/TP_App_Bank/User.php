<?php
class User{

    protected $name = "";
    protected $bankAccounts = [];
    protected $currentBankAccount;

    public function getName(){
        return ucfirst($this->name);
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getBankAccounts()
    {
        return $this->bankAccounts;
    }


    /**
     * @return mixed
     */
    public function getCurrentBankAccount()
    {
        return $this->currentBankAccount;
    }

    public function setCurrentBankAccount(BankAccount $bankAccount){
        $this->currentBankAccount = $bankAccount;
        return $this;
    }

    public function addBankAccount(BankAccount $bankAccount){
        //Ajout du compte dans la liste
        $this->bankAccounts[] = $bankAccount;
        //Le dernier compte ajouté devient le compte courant
        $this->setCurrentBankAccount($bankAccount);
        //on lie le compte avec l'utilisateur courant
        $bankAccount->setOwner($this);
    }

    public function getTotalCash(){
        $sum = 0;
        foreach ($this->bankAccounts as $bankAccount){
            $sum += $bankAccount->getBalance();
        }
        return $sum;
    }

    public function sendMoneyTo(User $user, $amount){
        $user->getCurrentBankAccount()->addCash($amount);
        $this->currentBankAccount->withdraw($amount);
        return $this;
    }

}