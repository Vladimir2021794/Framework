<?php

namespace Core;

use PDO;

class DB{

    private static $object;
    private static $con;

    public function __construct(){
        $config =  require 'config/db.php';
        self::$con =  new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['login'], $config['password']);
    }

    static public function connect(){
        if(self::$object == null){
            self::$object = new self;
        }
    }

    static public function query($sql, $params = []){
        self::connect();
        $stmt = self::$con->prepare($sql);
        if(!empty($params)){
            foreach($params as $key => $val){
                $stmt->bindValue(':'. $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

}