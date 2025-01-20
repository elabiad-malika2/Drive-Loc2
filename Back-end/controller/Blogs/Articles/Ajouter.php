<?php
require_once __DIR__ . '/../../../Model/article.php';
require_once __DIR__ . '/../../../Model/Tag.php';
require_once __DIR__ . '/../../../Model/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();


        $uploadDir = 'uploads/';
        $fileName = uniqid() . '-' . basename($_FILES['image']['name']);
        $uploadFile = $uploadDir . $fileName;
        $uploadFile2 = '../../../' . $uploadDir . $fileName;

        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile2)) {
                throw new Exception("Failed to upload image");
            }
        } else {
            throw new Exception("Error uploading image: " . $_FILES['image']['error']);
        }
        $themeId = 1;
        $clientId=1;
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $selectedTagIds = $_POST['selected_tag_ids'];
        $tagIdsArray = explode(',', $selectedTagIds);
        var_dump($tagIdsArray);
        $article = new Article(null,$uploadFile,$titre,$description,$themeId,$clientId);
        $article->ajouterArticle($pdo); 

        foreach ($tagIdsArray as $tagId) {
            $article->attacherTagArticle($pdo,$tagId);
        }
        
        

        
    
}
?>