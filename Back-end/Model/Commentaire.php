
<?php

class Commantaire {
    private $id;
    private $articleId;
    private $userId;
    private $commantaire;

    public function __construct($id = null, $articleId = null, $userId = null, $commantaire = null) {
        $this->id = $id;
        $this->articleId = $articleId;
        $this->userId = $userId;
        $this->commantaire = $commantaire;
    }

    public function ajouterCommantaire($pdo) {
            $stm = $pdo->prepare("INSERT INTO Commantaire (id_article, id_client, Commantaire) VALUES (?, ?, ?)");
            $stm->execute([$this->articleId, $this->userId, $this->commantaire]);
            $this->id = $pdo->lastInsertId();
            return 'OK';
        
    }

    public function modifierCommantaire($pdo) {
        
            $stm = $pdo->prepare("UPDATE Commantaire SET Commantaire = ? WHERE id = ?");
            $stm->execute([$this->commantaire, $this->id]);
            return 'OK';
       
    }

    public static function supprimerCommantaire($pdo, $id) {
        
            $stm = $pdo->prepare("DELETE FROM Commantaire WHERE id = ?");
            $stm->execute([$id]);
            return 'OK';
        
    }

    public static function afficherCommantaireById($pdo, $id) {
       
            $stm = $pdo->prepare("SELECT * FROM Commantaire WHERE id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        
    }

    public static function afficherCommentairesPourArticle($pdo, $articleId) {

            $stm = $pdo->prepare("SELECT c.* ,p.nom FROM Commantaire c , person p WHERE c.id_article = ? and p.id=c.id_client ");
            $stm->execute([$articleId]);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public static function afficherCommentairesByUser($pdo, $userId) {
        
            $stm = $pdo->prepare("SELECT * FROM Commantaire WHERE id_client = ?");
            $stm->execute([$userId]);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public static function afficherCommentaires($pdo) {
       
            $stm = $pdo->query("SELECT * FROM Commantaire");
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        
    }
}

?>
