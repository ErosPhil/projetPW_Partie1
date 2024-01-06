<?php
class ContactModel{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $tel;

    function __construct($id, $nom, $prenom, $email, $tel){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tel = $tel;
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
    function getEmail(): string
    {
        return $this->email;
    }
    function getTel(): string
    {
        return $this->tel;
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
    function setEmail($email): void
    {
        $this->email = $email;
    }
    function setTel($tel): void
    {
        $this->tel = $tel;
    }
}
?>