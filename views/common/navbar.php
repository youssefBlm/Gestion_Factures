<?php

if (!isset($_SESSION["Loged"])) {
 
  
    echo '<center><font color="red" size="4"><b>Vous devez vous connecter pour accèder à la page </center></font><br />';
  echo VIEWS."";
    header("Location:views/users/login.php");
    exit;
}
?>
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
     <div class="sidebar-brand-icon ">
     <i class="fas fa-cart-arrow-down"></i>
       
     </div>
     <div class="sidebar-brand-text mx-3">Gestion des factures</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
     <a class="nav-link" href="index">
     <i class="fas fa-home"></i>
      
       <span>Acceuil</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
     Interface
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-user-alt"></i>
       <span>utilisateurs</span>
     </a>
     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Actions :</h6>
         <a class="collapse-item" href="index.php?c=employee&m=list">lol4</a>
         <a class="collapse-item" href="/AppMvc/tasks/index">lolo</a>
         <a class="collapse-item" href="/AppMvc/tasks/reglageLangue">lklkl</a>
       </div>
     </div>
   </li>
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-user-alt"></i>
       <span>kjhkjh</span>
     </a>
     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Actions :</h6>
         <a class="collapse-item" href="index.php?c=employee&m=list">lol4</a>
         <a class="collapse-item" href="/AppMvc/tasks/index">lolo</a>
         <a class="collapse-item" href="/AppMvc/tasks/reglageLangue">lklkl</a>
       </div>
     </div>
   </li>

   <!-- Nav Item - Utilities Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
     <i class="fas fa-tshirt"></i>
       <span>lol3</span>
     </a>
     <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Actions :</h6>
         <a class="collapse-item" href="/AppMvc/intervention/createInterv">lol</a>
         <a class="collapse-item" href="/AppMvc/intervention/indexInterv">lol2</a>
         <a class="collapse-item" href="utilities-border.html">Autre opération</a>
       </div>
     </div>
   </li>

   <!-- Nav Item - Utilities Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArchive" aria-expanded="true" aria-controls="collapseArchive">
       <i class="fas fa-clipboard"></i>
       <span>Archives</span>
     </a>
     <div id="collapseArchive" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Actions :</h6>
         <a class="collapse-item" href="/AppMvc/archive/listInterventionValide">Liste des Interventions</a>


       </div>
     </div>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
     Addons
   </div>


   <!-- Nav Item - Charts -->
   <li class="nav-item">
     <a class="nav-link" href="charts.html">
       <i class="fas fa-fw fa-chart-area"></i>
       <span>Charts</span></a>
   </li>

   <!-- Nav Item - Tables -->
   <li class="nav-item">
     <a class="nav-link" href="tables.html">
       <i class="fas fa-fw fa-table"></i>
       <span>Tables</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

 </ul>
 <!-- End of Sidebar -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <a class="btn btn-primary" href="/AppMvc/tasks/logout">Logout</a>
       </div>
     </div>
   </div>
 </div>