<?php

require_once __DIR__ . '/../Model/avis.php';
require_once __DIR__ . '/../Model/database.php';

        $carId = $_POST['carId'];
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $avis = Avis::afficherAvisVoiture($pdo,$carId);
        echo json_encode($avis);
?>