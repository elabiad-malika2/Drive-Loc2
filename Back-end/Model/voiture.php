<?php
    class Voiture{
        private $id;
        private $marque;
        private $modele;
        private $annee;
        private $prix;
        private $disponibilite;
        private $id_categorie;
        private $image;

        public function __construct($id=null,$marque,$modele,$annee,$prix,$disponibilite,$category_id,$image){
            $this->id = $id ;
            $this->marque=$marque;
            $this->modele=$modele;
            $this->annee=$annee;
            $this->prix=$prix;
            $this->disponibilite=$disponibilite;
            $this->categorie_id=$category_id;
            $this->image=$image;
        }
        public function ajouterVoiture($pdo){
            $stm = $pdo->prepare("INSERT INTO voiture (marque, modele, annee, prix, disponibilite, id_categorie, image) 
            VALUES (:marque, :modele, :annee, :prix, :disponibilite, :id_categorie, :image)");
            $stm->execute([
            ':marque' => $this->marque,
            ':modele' => $this->modele, 
            ':annee' => $this->annee,
            ':prix' => $this->prix,
            ':disponibilite' => $this->disponibilite,
            ':id_categorie' => $this->category_id,
            ':image' => $this->image
            ]);
            return 'OK';
        }
        public function modifierVoiture($pdo){
            $stm = $pdo->prepare("UPDATE voiture set marque=:marque,modele=:modele,annee=:annee,prix=:prix,disponibilite=:disponibilite,id_categorie=:id_categorie,image=:image where id =:id");
            $stm->execute([
                ':marque'=>$this->marque,
                ':modele'=>$this->modele,
                ':annee'=>$this->annee,
                ':prix'=>$this->prix,
                ':disponibilite'=>$this->disponibilite,
                ':id_categorie'=>$this->id_categorie,
                ':image'=>$this->image,
                ':id'=>$this->id
            ]);
            return 'OK';
        }
        public function supprimerVoiture($pdo, $id){
            $stm = $pdo->prepare("DELETE from voiture where id = :id");
            $stm->execute([':id'=>$this->id]);
            return 'OK';
        }
        public static function  afficherVoitureId($pdo, $id){
            $stm=$pdo->prepare("SELECT * from voiture where id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
        public static function afficherVoitureCategorie($pdo, $idCategorie){
            $stm=$pdo->prepare("SELECT * from voiture where id_categorie = :idCategorie");
            $stm->execute([':idCategorie'=>$idCategorie]);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function afficherVoitures($pdo)
        {
            $stm=$pdo->prepare("SELECT * from voiture ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function rechercherParModele($pdo,$modele)
        {
            $modeleWithWildcards = "%" . $modele . "%";
        
            $stm = $pdo->prepare("SELECT * FROM VoitureView WHERE modele LIKE ?");
            $stm->execute([$modeleWithWildcards]);
            
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function getCountVoiture($pdo){
            $stmt = $pdo->prepare("SELECT COUNT(*) as totalCars from VoitureView");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public static function getCustomVoiture($pdo,$limit, $start){

            $stm = $pdo->prepare("SELECT * FROM VoitureView LIMIT :limit OFFSET :offset");
            $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stm->bindParam(':offset', $start, PDO::PARAM_INT);
            $stm->execute();

            $results = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }

    }

?>