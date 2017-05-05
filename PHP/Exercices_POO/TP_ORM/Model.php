<?php
abstract class Model{

    protected $db;

    public function __construct(){
        $this->db = new DB;
    }

    public function toArray(){
        //get_object_vars retourne un tab assoc avec les propriétés de l'objet, et array_filter élimine les entrées valant FALSE (comme null, '', 0 etc...)
        $array = get_object_vars($this);
        unset($array['db']);

        return array_filter($array);
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
        $req = $this->db->queryOne('SELECT * FROM ' . static::TABLE . ' WHERE id = ?', [$id]);
        return $this->getInstance($req);
    }

    public function create(){
        $db = $this->db;
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
        $this->db->execute('UPDATE users SET ' . $values . ' , updated_at = NOW() WHERE id = :id', $this->toArray());
        return $this;
    }

    public function findAll(){
        $req = $this->db->query('SELECT * FROM ' . static::TABLE);
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