<main role="main" class="container">
  <div class="starter-template">
    <br>
    <h1>Affichage des Produits</h1>
  </div>
  <br><br>


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
          <th scope="col"><i class="fas fa-edit"></i></th>
          <th scope="col"><i class="fas fa-trash-alt"></i></th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($produitslist as $produit) {
          $produit['TVA'] = $produit['montant_TVA'] * 100;
          $produit['prix_uni_TTC'] = $produit['prix_Unitaire_HT'] + $produit['prix_Unitaire_HT'] * $produit['montant_TVA'] ;
          $produit['solde']=$produit['pourcentage'] * 100;
          $produit['prix_TTC'] =$produit['prix_uni_TTC'] - $produit['prix_uni_TTC'] * $produit['pourcentage'] ;
        ?>
          <tr>
            <td><?php if (isset($produit['lib_Article'])) echo $produit['lib_Article']; ?></td>
            <td><?php if (isset($produit['lib_Marque'])) echo $produit['lib_Marque']; ?></td>
            <td><?php if (isset($produit['qte_Stock'])) echo $produit['qte_Stock']; ?></td>
            <td><?php if (isset($produit['TVA'])) echo $produit['TVA'] . "%"; ?></td>
            <td><?php if (isset($produit['prix_Unitaire_HT'])) echo $produit['prix_uni_TTC']."€"; ?></td>
            <td><?php if (isset($produit['solde'])&&$produit['solde']>0) echo "- ".$produit['solde']. "%";else echo "NON"; ?></td>
            <td><?php if (isset($produit['prix_TTC'])) echo $produit['prix_TTC']."€"; ?></td>

            <td><?php if (isset($produit['idArticle'])) echo '<a href="index.php?c=employee&m=view&id=' . $produit['idArticle'] . '" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>'; ?></td>
            <td><?php if (isset($produit['idArticle'])) echo '<a href="index.php?c=produits&m=editproduit&id=' . $produit['idArticle'] . '" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>'; ?></td>
            <td><?php if (isset($produit['idArticle'])) echo '<a href="index.php?c=produits&m=deleteproduit&id=' . $produit['idArticle'] . '" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>'; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main><!-- /.container -->