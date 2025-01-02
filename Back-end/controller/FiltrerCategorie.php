<?php
require_once('../Model/voiture.php');
require_once('../Model/database.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $idCategorie=$_Post['idCategorie'];
    $pdo = $database->getConnection();
    // $voitures = Voiture::afficherVoitures($pdo);
    $voitures= Voiture::afficherVoitureCategorie($pdo,$idCategorie);
    echo json_encode($voitures);

}

?>