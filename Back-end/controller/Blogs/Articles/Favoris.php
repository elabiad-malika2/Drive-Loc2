<?php
require_once __DIR__ . '/../../../Model/article.php';
require_once __DIR__ . '/../../../Model/Tag.php';
require_once __DIR__ . '/../../../Model/database.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $database = new GestionBaseDeDonnees();
    $pdo = $database->getConnection();
    $user_id = $_SESSION['id'];

     if(isset($_POST['article_id'])){
        $articleId = $_POST['article_id'];
        
        Article::addToFavori($pdo,$articleId,$user_id);

        echo json_encode(['status' => 'success']);
        $articleId = $_POST['article_id'];
        $res = Article::checkFavori($pdo,$articleIed,$user_id);
        echo json_encode($res); 
//  else if (isset($_GET['totalFavori'])) {
//     $articleIed = $_GET['totalFavori'];
//     $res = Article::totalLike($pdo,$articleIed);
//     echo json_encode($res); 
// } 
     }
}
?>