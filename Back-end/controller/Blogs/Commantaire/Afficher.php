
<?php
require_once __DIR__ . '/../../../Model/commentaire.php';

require_once __DIR__ . '/../../../Model/database.php';

class afficherCommentaire {
    public static function affichersCommentaireArticle($articleId){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $comment = Commantaire::afficherCommentairesPourArticle($pdo,$articleId);
        return $comment;
        
    }


}


?>
