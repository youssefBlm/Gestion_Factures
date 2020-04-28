<?php

require_once CLASSES . DS . 'db.php';

class CommandeModel
{
    public function construct()
    {
    }

    public function getAllProduits()
    {
        $sql = "    SELECT 	*
                    FROM article AS a
                    INNER JOIN 	solde_article AS sa ON sa.idSolde_Article = a.idSolde_Article
                    INNER JOIN 	marque AS m ON m.idMarque = a.idMarque
                    
                                       
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

    public function getAllProduitsC($m)
    {
        $sql = "    SELECT 	*
                    FROM article AS a
                    INNER JOIN 	solde_article AS sa ON sa.idSolde_Article = a.idSolde_Article
                    INNER JOIN 	marque AS m ON m.idMarque = a.idMarque
                    INNER JOIN 	aticle_livraison AS av ON  a.idArticle  = av.idArticle
                    WHERE a.idArticle IN (".implode(',',$m).")
                                       
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
    }public function getLastCommande()
    {
        $sql = "    SELECT MAX(numero_Commande) AS last 
                    FROM commande
                                       
                ";
        try {
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetch()['last'];
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
   

    public function insertCommande($commande)
    {
        $sql = "    INSERT INTO commande(date_Commande,numero_Tel,e_mail,idMode_Commande,idclient,idRemise)
                    VALUES ('$commande->date','$commande->numero',
                    '$commande->mail','$commande->mode','$commande->client','$commande->remise')
                    ";

        try {
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function insertPanier($articl,$commande, $qte)
    {
        $sql = "    INSERT INTO  articles_commande(idArticle, numero_Commande, qte_Commande) 
                    VALUES ('$articl','$commande','$qte')
                    ";

        try {
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function insertLivraison($livraison)
    {
        $sql = "    INSERT INTO livraison(delai_Livraison, numero_Commande, idAdresse, idMode_Livraison, idMagasin)
                    VALUES ('$livraison->delai','$livraison->commande',
                    '$livraison->adrr','$livraison->mode','$livraison->magasin')
                    ";

        try {
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function chercheRemise($code)
    {
        $sql = "    SELECT 	*
                    FROM remise 
                    WHERE code_Remise = '$code'

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


    public function getAllMagasins()
    {
        $sql = "    SELECT 	idMagasin,lib_Magasin
                    FROM magasin                                  
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


}
