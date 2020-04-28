<main role="main" class="container">
    <div class="starter-template">
        <br><br>
        <h1>Liste des Produits commandés </h1>
    </div>
    <br><br>


    <div class="row">
        <table class="table table-sm">
            <thead>
                <tr>

                    <th scope="col">libellé #</th>
                    <th scope="col">Quantité #</th>
                    <th scope="col">Solde #</th>
                    <th scope="col">Prix unitaire TTC #</th>
                    <?php if (!isset($emporter)) {  ?>
                        <th scope="col">Frais de la livraison #</th>
                        <th scope="col">Total Prix #</th>
                    <?php } ?>
                    <th scope="col"><i class="fas fa-eye"></i></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $totalPrix = 0;
                if (isset($produits))
                    foreach ($produits as $produit) {

                        $produit['TVA'] = $produit['montant_TVA'] * 100;
                        $produit['prix_uni_TTC'] = $produit['prix_Unitaire_HT'] + $produit['prix_Unitaire_HT'] * $produit['montant_TVA'];
                        $produit['solde'] = $produit['pourcentage'] * 100;
                        $produit['prix_TTC'] = $produit['prix_uni_TTC'] - $produit['prix_uni_TTC'] * $produit['pourcentage'];
                        if (!isset($emporter)){
                        $produit['total'] = ($produit['montant_Livraison_HT'] + $produit['prix_TTC']) * $produit['qte'];
                        $totalPrix = $totalPrix + $produit['total'];
                        }else
                        $totalPrix=$totalPrix + $produit['prix_TTC']* $produit['qte'];


                ?>
                    <tr>
                        <td><?php if (isset($produit['lib_Article'])) echo $produit['lib_Article']; ?></td>
                        <td><?php if (isset($produit['qte'])) echo $produit['qte']; ?></td>
                        <td><?php if (isset($produit['solde']) && $produit['solde'] > 0) echo "- " . $produit['solde'] . "%";
                            else echo "NON"; ?></td>
                        <td><?php if (isset($produit['prix_TTC'])) echo $produit['prix_TTC'] . "€"; ?></td>
                        <td><?php if (!isset($emporter)) echo $produit['montant_Livraison_HT'] . "€"; ?></td>
                        <td><?php if (!isset($emporter)) echo $produit['total'] . "€"; ?></td>
                        <td><?php if (isset($produit['idArticle'])) echo '<a href="index.php?c=employee&m=view&id=' . $produit['idArticle'] . '" data-toggle="tooltip" title="Voir" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>'; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div style="float: right; margin-right:150px;">
        <h2>Total : <?php echo  $totalPrix . " €"; ?></h2>
    </div>
    <br><br>
    <br><br>
    <div>
        <a href="index.php?c=commande&m=imprimeFacture" class="btn btn-secondary ">Imprimer la facture</a>


    </div><br><br><br>
</main><!-- /.container -->