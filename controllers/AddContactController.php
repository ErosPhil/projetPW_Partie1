<?php
class AddContactController{
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
        include_once('../views/add_contact.php');
    }

    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];

            $nouveauContact = new ContactModel(0, $nom, $prenom, $email, $tel);

            if ($this->contactDAO->create($nouveauContact)) {
                header('Location:HomeController.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        include('../views/add_contact.php');
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new AddContactController($contactDAO);
if(!isset($_POST['action'])){
    $controller->index();
}else{
    $controller->addContact();
}
?>