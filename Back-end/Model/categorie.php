<?php

class Categorie {
    private $id;
    private $nom;

    public function __construct($id=null, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }
    
    public function ajouterCategorie($pdo) {
            $stmt = $pdo->prepare("INSERT INTO Categorie (nom) VALUES (?)");
            $stmt->execute([$this->nom]);
            return "OK";
    }

    public function modifierCategorie($pdo) {
            if ($this->id === null) {
                throw new Exception("Categorie ID is required to modify the Categorie.");
            }
            $stmt = $pdo->prepare("UPDATE Categorie SET nom = ? WHERE id = ?");
            $stmt->execute([$this->nom, $this->id]);
            return "Ok";
    }
    public  function supprimerCategorie($pdo, $id) {
            $stmt = $pdo->prepare("DELETE FROM Categorie WHERE id = ?");
            $stmt->execute([$id]);
            return "OK";
    }

    public  function afficherCategorieId($pdo, $id) {
            $stmt = $pdo->prepare("SELECT * FROM Categorie WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    

    public function afficherCategories($pdo) {
            $stmt = $pdo->query("SELECT * FROM Categorie");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>

