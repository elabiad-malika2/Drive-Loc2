<?php
require_once __DIR__ . '/../Model/voiture.php';
require_once __DIR__ . '/../Model/database.php';
if($_SERVER['REQUEST_METHOD'] ==  'POST')
{

    $modele = $_POST['modele'];
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
        $voitures = Voiture::rechercherParModele($pdo,$modele);
        echo json_encode($voitures);
}
?>