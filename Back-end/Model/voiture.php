<?php
    class Voiture{
        private $id;
        private $marque;
        private $modele;
        private $annee;
        private $prix;
        private $disponibilite;
        private $category_id;
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
                ':annee'=>$this->annee,
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
        public function afficherVoitureId($pdo, $id){
            $stm=$pdo->prepare("SELECT * from voiture where id = :id");
            $stm->execute([':id'=>$this->id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
        public function afficherVoitureCategorie($pdo, $idCategorie){
            $stm=$pdo->prepare("SELECT * from voiture where id_categorie = :idCategorie");
            $stm->execute([':idCategorie'=>$this->idCategorie]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function afficherVoitures($pdo)
        {
            $stm=$pdo->prepare("SELECT * from voiture ");
            $stm->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function rechercherParModele($pdo)
        {
            
        }

    }

?>