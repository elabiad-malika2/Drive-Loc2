<?php
require_once('./Model/categorie.php');
require_once('./Model/database.php');

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $nom = trim(htmlspecialchars($_POST['nomCategorie']));
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    $categorie=new Categorie(null,$nom);
    $resultat=$categorie->ajouterCategorie($pdo);
    if ($resultat == 'OK') {
        header('Location: ../..front-end/admin');
    }

}
?>