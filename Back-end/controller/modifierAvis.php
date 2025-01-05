<?php
require_once('../Model/avis.php');
require_once('../Model/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $id = trim(htmlspecialchars($_POST['avisIdEdit']));
    $message = trim(htmlspecialchars($_POST['messageEdit']));
    $stars = trim(htmlspecialchars($_POST['starsEdit']));
    $reservation_id = trim(htmlspecialchars($_POST['reservationId']));

    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();

    $avis = new Avis($id, $message, $stars, $reservation_id);

    $resultat = $avis->modifierAvis($pdo);

    if ($resultat == 'OK') {
        header('Location: ../../front-end/client/reservation.php');
        exit();
    } else {
        echo "Erreur lors de la modification de l'avis.";
    }
}
?>
