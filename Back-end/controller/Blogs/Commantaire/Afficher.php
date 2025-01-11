
<?php
require_once __DIR__ . '/../../../Model/commentaire.php';

require_once __DIR__ . '/../../../Model/database.php';

class afficherCommentaire {
    public static function affichersCommentaireArticle(){
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $articleId=1;
        $comment = Commantaire::afficherCommentairesPourArticle($pdo,$articleId);
        return $comment;
        
    }


}


?>
