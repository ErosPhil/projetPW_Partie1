<?php
class LesCategoriesController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function afficherToutesLesCategories() {
        $categories = $this->categorieDAO->getAll();
        include_once('../views/header.php');
        include_once('../views/lesCategories.php');
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new LesCategoriesController($categorieDAO);
$controller->afficherToutesLesCategories();
?>