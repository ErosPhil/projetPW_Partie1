<?php
class DeleteContactController{
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
        $lesContacts = $this->contactDAO->getAll();
        include_once('../views/delete_contact.php');
    }

    public function deleteContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactId = $_POST['contact'];
            $contact = $this->contactDAO->getById($contactId);
            if (!$contact) {
                echo "Le contact n'a pas été trouvé.";
                return;
            }

            if ($this->contactDAO->deleteById($contactId)) {
                header('Location:HomeController');
                exit();
            } else {
                echo "Erreur lors de la suppression du contact.<br>Peut-être avez-vous essayé de supprimer un contact qui est lié à un licencié ?";
            }
        }
        $this->index();
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new DeleteContactController($contactDAO);
if(!isset($_POST['action'])){
    $controller->index();
}else{
    $controller->deleteContact();
}
?>