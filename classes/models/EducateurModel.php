<?php
class EducateurModel{
    private $id;
    private $email;
    private $mot_de_passe;
    private $is_admin;
    private $id_licence;

    function __construct($id, $email, $mot_de_passe, $is_admin, $id_licence){
        $this->id = $id;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->is_admin = $is_admin;
        $this->id_licence = $id_licence;
    }

    function getId(): string
    {
        return $this->id;
    }
    function getEmail(): string
    {
        return $this->email;
    }
    function getMot_de_passe(): string
    {
        return $this->mot_de_passe;
    }
    function getIs_admin(): string
    {
        return $this->is_admin;
    }
    function getId_licence(): string
    {
        return $this->id_licence;
    }

    function setId($id): void
    {
        $this->id = $id;
    }
    function setEmail($email): void
    {
        $this->email = $email;
    }
    function setMot_de_passe($mot_de_passe): void
    {
        $this->mot_de_passe = $mot_de_passe;
    }
    function setIs_admin($is_admin): void
    {
        $this->is_admin = $is_admin;
    }
    function setId_licence($id_licence): void
    {
        $this->id_licence = $id_licence;
    }
}
?>