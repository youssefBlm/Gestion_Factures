<?php
class loginController
{
    public function construct()
    {
    }

    public function list()
    {
        require_once MODELS . DS . 'employeeM.php';
        $m = new EmployeeModel();
        $employees = $m->listAll();
        // Affichage au sein de la vue des données récupérées via le model
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('employeelist', $employees);
        $v->render('employee', 'list');
    }
    public function login()
    {
        require_once MODELS . DS . 'usersM.php';
        $m = new usersModel();
        $user = $m->verifyUser($_SESSION['Login'], $_SESSION['passe']);

        unset($_SESSION['Login']);
        unset($_SESSION['passe']);

        if (!$user) {

            // redirection vers header avec un msg d'erreur
            $msg="nta hmar";
           
            header("Location:views/users/login.php?msg=".$msg);
           
        } else {
            $_SESSION['Loged']=true;
            $_SESSION['nom']=$user['nom'];
            $_SESSION['prenom']=$user['prenom'];
            $_SESSION['status']=$user['status'];        
            require_once CLASSES . DS . 'view.php';
            $v = new View();
            $v->render('home','index');}
    }
      
}
