<?php
class loginController
{
    public function construct()
    {
    }

    public function liste()
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
            $msg = "nta hmar";

            header("Location:views/login/login.php?msg=" . $msg);
        } else {
            $_SESSION['Loged'] = true;
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['status'] = $user['status'];
            require_once CLASSES . DS . 'view.php';
            $v = new View();
            $v->render('home', 'index');
        }
    }
    public function instalation()
    {
        require_once MODELS . DS . 'bddM.php';
        $m = new bddModel();
        if (isset($_SESSION['structure'])) {

            echo "instalation<br>";
            $val = $m->createBdd('sql/facture_DB_structure.sql');
            unset($_SESSION['structure']);
        } else
            echo "no structure<br>";

        if (isset($_SESSION['data'])) {
            echo "data<br>";
            $val = $m->insertData('sql/facture_DB_DATA.sql');
            unset($_SESSION['dataF']);
        } else
            echo "no data<br>";
    }
}
