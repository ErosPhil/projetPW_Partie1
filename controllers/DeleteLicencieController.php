<?php
class DeleteLicencieController{
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function deleteLicencie($licencieId) {
        $licencie = $this->licencieDAO->getById($licencieId);

        if (!$licencie) {
            echo "Le licencié n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($this->licencieDAO->deleteById($licencieId)) {
                header('Location:LesLicenciesController');
                exit();
            } else {
                echo "Erreur lors de la suppression du licencié.<br>Peut-être avez-vous essayé de supprimer un licencié qui est aussi éducateur ?";
            }
        }
        include('../views/delete_licencie.php');
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new DeleteLicencieController($licencieDAO);
$controller->deleteLicencie($_GET['id']);
?>