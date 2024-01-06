<?php
class EditCategorieController{
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function editCategorie($categorieId) {
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            echo "La catégorie n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = $_POST['code'];
            $nom = $_POST['nom'];

            $categorie->setCode_categorie($code);
            $categorie->setNom($nom);

            if ($this->categorieDAO->update($categorie)) {
                header('Location:EditCategorieController.php?id=' . $categorieId);
                exit();
            } else {
                echo "Erreur lors de la modification de la catégorie.";
            }
        }
        include('../views/edit_categorie.php');
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new EditCategorieController($categorieDAO);
$controller->editCategorie($_GET['id']);
?>