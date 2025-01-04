<?php
require_once __DIR__ . '/../Model/voiture.php';
require_once __DIR__ . '/../Model/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voitureId = $_POST['id'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix = $_POST['prix'];
    $disponibilite = $_POST['disponibilite'];
    $category_id = $_POST['id_categorie'];

    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();

    $voiture = Voiture::afficherVoitureId($pdo, $voitureId);
    $image = $voiture['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir('../' . $uploadDir)) {
            mkdir('../' . $uploadDir, 0777, true);
        }

        $fileName = uniqid() . '-' . basename($_FILES['image']['name']);
        $uploadFile2 = '../' . $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile2)) {
            $image = $uploadDir . $fileName; // Mise à jour de l'image si téléchargement réussi
        } else {
            echo "Failed to upload image.";
        }
    }

    $voitureE = new Voiture($voitureId, $marque, $modele, $annee, $prix, $disponibilite, $category_id, $image);
    $resultat = $voitureE->modifierVoiture($pdo);

    if ($resultat === 'OK') {
        echo "Car updated successfully!";
        header('Location: ../../front-end/admin/index.php');
        exit;
    } else {
        echo "Failed to update car: $resultat";
    }
}
?>
