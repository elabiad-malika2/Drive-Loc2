<?php
require_once __DIR__ . '/../Model/categorie.php';
require_once __DIR__ . '/../Model/database.php';
class getCategorie{
    static function afficherCategorie(){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $categories = Categorie::afficherCategories($pdo);
        return $categories;
    }
}
?>