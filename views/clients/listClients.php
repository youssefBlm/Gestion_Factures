
<main role="main" class="container">
    <div class="starter-template">
    <br>  <h1>Affichage de la liste des clients</h1>
    </div>
<br><br>


  <div class="row">
    <table class="table table-sm">
    <thead>
      <tr>
        
        <th scope="col">Nom et Prenom #</th>
        <th scope="col">Téléphone #</th>
        <th scope="col">Email #</th>
        <th scope="col">Sexe #</th>
        <th scope="col">Adresse #</th>
        <th scope="col">Code Postal #</th>
        <th scope="col">Ville #</th>
        <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>

      </tr>
    </thead>
    <tbody>
    <?php foreach ($clientslist as $client){ 

     
      ?>
      <tr>
        <td><?php if (isset($client['nom'])) echo $client['nom']." ".$client['prenom']; ?></td>
        <td><?php if (isset($client['numero_Tel'])) echo $client['numero_Tel']; ?></td>
        <td><?php if (isset($client['e_mail'])) echo $client['e_mail']; ?></td>
        <td><?php if (isset($client['sexe'])) echo $client['sexe']; ?></td>
        <td><?php if (isset($client['Adresse'])) echo $client['Adresse']; ?></td>
        <td><?php if (isset($client['CodePostale'])) echo $client['CodePostale']; ?></td>
        <td><?php if (isset($client['ville'])) echo $client['ville']; ?></td>
        
        <td><?php if (isset($client['idClient'])) echo '<a href="index.php?c=employee&m=view&id='.$client['idClient'].'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
        <td><?php if (isset($client['idClient'])) echo '<a href="index.php?c=clients&m=editclient&id='.$client['idClient'].'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
        <td><?php if (isset($client['idClient'])) echo '<a href="index.php?c=clients&m=deleteclient&id='.$client['idClient'].'" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';?></td>
      </tr>
    <?php }?>
    </tbody>
    </table>
  </div>
</main><!-- /.container -->