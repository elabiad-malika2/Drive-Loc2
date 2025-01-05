<?php
require_once('../Model/reservation.php');
require_once('../Model/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    $id = trim(htmlspecialchars($_POST['reservation_id']));

    if(isset($_POST['accept']))
    {
        $status = "Accepte";
        $resultat = Reservation::modifierStatus($pdo,$status,$id);
    
        if ($resultat == 'OK') {
            header('Location: ../../front-end/admin/reservation.php');
            exit();
        } else {
            echo "Erreur lors de la modification de l'avis.";
        }
    } else if(isset($_POST['refuse']))
    {
        $status = "Refuse";
        $resultat = Reservation::modifierStatus($pdo,$status,$id);
    
        if ($resultat == 'OK') {
            header('Location: ../../front-end/admin/reservation.php');
            exit();
        } else {
            echo "Erreur lors de la modification de l'avis.";
        }
    }
   
}
?>
