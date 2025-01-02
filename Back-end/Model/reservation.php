<?php
class Reservation {
    private $id;
    private $date_reservation;
    private $date_debut;
    private $date_fin;
    private $lieu;
    private $id_client;
    private $id_voiture;

    public function __construct($id = null, $date_reservation, $date_debut, $date_fin, $lieu, $id_client, $id_voiture) {
        $this->id = $id;
        $this->date_reservation = $date_reservation;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->lieu = $lieu;
        $this->id_client = $id_client;
        $this->id_voiture = $id_voiture;
    }

    public function ajouterReservation($pdo) {

        $stm = $pdo->prepare("INSERT INTO Reservation (date_reservation, date_debut, date_fin, lieu, id_client, id_voiture) VALUES (?, ?, ?, ?, ?, ?)");
        $stm->execute([$this->date_reservation, $this->date_debut, $this->date_fin, $this->lieu, $this->id_client, $this->id_voiture]);
        return 'OK';
    
    }

    public function modifierReservation($pdo) {
        $stm = $pdo->prepare("UPDATE Reservation SET date_reservation = ?, date_debut = ?, date_fin = ?, lieu = ?, id_client = ?, id_voiture = ? WHERE id = ?");
        $stm->execute([$this->date_reservation, $this->date_debut, $this->date_fin, $this->lieu, $this->id_client, $this->id_voiture, $this->id]);
        return 'OK';
    }

    public static function supprimerReservation($pdo, $id) {
        $stm = $pdo->prepare("DELETE FROM Reservation WHERE id = ?");
        $stm->execute([$id]);
        return 'OK';
    }

    public static function afficherReservationId($pdo, $id) { 
        $stm = $pdo->prepare("SELECT * FROM Reservation WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
        
    }

    public static function afficherTousReservation($pdo) { 

        $stm = $pdo->query("SELECT * FROM Reservation");
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    
    }
}
?>