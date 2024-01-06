<?php
class AddLicencieController{
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
        $lesCategories = $this->licencieDAO->getAllCategories();
        $lesContacts = $this->licencieDAO->getAllContacts();
        include_once('../views/add_licencie.php');
    }

    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $categorie = $_POST['categorie'];
            $contact = $_POST['contact'];

            $nouveauLicencie = new LicencieModel(0, $nom, $prenom, $categorie, $contact);

            if ($this->licencieDAO->create($nouveauLicencie)) {
                header('Location:LesLicenciesController.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout du licencié.";
            }
        }

        $this->index();
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new AddLicencieController($licencieDAO);
if(!isset($_POST['action'])){
    $controller->index();
}else{
    $controller->addLicencie();
}
?>