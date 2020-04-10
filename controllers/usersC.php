<?php
class UsersController
{
    public function construct()
    {
    }

    public function listOfUsers()
    {
        require_once MODELS . DS . 'usersM.php';
        $m = new UsersModel();
        $users = $m->listAllUsers();
        // Affichage au sein de la vue des données récupérées via le model
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('userslist', $users);
        $v->render('users', 'listUsers');
    }
    public function listOfInvalideUsers()
    {
        require_once MODELS . DS . 'usersM.php';
        $m = new UsersModel();
        $users = $m->listInvalideUsers();
        // Affichage au sein de la vue des données récupérées via le model
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('userslist', $users);
        $v->render('users', 'listUsers');
    }
    public function listOfValideUsers()
    {
        require_once MODELS . DS . 'usersM.php';
        $m = new UsersModel();
        $users = $m->listValideUsers();
        // Affichage au sein de la vue des données récupérées via le model
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('userslist', $users);
        $v->render('users', 'listUsers');
    }
    public function listOfCommUsers()
    {
        require_once MODELS . DS . 'usersM.php';
        $m = new UsersModel();
        $users = $m->listCommUsers();
        // Affichage au sein de la vue des données récupérées via le model
        require_once CLASSES . DS . 'view.php';
        $v = new View();
        $v->setVar('userslist', $users);
        $v->render('users', 'listUsers');
    }
    public function addUser()
    {
        if (isset($_POST['login']) && isset($_POST['mdp'])) {
            $user = new stdClass();
            $user->nom = $_POST['nom'];
            $user->prenom = $_POST['prenom'];
            $user->login = $_POST['login'];
            $user->mdp = $_POST['mdp'];
            $user->mail = $_POST['mail'];
            if ($_POST['status'] != "NULL")    $user->status = $_POST['status'];

            require_once MODELS . DS . 'usersM.php';
            $m = new UsersModel();
            $users = $m->insertUser($user);
            $this->listOfUsers();
        } else {
            //echo "entrer le login et mdp obligatoirement";
            require_once CLASSES . DS . 'view.php';
            $v = new View();
            $v->render('users', 'addUser');
        }
    }

    public function editUser($id = null)
    {
        if (isset($_POST['id'])) {
            $user = new stdClass();
            $user->id = $_POST['id'];
            $user->nom = $_POST['nom'];
            $user->prenom = $_POST['prenom'];
            $user->login = $_POST['login'];
            $user->mail = $_POST['mail'];
            if ($_POST['status'] != "NULL") $user->status = $_POST['status'];

            require_once MODELS . DS . 'usersM.php';
            $m = new UsersModel();
            $users = $m->updateUsers($user);
            $this->listOfUsers();
        } else {
            require_once MODELS . DS . 'usersM.php';
            $m = new UsersModel();
            require_once CLASSES . DS . 'view.php';
            $v = new View();
            if ($user = $m->getOneUser($id))
                //  var_dump($user);
                $v->setVar('user', $user);
            //redirection vers employee_edit.php
            //formulaire
            $v->render('users', 'editUser');
        }
    }
    public function deleteUser($id)
    {
        require_once MODELS . DS . 'usersM.php';
        $m = new UsersModel();
        $user = $m->deleteUsers($id);
        $this->listOfUsers();
    }
}
