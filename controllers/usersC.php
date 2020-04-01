<?php
class UsersController
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
        
            require_once CLASSES . DS . 'view.php';
            $v = new View();
            $v->render('home','index');}
    }
      
    public function view($id = null)
    {
        $_SESSION['login'] = "";
        if (isset($_POST['submit']) and $_POST['submit'] == "Login") {

            $username = $_POST['username'];
            $password = $_POST['password'];
            try {
                include '../models/loginmodel.php';
                $login = new loginmodel($username, $password);

                $rowCount = $login->getData();

                session_start();
                if ($rowCount == 1) {
                    $_SESSION['username'] = $username;
                    header("Location:../views/index.php");
                } else {
                    $_SESSION['login'] = "Username or password incorect" . $rowCount;
                    header("Location:../views/login.php");
                }
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }
    }
    public function edit($id = null)
    {
        die('modification d\'un employé');
    }
    public function delete($id = null)
    {
        die('suppression d\'un employé');
    }
}
