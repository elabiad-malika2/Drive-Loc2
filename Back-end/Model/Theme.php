
<?php
class Theme {
    private $id;
    private $nom;
    private $image;

    public function __construct($id = null, $nom, $image) {
        $this->id = $id;
        $this->nom = $nom;
        $this->image = $image;
    }

    public function ajouterTheme($pdo) {
        
        
            $stm = $pdo->prepare("INSERT INTO Theme (nom, image) VALUES (?, ?)");
            $stm->execute([$this->nom, $this->image]);
            return 'OK';
        
    }

    public function modifierTheme($pdo) {
            $stm = $pdo->prepare("UPDATE Theme SET nom = ? WHERE id = ?");
            $stm->execute([$this->nom, $this->id]);
            return 'OK';
    }

    public static function supprimerTheme($pdo, $id) {
    
            $stm = $pdo->prepare("DELETE FROM Theme WHERE id = ?");
            $stm->execute([$id]);
            return 'OK';
    }

    public static function afficherThemeId($pdo, $id) {
        
            $stm = $pdo->prepare("SELECT * FROM Theme WHERE id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        
    }

    public static function afficherThemes($pdo) {
            $stm = $pdo->query("SELECT * FROM Theme");
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
