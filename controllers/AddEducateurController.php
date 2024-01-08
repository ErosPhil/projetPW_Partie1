<?php
class AddEducateurController{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function index() {
        $lesLicencies = $this->educateurDAO->getAllLicencies();
        include_once('../views/add_educateur.php');
    }

    public function addEducateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $estAdmin = $_POST['estAdmin'];
            $licence = $_POST['licence'];

            $nouvelEducateur = new EducateurModel(0, $email, $mdp, $estAdmin, $licence);

            if ($this->educateurDAO->create($nouvelEducateur)) {
                header('Location:LesEducateursController.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout de l'éducateur.";
            }
        }

        $this->index();
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/models/EducateurModel.php");
require_once("../classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new AddEducateurController($educateurDAO);
if(!isset($_POST['action'])){
    $controller->index();
}else{
    $controller->addEducateur();
}
?>