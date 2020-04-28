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

                $lol = $m->insertCommande($commande);
                $this->listeCommandee("emporter");
            } else {
                $commande->mode = 2;

                $lol = $m->insertCommande($commande);
                $v->render('commandes', 'addLivraison');
            }
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


    public function listeCommandee($val = NULL)
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

                $mc->insertPanier($produits[$i]["idArticle"], $mc->getLastCommande(), $count);
            }


            $v->setVar('produits', $produits);

            if (isset($val))
                $v->setVar('emporter', $val);
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

    public function imprimeFacture()
    {
        require_once MODELS . DS . 'commandeM.php';
        $mc = new CommandeModel();
        if (isset($_SESSION['choix'])) {
            $m = $_SESSION['choix'];
            $produits = $mc->getAllProduitsC($m);

            for ($i = 0; $i < count($produits); $i++) {
                $count = 0;
                for ($j = 0; $j < count($m); $j++)
                    if ($m[$j] == $produits[$i]["idArticle"])
                        $count++;

                $produits[$i]["qte"] = $count;
            }
        }

        $date = new Datetime();
        $date = $date->format('Y-m-d H:i:s');
        // var_dump($date);

        $commande = $mc->getCommande();
        //var_dump($commande);

        $fourn = $mc->getFournisseur();

        // var_dump($fourn);

        $client = $mc->getClientLastCommande();
        // var_dump($client);

        $facture = $mc->getFacture();
        //   var_dump($facture);

        require_once "views/vendors/fpdf/fpdf.php";
        $mypd = new FPDF();
        $mypd->AliasNbPages();
        $mypd->AddPage('P', 'A4', 0);
        $mypd->SetFont('Arial', 'B', 15);

        $mypd->Cell(140, 12, $fourn["nom_Fournisseur"], 0, 0, 'L');
        $mypd->Cell(70, 12, "Facture Numero 0" . $facture["numero_Facture"], 0, 1, 'L');
        $mypd->SetFont('Arial', 'B', 10);
        $mypd->Cell(70, 5, $fourn["numero_tel"], 0, 1, 'L');
        $mypd->Cell(70, 5, $fourn["e_mail"], 0, 1, 'L');
        $mypd->Cell(70, 5, $fourn["Adresse"], 0, 1, 'L');
        $mypd->Cell(70, 5, $fourn["CodePostale"] . ", " . $fourn["ville"], 0, 1, 'L');
        $mypd->Cell(140, 5, "France", 0, 0, 'L');
        $mypd->SetFont('Arial', 'B', 15);
        $mypd->Cell(100, 12, $client["prenom"] . " " . $client["nom"], 0, 2, 'L');
        $mypd->SetFont('Arial', 'B', 10);
        $mypd->Cell(100, 5, $client["numero_Tel"], 0, 2, 'L');
        $mypd->Cell(100, 5, $client["e_mail"], 0, 2, 'L');
        $mypd->Cell(100, 5, $client["Adresse"], 0, 2, 'L');
        $mypd->Cell(100, 5, $client["CodePostale"] . ", " . $client["ville"], 0, 2, 'L');
        $mypd->Cell(100, 5, "France", 0, 1, 'L');

        $mypd->SetFont('Arial', 'B', 9);
        $mypd->Cell(70, 5, "Numero de facture : 00" . $facture["numero_Facture"], 0, 1, 'L');
        $mypd->Cell(70, 5, "Numero de commande : 0" . $commande[0], 0, 1, 'L');
        $mypd->Cell(70, 5, "Date : " . $date, 0, 1, 'L');
        $mypd->Ln(5);
        $mypd->SetFont('Arial', 'B', 9);

        $mypd->Cell(45, 15, "Description", 1, 0, 'C');
        $mypd->Cell(15, 15, "Quantites", 1, 0, 'C');
        $mypd->Cell(29, 15, "Prix Unitaire HT", 1, 0, 'C');
        $mypd->Cell(15, 15, "% TVA", 1, 0, 'C');
        $mypd->Cell(18, 15, "TVA", 1, 0, 'C');


        if ($commande["idMode_Commande"] == 2)
            $mypd->Cell(25, 15, "Prix Livraison", 1, 0, 'C');

        $mypd->Cell(18, 15, "Solde", 1, 0, 'C');
        $mypd->Cell(25, 15, "TOTAL TTC", 1, 1, 'C');
        $mypd->SetFont('Arial', 'B', 8);

        $total_HT = 0;
        $total_TVA = 0;
        $total_solde = 0;
        $total_remise = 0;
        $total_livraison = 0;
        foreach ($produits as $produit) {
            $total_HT = $total_HT + $produit['prix_Unitaire_HT'] * $produit['qte'];

            $produit['TVA'] = $produit['montant_TVA'] * 100;
            $produit['total_TVA'] = $produit['prix_Unitaire_HT'] * $produit['montant_TVA'] * $produit['qte'];
            $total_TVA =  $total_TVA + $produit['total_TVA'];
            $total_remise =  $total_remise + $produit['prix_Unitaire_HT'] * $commande['pourcentage'] * $produit['qte'];
            $produit['total_solde'] = $produit['prix_Unitaire_HT'] * $produit['pourcentage'] * $produit['qte'];
            $total_solde = $total_solde +  $produit['total_solde'];

            if ($commande["idMode_Commande"] == 2) {
                $produit['prix_Livraison'] = $produit['montant_Livraison_HT'] * $produit['qte'];
                $total_livraison = $total_livraison + $produit['prix_Livraison'];
                $produit['total_Produit'] = $produit['prix_Livraison'] + $produit['total_TVA']  - $produit['total_solde'] + $produit['prix_Unitaire_HT'] * $produit['qte'];
            } else
                $produit['total_Produit'] = $produit['total_TVA']  - $produit['total_solde'] + $produit['prix_Unitaire_HT'] * $produit['qte'];



            $mypd->Cell(45, 9, $produit['lib_Article'], 1, 0, 'C');
            $mypd->Cell(15, 9, $produit['qte'], 1, 0, 'C');
            $mypd->Cell(29, 9, $produit['prix_Unitaire_HT'] . " E", 1, 0, 'C');
            $mypd->Cell(15, 9, $produit['TVA'] . " %", 1, 0, 'C');
            $mypd->Cell(18, 9, $produit['total_TVA'] . " E", 1, 0, 'C');


            if ($commande["idMode_Commande"] == 2)
                $mypd->Cell(25, 9, $produit['prix_Livraison'] . " E", 1, 0, 'C');
            $mypd->Cell(18, 9, ($produit['pourcentage'] * 100) . " %", 1, 0, 'C');
            $mypd->Cell(25, 9, $produit['total_Produit'] . " E", 1, 1, 'C');
        }
        $mypd->Ln(10);

        $mypd->SetFont('Arial', 'B', 12);
        $mypd->Cell(120, 10, "", 0, 0, 'L');
        $mypd->Cell(40, 10, 'TOTAL HT', 0, 0, 'L');
        $mypd->Cell(20, 10,  $total_HT, 0, 1, 'R');
        $mypd->Cell(120, 10, "", 0, 0, 'L');
        $mypd->Cell(40, 5, 'TVA', 0, 0, 'L');
        $mypd->Cell(20, 5, $total_TVA, 0, 1, 'R');
        $mypd->Cell(120, 10, "", 0, 0, 'L');
        $mypd->Cell(40, 5, 'SOLDE', 0, 0, 'L');
        $mypd->Cell(20, 5, " - " . $total_solde, 0, 1, 'R');
        if ($commande["idRemise"] != 1) {
            $mypd->Cell(120, 10, "", 0, 0, 'L');
            $mypd->Cell(40, 5, 'REMISE', 0, 0, 'L');
            $mypd->Cell(20, 5, " - " . $total_remise, 0, 1, 'R');
        }
        if ($commande["idMode_Commande"] == 2) {
            $mypd->Cell(120, 10, "", 0, 0, 'L');
            $mypd->Cell(40, 5, 'LIVRAISON', 0, 0, 'L');
            $mypd->Cell(20, 5, $total_livraison, 0, 1, 'R');
        }

        $total= $total_HT + $total_TVA - $total_solde - $total_remise + $total_livraison;
        $mypd->Cell(120, 2, "", 0, 0, 'L');
        $mypd->Cell(30, 2, "________________________", 0, 1, 'L');
        $mypd->Cell(120, 10, "", 0, 0, 'L');
        $mypd->Cell(40, 10, 'TOTAL TTC', 0, 0, 'L');
        $mypd->Cell(20, 10,$total, 0, 1, 'R');

        $mypd->Output();

        $this->listeCommandee();
    }
}
