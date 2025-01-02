<?php
require_once('../Model/voiture.php');
require_once('../Model/database.php');

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    $marques = $_POST['marque'];
    $modeles = $_POST['modele'];
    $annees = $_POST['annee'];
    $prix = $_POST['prix'];
    $disponibilites = $_POST['disponibilite'];
    $categories = $_POST['category_id'];
    $images = $_FILES['image_path'];
    for ($i = 0; $i < count($marques); $i++) {
        $marque = htmlspecialchars($marques[$i]);
        $modele = htmlspecialchars($modeles[$i]);
        $annee = (int)$annees[$i];
        $prix = (float)$prix[$i];
        $disponibilite = (int)$disponibilites[$i];
        $category_id = (int)$categories[$i];

        // Traitement de l'image
        $imageName = $images['name'][$i];
        $imageTmp = $images['tmp_name'][$i];
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . basename($imageName);

        if (move_uploaded_file($imageTmp, $uploadFile)) {
            $voirure = new Voiture(null,$marque,$modele,$annee,$prix,$disponibilite,$category_id,$uploadFile);
            $res = $voirure->ajouterVoiture($pdo);
            echo $res;
        }
    }
} else {
    echo "aa";
}

?>