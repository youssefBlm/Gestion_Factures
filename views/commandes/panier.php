<main role="main" class="container">
    <div class="starter-template">
        <br>
        <h1>Mon Panier</h1>
    </div>
    

    <div class="float-right">
    <a href="index.php?c=commande&m=addCommande" class="btn btn-info ">Ajouter d'autres produits</a>
    </div><br><br><br>
    <div class="row">
        <table class="table table-sm">
            <thead>
                <tr>

                    <th scope="col">libellé #</th>
                    <th scope="col">Marque #</th>
                    <th scope="col">Quantité #</th>
                    <th scope="col">TVA #</th>
                    <th scope="col">Prix Unitaire #</th>
                    <th scope="col">Solde #</th>
                    <th scope="col">Prix TTC #</th>
                    <th scope="col"><i class="fas fa-eye"></i></th>
                    <th scope="col"><i class="fas fa-trash-alt"></i></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($panierlist as $prod) {
                    $produits[$prod - 1]['TVA'] = $produits[$prod - 1]['montant_TVA'] * 100;
                    $produits[$prod - 1]['prix_uni_TTC'] = $produits[$prod - 1]['prix_Unitaire_HT'] + $produits[$prod - 1]['prix_Unitaire_HT'] * $produits[$prod - 1]['montant_TVA'];
                    $produits[$prod - 1]['solde'] = $produits[$prod - 1]['pourcentage'] * 100;
                    $produits[$prod - 1]['prix_TTC'] = $produits[$prod - 1]['prix_uni_TTC'] - $produits[$prod - 1]['prix_uni_TTC'] * $produits[$prod - 1]['pourcentage'];
                ?>
                    <tr>
                        <td><?php if (isset($produits[$prod - 1]['lib_Article'])) echo $produits[$prod - 1]['lib_Article']; ?></td>
                        <td><?php if (isset($produits[$prod - 1]['lib_Marque'])) echo $produits[$prod - 1]['lib_Marque']; ?></td>
                        <td><?php if (isset($produits[$prod - 1]['qte_Stock'])) echo $produits[$prod - 1]['qte_Stock']; ?></td>
                        <td><?php if (isset($produits[$prod - 1]['TVA'])) echo $produits[$prod - 1]['TVA'] . "%"; ?></td>
                        <td><?php if (isset($produits[$prod - 1]['prix_Unitaire_HT'])) echo $produits[$prod - 1]['prix_uni_TTC'] . "€"; ?></td>
                        <td><?php if (isset($produits[$prod - 1]['solde']) && $produits[$prod - 1]['solde'] > 0) echo "- " . $produits[$prod - 1]['solde'] . "%";
                            else echo "NON"; ?></td>
                        <td><?php if (isset($produits[$prod - 1]['prix_TTC'])) echo $produits[$prod - 1]['prix_TTC'] . "€"; ?></td>

                        <td><?php if (isset($produits[$prod - 1]['idArticle'])) echo '<a href="index.php?c=employee&m=view&id=' . $produits[$prod - 1]['idArticle'] . '" data-toggle="tooltip" title="Voir" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>'; ?></td>
                        
                        <td><?php if (isset($produits[$prod - 1]['idArticle'])) echo '<a href="index.php?c=produitss&m=deleteproduits&id=' . $produits[$prod - 1]['idArticle'] . '" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<br><br>
<br><br>    <div >
    <a href="index.php?c=commande&m=addCommande" class="btn btn-success ">Valider le panier</a>
    </div><br><br><br>
</main><!-- /.container -->