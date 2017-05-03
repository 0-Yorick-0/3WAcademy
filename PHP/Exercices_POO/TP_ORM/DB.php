<?php
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
                self::DB_PASSWORD
                );
        }
    }
}