<?php
class HomeController{
    public function index() {
        include_once('../views/header.php');
        include_once('../views/home.php');
    }
}
require_once("../classes/models/Connexion.php");
$controller=new HomeController();
$controller->index();
?>