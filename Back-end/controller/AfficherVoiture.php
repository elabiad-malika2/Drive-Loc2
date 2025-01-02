<?php



require_once ('/../Model/voiture.php');
require_once ('/../Model/database.php');

class getCar {
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
