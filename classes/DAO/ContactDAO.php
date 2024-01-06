<?php
class ContactDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function create(ContactModel $contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO contact (nom, prenom, email, tel) VALUES (?, ?, ?, ?)");
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTel()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contact WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new ContactModel($row['id'],$row['nom'], $row['prenom'], $row['email'], $row['tel']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contact");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new ContactModel($row['id'],$row['nom'], $row['prenom'], $row['email'], $row['tel']);
            }
            return $contacts;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(ContactModel $contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE contact SET nom = ?, prenom = ?, email = ?, tel = ? WHERE id = ?");
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTel(), $contact->getId()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencie WHERE id_contact = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                return false;
            }else{
                $stmt = $this->connexion->pdo->prepare("DELETE FROM contact WHERE id = ?");
                $stmt->execute([$id]);
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
