<?php
class AddCategorieController{
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        include_once('../views/add_categorie.php');
    }

    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = $_POST['code'];
            $nom = $_POST['nom'];

            $nouvelleCategorie = new CategorieModel(0, $code, $nom);

            if ($this->categorieDAO->create($nouvelleCategorie)) {
                header('Location:LesCategoriesController.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }

        include('../views/add_categorie.php');
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new AddCategorieController($categorieDAO);
if(!isset($_POST['action'])){
    $controller->index();
}else{
    $controller->addCategorie();
}
?>