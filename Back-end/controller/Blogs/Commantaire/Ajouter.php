<?php
require_once __DIR__ . '/../../../Model/Commentaire.php';
require_once __DIR__ . '/../../../Model/database.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();

        $clientId = $_SESSION['id'];
        $articleId = $_POST['idA'];
        $commantaire = $_POST['commantaire'];
   
        $comment = new Commantaire(null,$articleId,$clientId,$commantaire);
      
        $comment->ajouterCommantaire($pdo);

       

        echo json_encode(['status' => 'success']);
    
}