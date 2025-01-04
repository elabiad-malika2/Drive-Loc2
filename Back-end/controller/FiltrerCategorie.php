<?php
require_once('../Model/voiture.php');
require_once('../Model/database.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $idCategorie=(int)$_POST['idCategory'];
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    // $voitures = Voiture::afficherVoitures($pdo);
    $voitures= Voiture::afficherVoitureCategorie($pdo,$idCategorie);
    echo json_encode($voitures);

}

?>