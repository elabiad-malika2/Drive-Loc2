<?php

require_once('../Model/voiture.php');
require_once('../Model/database.php');

        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $voitures = Voiture::afficherVoitures($pdo);
        echo json_encode($voitures);
?>