<?php

require_once __DIR__ . '/../Model/voiture.php';
require_once __DIR__ . '/../Model/database.php';

        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $car = Voiture::getCountVoiture($pdo);
        echo json_encode($car);
?>