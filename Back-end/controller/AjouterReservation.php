<?php
session_start();
require_once('../Model/reservation.php');
require_once('../Model/database.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $lieu = $_POST['lieu'];
    $voiture_id = $_POST['voitureId'];
    $clientId = $_SESSION['id'];
    var_dump($clientId);
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();

        $reservation = new Reservation(null,null,$date_debut,$date_fin,$lieu,$clientId,$voiture_id );
        $result = $reservation->ajouterReservation($pdo);
        if($result == 'OK')
        {
            header('Location: ../../front-end/client/index.php');
        }
        else {
            echo $result;
        }
    }




?>