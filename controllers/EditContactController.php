<?php
class EditContactController{
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function editContact($contactId) {
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];

            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTel($tel);

            if ($this->contactDAO->update($contact)) {
                header('Location:ViewContactController.php?id=' . $contactId);
                exit();
            } else {
                echo "Erreur lors de la modification du contact.";
            }
        }
        include('../views/edit_contact.php');
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new EditContactController($contactDAO);
$controller->editContact($_GET['id']);
?>