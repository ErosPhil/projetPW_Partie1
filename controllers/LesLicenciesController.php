<?php
class LesLicenciesController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function afficherTousLesLicencies() {
        $licencies = $this->licencieDAO->getAll();
        $lesCategories = $this->licencieDAO->getAllCategories();
        include_once('../views/header.php');
        include_once('../views/lesLicencies.php');
    }
}
require_once("../classes/models/Connexion.php");
require_once("../classes/models/LicencieModel.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new LesLicenciesController($licencieDAO);
$controller->afficherTousLesLicencies();
?>