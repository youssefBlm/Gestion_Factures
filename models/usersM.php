<?php

require_once CLASSES . DS . 'db.php';

class UsersModel
{

    public function construct()
    {
    }

    public function verifyUser($login, $passe)
    {
        $sql = "    SELECT nom,prenom,status
                    FROM utilisateur
                    WHERE login='$login' 
                    AND mdp = $passe
                    AND status IS NOT NULL
                 ";
        try {
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetch();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function listAllUsers()
    {
        $sql = "    SELECT *
                    FROM utilisateur
                ";
        try {
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function listInvalideUsers()
    {
        $sql = "    SELECT *
                    FROM utilisateur
                    WHERE status IS NULL
                ";
        try {
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function listValideUsers()
    {
        $sql = "    SELECT *
                    FROM utilisateur
                    WHERE status IS NOT NULL
                ";
        try {
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function listCommUsers()
    {
        $sql = "    SELECT *
                    FROM utilisateur
                    WHERE status ='com'
                ";
        try {
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
