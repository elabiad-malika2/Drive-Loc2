<?php
require_once('../Model/avis.php');
require_once('../Model/database.php');
var_dump($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $avisId=$_GET['id'];
    var_dump('aaaaaaa',$avisId);
    if ($avisId) {
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $avis = Avis::softDeleteAvis($pdo,$avisId);
        if ($avis == 'OK') {
            header("Location: ../../front-end/client/reservation.php");
            exit();
        }else {
            echo "NOK";
        }

    }

}

?>