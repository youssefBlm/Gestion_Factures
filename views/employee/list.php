<main role="main" class="container">
    <div class="starter-template">
      <h1>Affichage de la liste des employés</h1>
    </div>



  <div class="row">
    <table class="table table-sm">
    <thead>
      <tr>
        
        <th scope="col">Contact #</th>
        <th scope="col">National #</th>

        <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>

      </tr>
    </thead>
    <tbody>
    <?php foreach ($employeelist as $e){ 

     
      ?>
      <tr>
        <td><?php if (isset($e['nom'])) echo $e['nom']; ?></td>
        <td><?php if (isset($e['nom'])) echo $e['prenom']; ?></td>
    
        <td><?php if (isset($e->EmployeeID)) echo '<a href="index.php?c=employee&m=view&id='.$e->EmployeeID.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
        <td><?php if (isset($e->EmployeeID)) echo '<a href="index.php?c=employee&m=edit&id='.$e->EmployeeID.'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
        <td><?php if (isset($e->EmployeeID)) echo '<a href="index.php?c=employee&m=delete&id='.$e->EmployeeID.'" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';?></td>
      </tr>
    <?php }?>
    </tbody>
    </table>
  </div>
</main><!-- /.container -->