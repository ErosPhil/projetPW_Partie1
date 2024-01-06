<?php
class DeleteCategorieController{
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteCategorie($categorieId) {
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            echo "La catégorie n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($this->categorieDAO->deleteById($categorieId)) {
                header('Location:LesCategoriesController');
                exit();
            } else {
                echo "Erreur lors de la suppression de la catégorie.<br>Peut-être avez-vous essayé de supprimer une catégorie associée à au moins 1 associé ?";
            }
        }
        include('../views/delete_categorie.php');
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new DeleteCategorieController($categorieDAO);
$controller->deleteCategorie($_GET['id']);
?>