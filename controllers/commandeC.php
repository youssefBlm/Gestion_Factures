<?php
class CommandeController
{
    public function construct()
    {
    }

    public function listOfClients()
    {
        require_once MODELS . DS . 'clientM.php';
        $m = new ClientModel();
        $clients = $m->getAllClients();

        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('clientslist', $clients);
        $v->render('clients', 'listClients');
    }
    public function view($id = null)
    {
        require_once MODELS . DS . 'clientM.php';
        $m = new ClientModel();
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        //  if ($employee = $m->listOne($id)) $v->setVar('e', $employee);
        // Affichage au sein de la vue des données récupérées via le model
        $v->render('employee', 'view');
    }

    public function addCommande()
    {
        if (isset($_POST['nom'])) {
            $client = new stdClass();
            $client->nom = $_POST['nom'];
            $client->prenom = $_POST['prenom'];
            $client->numero = $_POST['tele'];
            $client->sexe = $_POST['sexe'];
            $client->mail = $_POST['mail'];
            $client->dateN = $_POST['naissance'];
            $client->addr = $_POST['addr'];
            $client->code = $_POST['postal'];

            require_once MODELS . DS . 'clientM.php';
            $m = new ClientModel();

            $client->idAdresse = $m->insertadresse($client->addr, $client->code);
            $clients = $m->insertclient($client);
            $this->listOfClients();
        } else {
            /* require_once MODELS . DS . 'clientM.php';
            $m = new ClientModel();
            
            if ($codes = $m->getAllcodesP())
                $v->setVar('codesPostaux', $codes);*/
            require_once MODELS . DS . 'produitM.php';
            $m = new ProduitModel();
            $produits = $m->getAllproduits();
            require_once CLASSES . DS . 'view.php';
            $v = new View();
            $v->setVar('produitslist', $produits);
            $v->render('commandes', 'listProduitC');
        }
    }

    public function panierView()
    {
        $m = $_SESSION['choix'] ;
        require_once MODELS . DS . 'produitM.php';
        $mc = new ProduitModel();
        $produits = $mc->getPanier($m); 
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('panierlist', $m);
        $v->setVar('produits', $produits);
        $v->render('commandes', 'panier');

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
