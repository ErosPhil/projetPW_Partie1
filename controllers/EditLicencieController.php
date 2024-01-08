<?php
class EditLicencieController{
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function editLicencie($licencieId) {
        $licencie = $this->licencieDAO->getById($licencieId);
        $lesCategories = $this->licencieDAO->getAllCategories();
        $lesContacts = $this->licencieDAO->getAllContacts();

        if (!$licencie) {
            echo "Le licencié n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $categorie = $_POST['categorie'];
            $contact = $_POST['contact'];

            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
            $licencie->setId_categorie($categorie);
            $licencie->setId_contact($contact);

            if ($this->licencieDAO->update($licencie)) {
                header('Location:EditLicencieController.php?id=' . $licencieId);
                exit();
            } else {
                echo "Erreur lors de la modification du licencié.";
            }
        }
        include('../views/edit_licencie.php');
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new EditLicencieController($licencieDAO);
$controller->editLicencie($_GET['id']);
?>