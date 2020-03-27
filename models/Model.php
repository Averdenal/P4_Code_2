<?php


abstract class Model{
    private static $bdd;

    private static function setBdd(){
        self::$bdd = new PDO('mysql:host=localhost;dbname=elipqfye_p4openclassrooms;charset=utf8', 'elipqfye_p4-certif', 'U8l}0=s!!de;$GNKV2');
    }
    
    protected function getBdd(){
        if(self::$bdd === null){
            self::setBdd();
        }
        return self::$bdd;
    }

}