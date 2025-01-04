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
                $stm = $pdo->prepare($query);
                $stm->bindParam(':message', $this->message);
                $stm->bindParam(':stars', $this->stars);
                $stm->bindParam(':reservation_id', $this->reservation_id);
                $stm->bindParam(':archive', $this->archive, PDO::PARAM_BOOL);
                
                if ($stm->execute()) {
                    return "OK";
                } else {
                    return "No Ok";
                }
            
        }
        public function modifierAvis($pdo) {
                $query = "UPDATE avis SET message = :message, stars = :stars, reservation_id = :reservation_id, archive = :archive WHERE id = :id";
                $stm = $pdo->prepare($query);
                $stm->bindParam(':id', $this->id);
                $stm->bindParam(':message', $this->message);
                $stm->bindParam(':stars', $this->stars);
                $stm->bindParam(':reservation_id', $this->reservation_id);
                $stm->bindParam(':archive', $this->archive, PDO::PARAM_BOOL);
                
                if ($stm->execute()) {
                    return "OK";
                } else {
                    return "Not Ok";
                }
            
        }
        public static  function supprimerAvis($pdo, $id) {
                $query = "DELETE FROM avis WHERE id = :id";
                $stm = $pdo->prepare($query);
                $stm->bindParam(':id', $id);
                
                if ($stm->execute()) {
                    return "OK";
                } else {
                    return "Not Ok";
                }
        
        }
    
        public static  function afficherAvisId($pdo, $id) {
        
                $query = "SELECT * FROM avis WHERE id = :id";
                $stm = $pdo->prepare($query);
                $stm->bindParam(':id', $id);
                $stm->execute();
                
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return $result;
                } else {
                    return "Not Ok";
                }
            
        }
    

        public static  function afficherToutAvis($pdo) {    
                $query = "SELECT * FROM avis";
                $stm = $pdo->query($query);
                $reviews = $stm->fetchAll(PDO::FETCH_ASSOC);
                
                if ($reviews) {
                    return $reviews;
                } else {
                    return "Not Ok";
                }
        }
        public static function afficherAvisIdUserRes($pdo,$$idC,$idR){
            $stm=$pdo->prepare("SELECT a.* from avis a INNER JOIN reservation r on a.reservation_id = r.id where r.id_client=:id and a.reservation_id = :idRes ");
            $stm->execute(['id'=>$idC,'idRes'=>$idR]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
        public static function afficherAvisVoiture($pdo,$idV){
            $stm=$pdo->prepare("SELECT a.* from avis a inner join reservation r on a.reservation_id=r.id where r.car_id = :id");
            $stm->bind_param(':id':$id);
            $stm->execute();
            $resultat=$stm->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }


    }
?>