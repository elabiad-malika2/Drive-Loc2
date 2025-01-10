<?php
require_once __DIR__ . '/../../../Model/Tag.php';
require_once __DIR__ . '/../../../Model/database.php';

class afficherTag {
    public static function afficherTousTag(){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $tags = Tag::afficherTags($pdo);
        return $tags;
        
    }


}

?>