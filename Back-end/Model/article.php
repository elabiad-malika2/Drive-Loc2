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
                
                $stm = $pdo->query("SELECT 
                                                (SELECT COUNT() FROM article) AS totalArticle, 
                                                ar.*
                                        FROM 
                                        article ar;");
                return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function afficherArticlesByThemeId($pdo,$idArticle,$limit,$offset) {


                
                $stm = $pdo->prepare("SELECT 
                                        (SELECT COUNT(*) FROM article) AS totalArticle, 
                                        ar.*
                                        FROM article ar
                                        WHERE id_theme = :id_theme limit :limit offset :offset");
                $stm->bindParam(':id_theme',$idArticle,PDO::PARAM_INT);
                $stm->bindParam(':limit',$limit,PDO::PARAM_INT);
                $stm->bindParam(':offset',$offset,PDO::PARAM_INT);
                $stm->execute();
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
                        FROM tag t
                        INNER JOIN tags_article ta ON t.id = ta.id_tag
                        WHERE ta.id_article = :articleId
                ");
                $stm->bindParam(':articleId', $articleId, PDO::PARAM_INT);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
        
        }
        public static function searchArticleByTitre($pdo, $titre, $themeId, $limit, $offset){
                $titreSearch = "%" . $titre . "%";
        
                $sql = "SELECT 
                        (SELECT COUNT(*) FROM article) AS totalArticle, 
                        ar.*
                        FROM article ar
                        WHERE id_theme = :id_theme AND titre LIKE :titre 
                        LIMIT :limit OFFSET :offset";

                $stm = $pdo->prepare($sql);

                $stm->bindParam(':id_theme', $themeId, PDO::PARAM_INT);
                $stm->bindParam(':titre', $titreSearch, PDO::PARAM_STR);

                $stm->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
                $stm->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function afficherArticleStatus($pdo) {

                $stm = $pdo->query("SELECT a.*, GROUP_CONCAT(t.nom SEPARATOR ', ') AS tags , art.id 
                                FROM tags_article art
                                JOIN article a ON a.id = art.id_article
                                JOIN tag t ON t.id = art.id_tag
                                WHERE a.status = 'Pending'
                                GROUP BY a.id;");
                return $stm->fetchAll(PDO::FETCH_ASSOC);

        }
        public static function addToFavori($pdo, $articleId,$userId) {
                $stm = $pdo->prepare("INSERT INTO favori (article_id, user_id) VALUES (:article_id,:user_id)");
                $stm->bindParam(':article_id', $articleId, PDO::PARAM_INT);
                $stm->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $stm->execute();
                return 'OK';
                
        }
        public static function checkFavori($pdo, $articleId,$userId) {
                    $stmt = $pdo->prepare("SELECT COUNT(*) as favori FROM favori where article_id = :article_id and user_id = :user_id");
                    $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
                    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
                    $stmt->execute();
                    return $stmt->fetch(PDO::FETCH_ASSOC);
               
            }

}

?>