
<?php
class Tag {
    private $id;
    private $nom;


    public function __construct($id = null, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function ajouterTag($pdo) {
            $stm = $pdo->prepare("INSERT INTO Tag (nom) VALUES (?)");
            $stm->execute([$this->nom]);
            return 'OK';
        
    }

    public function modifierTag($pdo) {
        
            $stm = $pdo->prepare("UPDATE Tag SET nom = ? WHERE id = ?");
            $stm->execute([$this->nom, $this->id]);
            return 'OK';
    }

    public static function supprimerTag($pdo, $id) {
            $stm = $pdo->prepare("DELETE FROM Tag WHERE id = ?");
            $stm->execute([$id]);
            return 'OK';
        
    }

    public static function afficherTagById($pdo, $id) {
            $stm = $pdo->prepare("SELECT * FROM Tag WHERE id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        
    }

    public static function afficherTags($pdo) {

            $stm = $pdo->query("SELECT * FROM Tag");
            return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>
