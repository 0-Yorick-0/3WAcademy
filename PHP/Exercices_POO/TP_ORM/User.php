<?php
class User extends Model{

    const TABLE = 'users';

    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $birthday;
    protected $updated_at;
    protected $created_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password , PASSWORD_BCRYPT);
        $this->password = $hashedPassword;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getAge(){
        // $userBirthday  contiendra une instance de la classe DateTime correspondant à la date d'anniversaire.
        // Cette classe est nativement par PHP et permet de manipuler des dates
        $userBirthday = new DateTime($this->birthday);
        // $today contiendra une instance de la classe DateTime correspondant à la date d'aujourd'hui
        $today = new DateTime("NOW");

        // On va récupérer la différence en années entre la date d'aujourd'hui et la date d'anniversaire de l'utilisateur
        // La propriété "y" signifie qu'on souhaite avoir le résultat de la différence en année
        return $age = $today->diff($userBirthday)->y;
    }
}