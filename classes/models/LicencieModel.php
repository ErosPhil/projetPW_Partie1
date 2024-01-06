<?php
class LicencieModel{
    private $id;
    private $nom;
    private $prenom;
    private $id_categorie;
    private $id_contact;

    function __construct($id, $nom, $prenom, $id_categorie, $id_contact){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_categorie = $id_categorie;
        $this->id_contact = $id_contact;
    }

    function getId(): string
    {
        return $this->id;
    }
    function getNom(): string
    {
        return $this->nom;
    }
    function getPrenom(): string
    {
        return $this->prenom;
    }
    function getId_categorie(): string
    {
        return $this->id_categorie;
    }
    function getId_contact(): string
    {
        return $this->id_contact;
    }

    function setId($id): void
    {
        $this->id = $id;
    }
    function setNom($nom): void
    {
        $this->nom = $nom;
    }
    function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }
    function setId_categorie($id_categorie): void
    {
        $this->id_categorie = $id_categorie;
    }
    function setId_contact($id_contact): void
    {
        $this->id_contact = $id_contact;
    }
}
?>