<?php
class User{

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

    public function toArray(){
        //get_object_vars retourne un tab assoc avec les propriétés de l'objet, et array_filter élimine les entrées valant FALSE (comme null, '', 0 etc...)
        return array_filter(get_object_vars($this));
    }

    public function getInstance($datas){
        if ($datas){
            //static fait référence à la classe
            $user = new static;
            foreach ($datas as $key => $value) {
                $user->$key = $value;
            }
            return $user;
        }else{
            return null;
        }
    }

    public function find($id){
        $req = (new DB)->queryOne('SELECT * FROM ' . static::TABLE . ' WHERE id = ?', [$id]);
        var_dump($req);
        return $this->getInstance($req);
    }

    public function create(){
        $db = new DB;
        $columns = array_keys($this->toArray());
        $values = implode(", ", $columns);
        $variables = implode(", :", $columns);
        $db->execute('INSERT INTO ' . static::TABLE . ' (' . $values . ', created_at) VALUES (:' . $variables . ', NOW())', $this->toArray());
        return (new User)->find($db->getPdo()->lastInsertId());
    }

    public function update(){
        $columns = array_keys($this->toArray());
        unset($columns['id']);
        $values = array_map(function($v){
            return $v . '= :' . $v;
        }, $columns);
        $values = implode(", ", $values);
        (new DB)->execute('UPDATE users SET ' . $values . ' , updated_at = NOW() WHERE id = :id', $this->toArray());
        return $this;
    }

    public function findAll(){
        $req = (new DB)->query('SELECT * FROM ' . static::TABLE);
        return $this->getCollection($req);

    }

    public function getCollection($objects){
        $collection = [];
        foreach ($objects as $value){
            $collection[] = $this->getInstance($value);
        }
        return $collection;
    }
}