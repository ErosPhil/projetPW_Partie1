<?php
class EditEducateurController{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function editEducateur($educateurId) {
        $educateur = $this->educateurDAO->getById($educateurId);
        $lesLicencies = $this->educateurDAO->getAllLicencies();

        if (!$educateur) {
            echo "L'éducateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $id_licence = $_POST['licence'];

            $educateur->setEmail($email);
            $educateur->setId_licence($id_licence);

            if ($this->educateurDAO->update($educateur)) {
                header('Location:EditEducateurController.php?id=' . $educateurId);
                exit();
            } else {
                echo "Erreur lors de la modification de l'éducateur.";
            }
        }
        include('../views/edit_educateur.php');
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/models/EducateurModel.php");
require_once("../classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new EditEducateurController($educateurDAO);
$controller->editEducateur($_GET['id']);
?>