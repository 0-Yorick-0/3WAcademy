<?php
namespace System;

use System\DB;

use Projet\Models\User;

abstract class Model{

    protected $db;

    public function __construct($array = []){
        $this->db = new DB;

        if(!empty($array)){
            $this->hydrate($array);
        }
    }

    public function hydrate($array){
        foreach ($array as $key => $value) {
          $method = 'set' . ucfirst($key);
          if(method_exists($this, $method)){
              $this->$method($value);
          }
        }
        return $this;
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

    public function create($array = null){
        if(!empty($array)){
            $this->hydrate($array);
        }
        $db = $this->db;
        //retourne un tableau de toutes les clés d'un tableau
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
        $this->db->execute('UPDATE ' . static::TABLE .' SET ' . $values . ' , updated_at = NOW() WHERE id = :id', $this->toArray());
        return $this;
    }

    public function delete(){
        $this->db->execute('DELETE FROM ' . static::TABLE . ' WHERE id = ?', [$this->getId()]);
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

    public function findOneBy($column, $value){
      if(!array_key_exists($column, get_object_vars($this))){
        throw new \Exception("Le champ n'existe pas dans la table " . DB::DB_DATABASE, 1);
      }

      $req = $this->db->queryOne('SELECT * FROM ' . static::TABLE . ' WHERE ' . $column . ' = ? ', [$value]);
      return $this->getInstance($req);
    }

    public function getLast($number){

        if (is_int($number)) {
            $req = $this->db->query('SELECT * FROM ' . static::TABLE . ' ORDER BY created_at LIMIT 0, ' . $number  . '');
        
            return $this->getCollection($req);
        }
    }
}
