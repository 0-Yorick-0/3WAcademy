<?php
namespace System;

use PDO;

class DB{

    const DB_HOST = 'localhost';
    const DB_DATABASE = 'projet';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'troiswa';

    protected static $pdo = null;

    public function __construct(){
        if (static::$pdo == null){
            static::$pdo = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_DATABASE . ';charset=utf8',
                self::DB_USERNAME,
                self::DB_PASSWORD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
                );
        }
    }

    /**
     * @return null
     */
    public function getPdo()
    {
        return static::$pdo;
    }

    public function queryOne($sql, $values = []){
        $req = static::$pdo->prepare($sql);
        $req->execute($values);
        return $req->fetch();
    }

    public function query($sql, $values = []){
        $req = static::$pdo->prepare($sql);
        $req->execute($values);
        return $req->fetchAll();
    }

    public function execute($sql, $values = []){
        $req = static::$pdo->prepare($sql);
        $req->execute($values);

        return $this;
    }
}
