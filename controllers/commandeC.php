<?php
class CommandeController
{

    public function construct()
    {
    }


    public function commandePage()
    {


        require_once MODELS . DS . 'commandeM.php';
        $m = new CommandeModel();
        $produits = $m->getAllproduits();
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('produitslist', $produits);
        $v->render('commandes', 'listProduitC');
    }

    public function addCommande()
    {
        require_once MODELS . DS . 'clientM.php';
        $m = new ClientModel();
        $clients = $m->getAllClients();
        require_once CLASSES . DS . 'view.php';
        $v = new View();

        $v->setVar('clientslist', $clients);
        // $v->setVar('produitslist', $produits);
        $v->render('commandes', 'addCommande');
    }

    public function addLivraison()
    {

        require_once CLASSES . DS . 'view.php';
        $v = new View();
        if (isset($_POST["done"])) {
            require_once MODELS . DS . 'commandeM.php';
            $m = new CommandeModel();

            $date = new Datetime();

            $livraison = new stdClass();
            $livraison->commande = $m->getLastCommande();
            $livraison->delai = $date->format('Y-m-d');

            if (isset($_POST["postal"])) {
                $livraison->mode = 1;
                $livraison->magasin = 1;
                $livraison->adrr = $m->insertadresse($_POST["addr"], $_POST["postal"]);
            } else if (isset($_POST["magasin"])) {
                $livraison->mode = 2;
                $livraison->adrr = 1;
                $livraison->magasin = $_POST["magasin"];
            }

            $mol = $m->insertLivraison($livraison);

            $this->listeCommandee();
        } else

        if (isset($_POST["valide"])) {

            $date = new Datetime();
            $commande = new stdClass();
            $commande->date = $date->format('Y-m-d H:i:s');
            $commande->numero = $_POST['tele'];
            $commande->mail = $_POST['mail'];
            $commande->client = $_POST['client'];

            require_once MODELS . DS . 'commandeM.php';
            $m = new CommandeModel();
            if ($mg = $m->chercheRemise($_POST['remise']))
                $commande->remise = $mg['idRemise'];
            else
                $commande->remise = 1;


            if ($_POST["mode"] == "emporter") {
                $commande->mode = 1; //mode emporter dans

            } else {
                $commande->mode = 2;
            }

            $lol = $m->insertCommande($commande);
            $v->render('commandes', 'addLivraison');
        } else {


            if (isset($_POST["modeL"]) && $_POST["modeLivraison"] == "domicile") {

                require_once MODELS . DS . 'clientM.php';
                $m = new ClientModel();
                if ($codes = $m->getAllcodesP())
                    $v->setVar('codesPostaux', $codes);
            } else {
                require_once MODELS . DS . 'commandeM.php';
                $m = new CommandeModel();
                if ($mag = $m->getAllMagasins())
                    $v->setVar('magasins', $mag);
            }
            $v->render('commandes', 'addLivraison');
        }
    }

    public function panierView()
    {
        require_once MODELS . DS . 'produitM.php';
        $mc = new ProduitModel();
        require_once CLASSES . DS . 'view.php';
        $v = new View();

        if (isset($_SESSION['choix'])) {
            $m = $_SESSION['choix'];
            $produits = $mc->getPanier($m);

            for ($i = 0; $i < count($produits); $i++) {
                $count = 0;
                for ($j = 0; $j < count($m); $j++)
                    if ($m[$j] == $produits[$i]["idArticle"])
                        $count++;
                $produits[$i]["qte"] = $count;
            }


            $v->setVar('produits', $produits);
        }

        $v->render('commandes', 'panier');
    }


    public function panierVide()
    {
        unset($_SESSION['choix']);
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->render('commandes', 'panier');
    }


    public function listeCommandee()
    {
        require_once MODELS . DS . 'commandeM.php';
        $mc = new CommandeModel();
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        if (isset($_SESSION['choix'])) {
            $m = $_SESSION['choix'];
            $produits = $mc->getAllProduitsC($m);

            for ($i = 0; $i < count($produits); $i++) {
                $count = 0;
                for ($j = 0; $j < count($m); $j++)
                    if ($m[$j] == $produits[$i]["idArticle"])
                        $count++;

                $produits[$i]["qte"] = $count;
                
                $mc->insertPanier($produits[$i]["idArticle"],$mc->getLastCommande(),$count);

            }


            $v->setVar('produits', $produits);
        }
       
          $v->render('commandes', 'listCommande');
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
