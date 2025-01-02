<?php 
    class Avis {
        private $id;
        private $message;
        private $stars;
        private $reservation_id;
        private $archive = false;

        public function __construct($id = null, $message, $stars, $reservation_id) {
            $this->id = $id;
            $this->message = $message;
            $this->stars = $stars;
            $this->reservation_id = $reservation_id;
        }
        public function ajouterAvis($pdo) {
            
                $query = "INSERT INTO avis (message, stars, reservation_id, archive) VALUES (:message, :stars, :reservation_id, :archive)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':message', $this->message);
                $stmt->bindParam(':stars', $this->stars);
                $stmt->bindParam(':reservation_id', $this->reservation_id);
                $stmt->bindParam(':archive', $this->archive, PDO::PARAM_BOOL);
                
                if ($stmt->execute()) {
                    return "OK";
                } else {
                    return "No Ok";
                }
            
        }
        public function modifierAvis($pdo) {
                $query = "UPDATE avis SET message = :message, stars = :stars, reservation_id = :reservation_id, archive = :archive WHERE id = :id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':message', $this->message);
                $stmt->bindParam(':stars', $this->stars);
                $stmt->bindParam(':reservation_id', $this->reservation_id);
                $stmt->bindParam(':archive', $this->archive, PDO::PARAM_BOOL);
                
                if ($stmt->execute()) {
                    return "OK";
                } else {
                    return "Not Ok";
                }
            
        }
        public  function supprimerAvis($pdo, $id) {
                $query = "DELETE FROM avis WHERE id = :id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id', $id);
                
                if ($stmt->execute()) {
                    return "OK";
                } else {
                    return "Not Ok";
                }
        
        }
    
        public  function afficherAisId($pdo, $id) {
        
                $query = "SELECT * FROM avis WHERE id = :id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return $result;
                } else {
                    return "Not Ok";
                }
            
        }
    

        public  function afficherToutAvis($pdo) {    
                $query = "SELECT * FROM avis";
                $stmt = $pdo->query($query);
                $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if ($reviews) {
                    return $reviews;
                } else {
                    return "Not Ok";
                }
        }

    }
?>