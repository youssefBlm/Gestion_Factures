<?php
//require_once CLASSES.DS.'controller.php';
class HomeController {
    public function construct(){}

    public function index(){
        //Pas de données à gérer
        //La vue à afficher est la vue index
        require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->render('home','index');
    }
}
?>