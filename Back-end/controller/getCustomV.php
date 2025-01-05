<?php
require_once __DIR__ . '/../Model/voiture.php';
require_once __DIR__ . '/../Model/database.php';

if (isset($_POST['start'])) {
    
    $start = (int)$_POST['start'];
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    $voiture = Voiture::getCustomVoiture($pdo, 2, $start);
    echo json_encode($voiture);
} else {
    echo json_encode(['error' => 'Invalid input']);
}
?>
