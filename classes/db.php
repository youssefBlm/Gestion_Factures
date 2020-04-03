<?php

class Database
{
    private static $bdd = null;

    private function __construct() {
    }

    public static function getBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=facture_db", 'root', '');
        }
        return self::$bdd;
    }
    public static function createBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost", 'root', 'sirine');
        }
        return self::$bdd;
    }
}
?>