<?php
class CategorieDAO{
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function getAll() {
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

    public function create(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO categorie (code_categorie, nom) VALUES (?, ?)");
            $stmt->execute([$categorie->getCode_categorie(), $categorie->getNom()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM categorie WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new CategorieModel($row['id'], $row['code_categorie'], $row['nom']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE categorie SET code_categorie = ?, nom = ? WHERE id = ?");
            $stmt->execute([$categorie->getCode_categorie(), $categorie->getNom(), $categorie->getId()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencie WHERE id_categorie = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                return false;
            }else{
                $stmt = $this->connexion->pdo->prepare("DELETE FROM categorie WHERE id = ?");
                $stmt->execute([$id]);
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>