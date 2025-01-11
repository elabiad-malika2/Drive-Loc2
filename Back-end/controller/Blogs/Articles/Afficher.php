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


}
// var_dump(afficherArticle::afficherArticleThemes(1,5,0))

    


?>