
<main role="main" class="container">
    <div class="starter-template">
    <br>  <h1>Affichage de la liste des utilisateurs</h1>
    </div>
<br><br>


  <div class="row">
    <table class="table table-sm">
    <thead>
      <tr>
        
        <th scope="col">Nom #</th>
        <th scope="col">Prenom #</th>
        <th scope="col">Login #</th>
        <th scope="col">Passyord #</th>
        <th scope="col">Email #</th>
        <th scope="col">Status #</th>

        <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>

      </tr>
    </thead>
    <tbody>
    <?php foreach ($userslist as $user){ 

     
      ?>
      <tr>
        <td><?php if (isset($user['nom'])) echo $user['nom']; ?></td>
        <td><?php if (isset($user['prenom'])) echo $user['prenom']; ?></td>
        <td><?php if (isset($user['login'])) echo $user['login']; ?></td>
        <td><?php if (isset($user['mdp'])) echo $user['mdp']; ?></td>
        <td><?php if (isset($user['e_mail'])) echo $user['e_mail']; ?></td>
        <td><?php if (isset($user['status'])) echo $user['status'];else echo "Sans statut" ?></td>
    
        <td><?php if (isset($user['idUtilisateur'])) echo '<a href="index.php?c=employee&m=view&id='.$user['idUtilisateur'].'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
        <td><?php if (isset($user['idUtilisateur'])) echo '<a href="index.php?c=employee&m=edit&id='.$user['idUtilisateur'].'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
        <td><?php if (isset($user['idUtilisateur'])) echo '<a href="index.php?c=employee&m=delete&id='.$user['idUtilisateur'].'" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';?></td>
      </tr>
    <?php }?>
    </tbody>
    </table>
  </div>
</main><!-- /.container -->