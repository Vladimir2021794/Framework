<?php

namespace Core;

use mysqli;

class DB{

    private static $connect;


    public function __construct(){
        $config =  require 'config/db.php';
        self::$connect = new mysqli($config['host'], $config['login'], $config['password'], $config['dbname']);
    }


    static public function getConnect(){
        if(self::$connect == null){
            $config =  require 'config/db.php';
            self::$connect = mysqli_connect($config['host'], $config['login'], $config['password'], $config['dbname']);
        }
        return self::$connect;
    }


    static public function query($query, $params = []){
        $result = mysqli_query(self::getConnect(), $query);
        return $result;
    }

}