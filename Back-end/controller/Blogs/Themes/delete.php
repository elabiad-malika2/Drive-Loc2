<?php
require_once __DIR__ . '/../../../Model/theme.php';
require_once __DIR__ . '/../../../Model/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id=$_GET['id'];
    if ($id) {
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $theme = Theme::supprimerTheme($pdo,$id);
        if ($theme == 'OK') {
            header('Location: ../../../../front-end/admin/themes.php');
            exit();
        }else {
            echo "NOK";
        }

    }

}

?>