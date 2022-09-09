<?php

namespace Core;

class DB{

    private static $connect;

    public function __construct(){
        $config =  require 'config/db.php';
        self::$connect =  mysqli_connect('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['login'], $config['password']);
    }

    static public function getConnect() {
        if(is_null(self::$connect)){
            self::$connect = new self();
        }
        return self::$connect;
    }

    // static public function query($sql, $params = []){
    //     self::$connect;
    //     $stmt = self::$connect->prepare($sql);
    //     if(!empty($params)){
    //         foreach($params as $key => $val){
    //             $stmt->bindValue(':'. $key, $val);
    //         }
    //     }
    //     $stmt->execute();
    //     return $stmt;
    // }

}