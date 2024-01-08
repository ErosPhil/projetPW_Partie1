<?php
class HomeController{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
        session_start();
    }

    public function index() {
        include_once('../views/header.php');
        include_once('../views/home.php');
    }

    public function seConnecter(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];

            $educateur = $this->educateurDAO->getByEmail($email);

            if($educateur != null){
                if($educateur->getMot_de_passe() == $mdp){
                    $_SESSION['userId'] = $educateur->getId();
                    $_SESSION['name'] = $educateur->getEmail();
                }else{
                    echo 'Erreur lors de la connexion : mot de passe incorrect';
                }
            }else{
                echo 'Erreur lors de la connexion : adresse mail non connue';
            }
        }
        header("Location:HomeController.php");
    }

    public function seDeconnecter(){
        session_destroy();
        header("Location:HomeController.php");
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/EducateurModel.php");
require_once("../classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new HomeController($educateurDAO);
if(isset($_POST['seDeconnecter'])){
    $controller->seDeconnecter();
}elseif(isset($_POST['seConnecter'])){
    $controller->seConnecter();
}else{
    $controller->index();
}
?>