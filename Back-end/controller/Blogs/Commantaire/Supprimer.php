
<?php
require_once __DIR__ . '/../../../Model/Commentaire.php';
require_once __DIR__ . '/../../../Model/database.php';
if($_SERVER['REQUEST_METHOD'] == 'GET')
{

    $idComment = $_GET['delete_id'];

    $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
    
    $result = Commantaire::supprimerCommantaire($pdo,$idComment);
    echo json_encode(['status' => 'success']);

}


?>
