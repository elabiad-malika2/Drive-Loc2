<?php
require_once __DIR__ . '/../Model/voiture.php';
require_once __DIR__ . '/../Model/database.php';
class getVoiture {
    static function afficherVoitures(){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $voitures = Voiture::afficherVoitures($pdo);
        return $voitures;
    }
    static function afficherVoitureId($id){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
     
        $voiture = Voiture::afficherVoitureId($pdo,$id);
   
        return $voiture;
    }
    
    

}
?>
