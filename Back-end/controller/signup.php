<?php
    require_once('../Model/client.php');
    require_once('../Model/database.php');
    if ($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['submit'])) {
        $email=trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars($_POST['password']));
        $nom = trim(htmlspecialchars($_POST['nom']));
        if(empty($email) or empty($password)){
            echo "data is empty";
            return;
        }
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();

        $user = new Client(null,$nom,$email,$password,'client');
        $register=$user->register($pdo);
    }
?>