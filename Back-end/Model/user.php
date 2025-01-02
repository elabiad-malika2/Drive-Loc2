<?php
    session_start();
    class User{
        protected $id;
        protected $nom;
        protected $email;
        protected $password;
        protected $role;

        public function __construct($id,$nom,$email,$password,$role){
            $this->id = $id;
            $this->nom = $nom;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
        }

        public function login($pdo){
            $stm= $pdo->prepare("SELECT * FROM person where email = :email");
            $stm->execute(['email'=>$this->email]);
            $user= $stm->fetch();

            if ($user && password_verify($this->password,$user['password'])) {
                $_SESSION['id']=$user['id'];
                $_SESSION['role']=$user['role'];
                return 'OK';
            }
            return null ;
        }
        public function logout(){
            unset($_SESSION['id']);
            unset($_SESSION['role']);
            session_destroy();
            return true ;
        }



    }
?>