<?php
class LicencieDAO{
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencie");
            $licencies = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencies[] = new LicencieModel($row['id'], $row['nom'], $row['prenom'], $row['id_categorie'], $row['id_contact']);
            }
            return $licencies;
        } catch (PDOException $e) {
            return [];
        }
    }
    
    public function create(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencie (nom, prenom, id_categorie, id_contact) VALUES (?, ?, ?, ?)");
            $stmt->execute([$licencie->getNom(), $licencie->getPrenom(), $licencie->getId_categorie(), $licencie->getId_contact()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencie WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'], $row['nom'], $row['prenom'], $row['id_categorie'], $row['id_contact']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }
    
    public function update(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencie SET nom = ?, prenom = ?, id_categorie = ?, id_contact = ? WHERE id = ?");
            $stmt->execute([ $licencie->getNom(), $licencie->getPrenom(), $licencie->getId_categorie(), $licencie->getId_contact(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllCategories() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM categorie");
            $categories = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = new CategorieModel($row['id'], $row['code_categorie'], $row['nom']);
            }
            return $categories;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getAllContacts() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contact");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new ContactModel($row['id'], $row['nom'], $row['prenom'], $row['email'], $row['tel']);
            }
            return $contacts;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateur WHERE id_licence = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                return false;
            }else{
                $stmt = $this->connexion->pdo->prepare("DELETE FROM licencie WHERE id = ?");
                $stmt->execute([$id]);
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>