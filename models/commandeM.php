<?php

require_once CLASSES . DS . 'db.php';

class CommandeModel
{
    public function construct()
    {
    }

    public function getAllCommandes()
    {
        $sql = "    SELECT *
                    FROM client AS c
                    INNER JOIN 	adresse AS a ON c.idAdresse = a.idAdresse
                    INNER JOIN 	codepostale_ville AS cv ON a.CodePostale = cv.CodePostale
                                       
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
    public function getOneClient($id)
    {
        $sql = "    SELECT *
                    FROM client AS c
                    INNER JOIN 	adresse AS a ON c.idAdresse = a.idAdresse
                    INNER JOIN 	codepostale_ville AS cv ON a.CodePostale = cv.CodePostale
                    WHERE c.idClient = $id
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

    public function insertadresse($addr, $cPost)
    {
        $sql = "    INSERT INTO adresse(Adresse, CodePostale) 
                    VALUES ('$addr','$cPost')
                    ";

        try {
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return Database::getBdd()->lastInsertId();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function insertCommande($client)
    {
        $sql = "    INSERT INTO client(nom, prenom, numero_Tel, e_mail, sexe, date_Naissance, idAdresse)
                    VALUES ('$client->nom','$client->prenom','$client->numero',
                    '$client->mail','$client->sexe','$client->dateN','$client->idAdresse')
                    ";

        try {
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function updateClient($user)
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

    public function deleteClient($id)
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

    public function getAllcodesP()
    {
        $sql = "    SELECT CodePostale
                    FROM codepostale_ville                                    
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
