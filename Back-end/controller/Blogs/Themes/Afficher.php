
<?php
require_once __DIR__ . '/../../../Model/theme.php';
require_once __DIR__ . '/../../../Model/database.php';



class getTheme {
    static function afficherThemes(){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $themes = Theme::afficherThemes($pdo);
        return $themes;
    }
}

?>
