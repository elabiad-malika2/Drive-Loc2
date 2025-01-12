<?php
require_once __DIR__ . '/../../../Model/article.php';
require_once __DIR__ . '/../../../Model/database.php';


class afficherArticle {
    public static function afficherArticleThemes($theme,$limit,$offset){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $articles = Article::afficherArticlesByThemeId($pdo,$theme,$limit,$offset);
        return $articles;
        
    }
    public static function afficherArticleStatus(){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $articles = Article::afficherArticleStatus($pdo);
        return $articles;
    }

}
// var_dump(afficherArticle::afficherArticleStatus());

    


?>