<?php
require_once('../Model/avis.php');
require_once('../Model/database.php');

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        $message = trim(htmlspecialchars($_POST['message']));
        $stars = trim(htmlspecialchars($_POST['stars']));
        $reservationId = trim(htmlspecialchars($_POST['reservation_id']));
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();

        $avis = new Avis(null,$message,$stars,$reservationId);
        $resultat = $avis->ajouterAvis($pdo);
        if ($resultat == 'OK') {
            header('Location: ../../front-end/client/reservation.php');
        }

}
?>