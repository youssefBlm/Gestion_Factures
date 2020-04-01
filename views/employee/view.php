<?php
function fAge($date) {
  $datetime1 = new DateTime("today");
  $datetime2 = new DateTime($date);
  $interval = $datetime2->diff($datetime1);
  return $interval->format('%y');
  }  ?>
<main role="main" class="container">
    <div class="starter-template">
      <h1>Affichage d'un employé</h1>
    </div>


  <br/>
  <div class="row">
    <h3>
      <?php if (isset($e->EmployeeID)) echo '('.$e->EmployeeID.') '; ?>
      <?php if (isset($e->CTitle)) echo $e->CTitle.' '; ?>
      <?php if (isset($e->FirstName)) echo $e->FirstName.' '; ?>
      <?php if (isset($e->MiddleName)) echo $e->MiddleName.' '; ?>
      <?php if (isset($e->LastName)) echo $e->LastName.' '; ?>
      <?php if (isset($e->Suffix)) echo $e->Suffix; ?>
      <?php if (isset($e->EmployeeID)) echo ' <a href="index.php?c=employee&m=edit&id='.$e->EmployeeID.'" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifier l\'employé"><i class="fas fa-edit"></i> Modifier</a>';?>
    </h3>
  </div>

  <div class="row">
    <label class="col-md-4 control-label">Numéro sécurité sociale :</label>
    <div class="col-md-8">
      <?php if (isset($e->NationalIDNumber)) echo $e->NationalIDNumber; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">LoginID :</label>
    <div class="col-md-8">
      <?php if (isset($e->LoginID)) echo $e->LoginID; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Date de naissance :</label>
    <div class="col-md-8">
      <?php if (isset($e->BirthDate)) echo date('d/m/Y',strtotime($e->BirthDate)). ' ('.fAge($e->BirthDate).' ans)'; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Date d'entrée dans l'entreprise :</label>
    <div class="col-md-8">
      <?php if (isset($e->HireDate)) echo date('d/m/Y',strtotime($e->HireDate)). ' ('.fAge($e->HireDate).' ans d\'ancienneté)'; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Statut marital :</label>
    <div class="col-md-8">
      <?php if (isset($e->MaritalStatus)) echo $e->MaritalStatus; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Sexe :</label>
    <div class="col-md-8">
      <?php if (isset($e->Gender)) echo $e->Gender; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Nombre d'heure de vacances :</label>
    <div class="col-md-8">
      <?php if (isset($e->VacationHours)) echo $e->VacationHours; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Nombre d'heure de maladie :</label>
    <div class="col-md-8">
      <?php if (isset($e->SickLeaveHours)) echo $e->SickLeaveHours; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Adresse mail :</label>
    <div class="col-md-8">
      <?php if (isset($e->EmailAddress)) echo $e->EmailAddress; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">EmailPromotion :</label>
    <div class="col-md-8">
      <?php if (isset($e->EmailPromotion)) echo $e->EmailPromotion; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Téléphone :</label>
    <div class="col-md-8">
      <?php if (isset($e->Phone)) echo $e->Phone; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Poste occupé :</label>
    <div class="col-md-8">
      <?php if (isset($e->ETitle)) echo $e->ETitle; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Manager :</label>
    <div class="col-md-8">
      <?php if (isset($e->CMTitle)) echo $e->CMTitle; ?>
      <?php if (isset($e->CMFirstName)) echo ' '.$e->CMFirstName; ?>
      <?php if (isset($e->CMMiddleName)) echo ' '.$e->CMMiddleName; ?>
      <?php if (isset($e->CMLastName)) echo ' '.$e->CMLastName; ?>
      <?php if (isset($e->EMTitle)) echo ' ('.$e->EMTitle.')'; ?>
      <?php if (isset($e->ManagerID)) echo ' <a href="index.php?c=employee&m=view&id='.$e->ManagerID.'" class="btn btn-success btn-sm" data-toggle="tooltip" title="Modifier l\'employé"><i class="fas fa-eye"></i> Voir</a>';?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Dernière modification :</label>
    <div class="col-md-8">
      <?php if (isset($e->ModifiedDate)) echo $e->ModifiedDate; ?>
    </div>
  </div>

</main><!-- /.container -->