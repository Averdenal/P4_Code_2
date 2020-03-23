<?php


abstract class Model{
    private static $bdd;

    private static function setBdd1(){           
        self::$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');
    }
    private static function setBdd(){
        self::$bdd = new PDO('mysql:host=localhost;dbname=elipqfye_p4openclassrooms;charset=utf8', 'elipqfye_p4-certif', 'k00l1x@MPB');
    }
    
    protected function getBdd(){
        if(self::$bdd === null){
            self::setBdd();
        }
        return self::$bdd;
    }

}