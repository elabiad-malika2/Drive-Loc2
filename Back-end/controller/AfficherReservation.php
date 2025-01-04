
<?php

require_once __DIR__ . '/../Model/reservation.php';
require_once __DIR__ . '/../Model/database.php';

class getReservations {
    static function getAllReservations(){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $reservations = Reservation::getAllReservations($pdo);
        return $reservations;
    }
    static function getReservationById($id){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
     
        $reservation = Reservation::getReservationById($pdo,$id);
   
        return $reservation;
    }
    static function afficherReservationParClient($id)
    {
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
     
        $reservation = Reservation::afficherReservationParClient($pdo,$id);
   
        return $reservation;
    }
    
    

}
?>
