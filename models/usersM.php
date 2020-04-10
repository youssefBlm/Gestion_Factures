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

    public function getOneUser($id)
    {
        $sql = "    SELECT *
                    FROM utilisateur
                    WHERE idUtilisateur =$id
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
    public function insertUser($user)
    {
        if (isset($user->status))
            $sql = "    INSERT INTO utilisateur (nom, prenom, login, mdp, e_mail, status) 
                        VALUES ('$user->nom','$user->prenom','$user->login',
                        '$user->mdp','$user->mail','$user->status')
                    ";
        else
            $sql = "    INSERT INTO utilisateur (nom, prenom, login, mdp, e_mail) 
                        VALUES ('$user->nom','$user->prenom','$user->login',
                        '$user->mdp','$user->mail')
                    ";
        try {
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function updateUsers($user)
    {
        if (isset($user->status))
        $sql = "    UPDATE utilisateur 
                    SET nom='$user->nom', prenom='$user->prenom', login='$user->login',
                     e_mail='$user->mail', status='$user->status' 
                    WHERE idUtilisateur='$user->id'
                ";
                else 
        $sql = "    UPDATE utilisateur 
                    SET nom='$user->nom', prenom='$user->prenom', login='$user->login',
                    e_mail='$user->mail'
                    WHERE idUtilisateur='$user->id'
            ";    


        try {
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function deleteUsers($id)
    {
        $sql = "    DELETE
                    FROM utilisateur
                    WHERE idUtilisateur =$id  
                ";
        try {
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
