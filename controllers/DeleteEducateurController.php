<?php
class DeleteEducateurController{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function deleteEducateur($educateurId) {
        $educateur = $this->educateurDAO->getById($educateurId);

        if (!$educateur) {
            echo "L'éducateur n'a pas été trouvé.";
            return;
        }

        $infoEducateur = $this->educateurDAO->getInfo($educateur->getId());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($this->educateurDAO->deleteById($educateurId)) {
                header('Location:LesEducateursController');
                exit();
            } else {
                echo "Erreur lors de la suppression de l'éducateur.<br>Peut-être avez-vous essayé de supprimer un éducateur administrateur ?";
            }
        }
        include('../views/delete_educateur.php');
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/models/EducateurModel.php");
require_once("../classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new DeleteEducateurController($educateurDAO);
$controller->deleteEducateur($_GET['id']);
?>