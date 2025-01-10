<?php
require_once __DIR__ . '/../../../Model/theme.php';
require_once __DIR__ . '/../../../Model/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    // Assurez-vous que 'nom' et 'description' sont des tableaux
    $noms = $_POST['nom'] ?? [];
    $descriptions = $_POST['description'] ?? [];
    
    // Boucler à travers les thèmes soumis
    foreach ($noms as $index => $nom) {
        $nom = trim(htmlspecialchars($nom));
        $description = trim(htmlspecialchars($descriptions[$index] ?? ''));

        if ($_FILES['image']['error'][$index] !== UPLOAD_ERR_OK) {
            echo "Error for file $index: " . $_FILES['image']['error'][$index] . "<br>";
            continue; // Passer à l'itération suivante si un fichier a une erreur
        }

        $uploadDir = 'uploads/';
        $fileName = uniqid() . '-' . basename($_FILES['image']['name'][$index]);
        $uploadFile = $uploadDir . $fileName;
        $uploadFile2 = '../../../' . $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'][$index], $uploadFile2)) {
            $image = $uploadFile;
            $database = new GestionBaseDeDonnees();
            $pdo = $database->getConnection();
            $theme = new Theme(null, $nom, $image, $description);
            $res = $theme->ajouterTheme($pdo);

            if ($res == 'OK') {
                header('Location: ../../../../front-end/admin/themes.php');
                exit;
            } else {
                echo "Couldn't add theme for entry $index";
            }
        }
    }
} else {
    echo 'erreur';
    exit;
}
?>