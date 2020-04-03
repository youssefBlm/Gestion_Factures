<?php

require_once CLASSES . DS . 'db.php';

class BddModel
{

    public function construct()
    {
    }

    public function createBdd($filesql)
    {
        try {
            Database::getBdd();
            echo "votre base exist deja";
        } catch (PDOException $e) {

            $query = file_get_contents($filesql);
            $array = explode(";", $query);

            $b = true;
            for ($i = 0; $i < count($array); $i++) {
                $str = $array[$i];
                if ($str != '') {
                    try {
                        $req = Database::newBdd()->prepare($str);
                        $req->execute();
                    } catch (PDOException $e) {
                        print "Erreur !: " . $e->getMessage() . "<br/>";
                        die();
                    }
                }
            }
            echo "every things structure is done";
        }
    }
    public function insertData($filesql)
    {
        try {
            Database::getBdd();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

        
        $query = file_get_contents($filesql);
        $array = explode(";", $query);

        $b = true;
        for ($i = 0; $i < count($array); $i++) {
            $str = $array[$i];
            if ($str != '') {
                try {
                    $req = Database::newBdd()->prepare($str);
                    $req->execute();
                } catch (PDOException $e) {
                    print "Erreur !: " . $e->getMessage() . "<br/>";
                    die();
                }
            }
        }
        echo "every things data is done";
    }
}
