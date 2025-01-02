<?php
require_once('../Model/voiture.php');
require_once('../Model/database.php');

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $marque = (($_POST['marque']));
    $modele = (($_POST['modele']));
    $annee = (($_POST['annee']));
    $prix = (($_POST['prix']));
    $disponibilite = (($_POST['disponibilite']));
    $categoryId = (($_POST['category_id']));
    $carCount = $_POST['carCount'];
}

?>