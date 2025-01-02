<?php
    require_once('database.php');
    require_once('user.php');

    class Client extends User{

        public function __construct($id,$nom,$email,$password,$role){
            parent::__construct($id,$nom,$email,$password,$role);

        }
        public function register($pdo){
            $stm = $pdo->prepare("SELECT * from person where email = :email");
            $stm->execute(['email'=>$this->email]);
            $user = $stm->fetch();
            if ($user) {
                return false ;
            }
            $hashedPassword = password_hash($this->password,PASSWORD_DEFAULT);
            $stm = $pdo->prepare("INSERT INTO person (nom,password,email,role) values (:nom,:password,:email,:role)");
            $stm->execute([
                ':nom'=>$this->nom,
                ':password'=>$hashedPassword,
                ':email'=>$this->email,
                ':role'=>$this->role
            ]);
            return "Person cree avec succes";
        }
    }

?>