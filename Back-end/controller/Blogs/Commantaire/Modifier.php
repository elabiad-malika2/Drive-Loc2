<?php
require_once __DIR__ . '/../../../Model/Commentaire.php';
require_once __DIR__ . '/../../../Model/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
    
        $commantaire = $_POST['commantaire'];
        $commentId = $_POST['edit_id'];
        $comment = new Commantaire($commentId,null,null,$commantaire);

        $comment->modifierCommantaire($pdo);

        echo json_encode(['status' => 'success']);
}
?>
