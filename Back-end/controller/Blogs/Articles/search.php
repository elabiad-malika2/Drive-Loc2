<?php
require_once __DIR__ . '/../../../Model/article.php';
require_once __DIR__ . '/../../../Model/database.php';
class search{
    public static function searchArticle($titre,$themeId){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $articles = Article::searchArticleByTitre($pdo,$titre,$themeId,5,0);
        return $articles ;
    }
}
?>