
<?php
require_once __DIR__ . '/../Model/avis.php';
require_once __DIR__ . '/../Model/database.php';

class getAvis {
    public static function showAvisByIdUserRes($id,$idRes){

        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $avis = Avis::afficherAvisIdUserRes($pdo,$id,$idRes);

        return $avis;
    }
    public static function showAllAvis()
    {
        
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $avis = Avis::afficherToutAvis($pdo);

        return $avis;
    }
}
?>