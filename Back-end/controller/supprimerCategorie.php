<?php
session_start();
require_once('../Model/categorie.php');
require_once('../Model/database.php');
$idC=$_GET['id'];
$database = new GestionBaseDeDonnees();
$pdo = $database->getConnection();
$resultat= Categorie::supprimerCategorie($pdo,$idC);
if ($resultat) {
    $_SESSION['succes']="Categorie supprimer";
}
header('Location: ../../front-end/admin');

?>