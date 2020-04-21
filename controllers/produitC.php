<?php
class ProduitController
{
    public function construct()
    {
    }

    public function listOfProduits()
    {
        require_once MODELS . DS . 'produitM.php';
        $m = new ProduitModel();
        $produits = $m->getAllproduits();
        //var_dump($produits);
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('produitslist', $produits);
        $v->render('produits', 'listproduits');
    }
    public function view($id = null)
    {
        require_once MODELS . DS . 'produitM.php';
        $m = new produitModel();
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        if ($employee = $m->listOne($id)) $v->setVar('e', $employee);
        // Affichage au sein de la vue des données récupérées via le model
        $v->render('employee', 'view');
    }

    public function addproduit()
    {
        if (isset($_POST['nom'])) {
            $produit = new stdClass();
            $produit->nom = $_POST['nom'];
            $produit->prenom = $_POST['prenom'];
            $produit->numero = $_POST['tele'];
            $produit->sexe = $_POST['sexe'];
            $produit->mail = $_POST['mail'];
            $produit->dateN = $_POST['naissance'];
            $produit->addr = $_POST['addr'];
            $produit->code = $_POST['postal'];

            require_once MODELS . DS . 'produitM.php';
            $m = new produitModel();

            $produit->idAdresse = $m->insertadresse($produit->addr, $produit->code);
            $produits = $m->insertproduit($produit);
            $this->listOfproduits();
        } else {
            require_once MODELS . DS . 'produitM.php';
            $m = new produitModel();
            require_once CLASSES . DS . 'view.php';
            $v = new View();
            if ($codes = $m->getAllcodesP())
                $v->setVar('codesPostaux', $codes);

            $v->render('produits', 'addproduit');
        }
    }


    public function edit($id = null)
    {
        die('modification d\'un employé');
    }
    public function delete($id = null)
    {
        die('suppression d\'un employé');
    }
}
