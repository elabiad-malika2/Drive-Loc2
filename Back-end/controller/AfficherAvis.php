
<?php
require_once __DIR__ . '/../Model/avis.php';
require_once __DIR__ . '/../Model/database.php';

class getAvis {
    static function getAvisByIdUserRes($id,$idRes){

        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $avis = Avis::getAvisByIdUserRes($pdo,$id,$idRes);

        return $avis;
    }
    static function getAllAvis()
    {
        
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $avis = Avis::afficherToutAvis($pdo);

        return $avis;
    }
}
?>