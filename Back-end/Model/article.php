<?php

class Article {
    private $id;
    private $image;
    private $titre;
    private $description;
    private $status;
    private $themeId;
    private $clientId;

    public function __construct($id = null, $image = null, $titre = null, $description = null,  $themeId = null,$clientId=null) {
        $this->id = $id;
        $this->image = $image;
        $this->titre = $titre;
        $this->description = $description;
        $this->themeId = $themeId;
        $this->clientId = $clientId;
    }

    public function ajouterArticle($pdo) {

            $stm = $pdo->prepare("INSERT INTO Article (image, titre, description, id_theme,id_client) VALUES (?, ?,  ?, ?,?)");
            $stm->execute([$this->image, $this->titre, $this->description, $this->themeId,$this->clientId]);
            $this->id = $pdo->lastInsertId();
            return 'OK';
        
    }

    public function modifierArticle($pdo) {
        
            $stm = $pdo->prepare("UPDATE Article SET image = ?, titre = ?, description = ?, status = ?, id_theme = ? , id_client = ? WHERE id = ?");
            $stm->execute([$this->imagePath, $this->titre, $this->description, $this->status, $this->themeId, $this->clientId ,$this->id ]);
            return 'OK';
    }

    public static function supprimerArticle($pdo, $id) {
        
            $stm = $pdo->prepare("DELETE FROM tags_article WHERE id_article = ?");
            $stm->execute([$id]);

            $stm = $pdo->prepare("DELETE FROM Article WHERE id = ?");
            $stm->execute([$id]);
            return 'OK';
    }

    public static function afficherArticleById($pdo, $id) {
            $stm = $pdo->prepare("SELECT * FROM Article WHERE id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public static function afficherTousArticles($pdo) {
        
            $stm = $pdo->query("SELECT * FROM Article");
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function attacherTagArticle($pdo, $tagId) {
            $stm = $pdo->prepare("INSERT INTO tags_article (id_article, id_tag) VALUES (?, ?)");
            $stm->execute([$this->id, $tagId]);
            return 'OK';
    }

    public function detacherTagArticle($pdo, $tagId) {
        
            $stm = $pdo->prepare("DELETE FROM tags_article WHERE id_article = ? AND id_tag = ?");
            $stm->execute([$this->id, $tagId]);
            return 'OK';
        
    }


    public static function afficherTagsForArticle($pdo, $articleId) {
            $stm = $pdo->prepare("
                SELECT t.id, t.nom
                FROM tags t
                INNER JOIN tags_article ta ON t.id = ta.id_tag
                WHERE ta.id_article = :articleId
            ");
            $stm->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
}

?>