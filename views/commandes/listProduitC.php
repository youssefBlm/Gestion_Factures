<?php

if (isset($_POST['choix'])) {
  $_SESSION['choix'][] = $_POST['produit'];
}



?>

<main role="main" class="container">
  <div class="starter-template">
    <br>
    <h1>Ajouter les produits au panier</h1>
  </div>


  <div class="float-right"><a href="index.php?c=commande&m=panierView" class="btn btn-primary"> Mon Panier ( <?php if (isset($_SESSION['choix'])) echo count($_SESSION['choix']); else echo 0;?> ) </a></div><br>
  <br><br><br><br>
  <div class="container">
    <div class="row">

      <?php foreach ($produitslist as $produit) {
        $produit['TVA'] = $produit['montant_TVA'] * 100;
        $produit['prix_uni_TTC'] = $produit['prix_Unitaire_HT'] + $produit['prix_Unitaire_HT'] * $produit['montant_TVA'];
        $produit['solde'] = $produit['pourcentage'] * 100;
        $produit['prix_TTC'] = $produit['prix_uni_TTC'] - $produit['prix_uni_TTC'] * $produit['pourcentage'];
      ?>

        <div class="col-sm-3 border mx-4 my-4 px-4 rounded">

          <img style="height: 150px;" src="views/images/undefined.jpg"><br>
          <form method="POST" action="#">
            <p> <?php if (isset($produit['lib_Article'])) echo $produit['lib_Article']; ?>
            </p>
            <input type="hidden" name="produit" value="<?php if (isset($produit['idArticle'])) echo $produit['idArticle']; ?>">
            <input class="btn btn-success btn-sm" type="submit" value="Ajouter" name="choix">
            Prix : <?php if (isset($produit['prix_uni_TTC'])&&$produit['solde']!=0) echo '<s style="color: red;">'.$produit['prix_uni_TTC']." € </s> ".$produit['prix_TTC']." €"; 
            
            else echo $produit['prix_TTC']." € "; 
            ?> 
          </form><br>
        </div>

      <?php } ?>

    </div>
  </div>


</main><!-- /.container -->