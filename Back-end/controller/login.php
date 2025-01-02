<?php
    require_once('../Model/user.php');
    require_once('../Model/database.php');

    if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['email']) && isset($_POST['password'])) {
        $email=trim($_POST['email']);
        $password=trim($_POST['password']);
        if (empty($email) && empty($password)) {
            echo 'data vide';
            return;
        } 
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $user= new User(null,'',$email,$password,'');
        $login=$user->login($pdo);
        if ($login == 'OK') {
            if ($_SESSION['role'] == "admin") {
                header('Location: ../../front-end/admin/index.php');
            }else {
                header('Location: ../../front-end/client/index.php');
            }
        }


    }
?>