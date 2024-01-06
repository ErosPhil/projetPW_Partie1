<?php
class CategorieModel{
    private $id;
    private $code_categorie;
    private $nom;

    function __construct($id, $code_categorie, $nom){
        $this->id = $id;
        $this->code_categorie = $code_categorie;
        $this->nom = $nom;
    }

    function getId(): string
    {
        return $this->id;
    }
    function getCode_categorie(): string
    {
        return $this->code_categorie;
    }
    function getNom(): string
    {
        return $this->nom;
    }

    function setId($id): void
    {
        $this->id = $id;
    }
    function setCode_categorie($code_categorie): void
    {
        $this->code_categorie = $code_categorie;
    }
    function setNom($nom): void
    {
        $this->nom = $nom;
    }
}
?>