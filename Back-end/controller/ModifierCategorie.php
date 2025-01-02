<?php
require_once('../Model/categorie.php');
require_once('../Model/database.php');
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $id=trim(htmlspecialchars($_POST['id_categorie']));
    $nomCategorie=trim(htmlspecialchars($_POST['nomCategorie']));
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    $categorie=new Categorie($id,$nomCategorie);
    $reslutat=$categorie->modifierCategorie($pdo);
    if ($reslutat == 'OK') {
        header('Location: ../..front-end/admin');
    }
}
?>