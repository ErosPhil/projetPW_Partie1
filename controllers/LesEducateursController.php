<?php
class LesEducateursController {
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function afficherTousLesEducateurs() {
        $educateurs = $this->educateurDAO->getAll();
        $infoEducateurs = [];
        foreach($educateurs as $educateur){
            $infoEducateurs[] = $this->educateurDAO->getInfo($educateur->getId());
        }
        include_once('../views/header.php');
        include_once('../views/lesEducateurs.php');
    }
}
require_once("../views/check_Edu.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/models/EducateurModel.php");
require_once("../classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new LesEducateursController($educateurDAO);
$controller->afficherTousLesEducateurs();
?>