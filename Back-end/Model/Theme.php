
<?php
class Theme {
    private $id;
    private $nom;
    private $image;
    private $description;

    public function __construct($id = null, $nom, $image,$description) {
        $this->id = $id;
        $this->nom = $nom;
        $this->image = $image;
        $this->description = $description;
    }

    public function ajouterTheme($pdo) {
        
        
            $stm = $pdo->prepare("INSERT INTO Theme (nom, image,description) VALUES (?, ?,?)");
            $stm->execute([$this->nom, $this->image,$this->description]);
            return 'OK';
        
    }

    public function modifierTheme($pdo) {
            $stm = $pdo->prepare("UPDATE Theme SET nom = ? , description = ? WHERE id = ?");
            $stm->execute([$this->nom,$this->description ,$this->id]);
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
