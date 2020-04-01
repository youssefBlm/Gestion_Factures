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
      
}
