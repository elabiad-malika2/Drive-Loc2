<?php
require_once __DIR__ . '/../../../Model/Tag.php';
require_once __DIR__ . '/../../../Model/database.php';
echo'aaaa';
var_dump($_SERVER['REQUEST_METHOD']);
var_dump(isset($_POST['submit']));
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $nom=trim(htmlspecialchars($_POST['tagName']));
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    $tags= new Tag(null,$nom);
    $resultat=$tags->ajouterTag($pdo);
    if ($resultat=='OK') {
        header('Location: ../../../../front-end/admin/tags.php');
    }else {
        echo 'error';
    }
}

?>