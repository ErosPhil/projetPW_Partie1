<?php
class EducateurDAO{
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateur");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateurs[] = new EducateurModel($row['id'], $row['email'], $row['mot_de_passe'], $row['is_admin'], $row['id_licence']);
            }
            return $educateurs;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getInfo($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT l.id, l.nom, l.prenom, l.id_categorie, l.id_contact FROM licencie l, educateur e WHERE l.id = e.id_licence AND e.id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'], $row['nom'], $row['prenom'], $row['id_categorie'], $row['id_contact']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
    public function create(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateur (email, mot_de_passe, is_admin, id_licence) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getEmail(), $educateur->getMot_de_passe(), $educateur->getIs_admin(), $educateur->getId_licence()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT e.id, e.email, e.mot_de_passe, e.is_admin, e.id_licence FROM educateur e WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['id'], $row['email'], $row['mot_de_passe'], $row['is_admin'], $row['id_licence']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }
    
    public function update(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE educateur SET email = ?, id_licence = ? WHERE id = ?");
            $stmt->execute([$educateur->getEmail(), $educateur->getId_licence(), $educateur->getId()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllLicencies() {
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

    public function deleteById($id) {
        try {
            $lEducateur = $this->getById($id);
            if($lEducateur != null && $lEducateur->getIs_admin() !=1){
                $stmt = $this->connexion->pdo->prepare("DELETE FROM educateur WHERE id = ?");
                $stmt->execute([$id]);
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getByEmail($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT e.id, e.email, e.mot_de_passe, e.is_admin, e.id_licence FROM educateur e WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['id'], $row['email'], $row['mot_de_passe'], $row['is_admin'], $row['id_licence']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }
}
?>