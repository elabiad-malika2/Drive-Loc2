<?php
require_once __DIR__ . '/../../../Model/theme.php';
require_once __DIR__ . '/../../../Model/database.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']) ){
    
        $nom = trim(htmlspecialchars($_POST['nomEdit']));
        $id = trim(htmlspecialchars($_POST['idEdit']));
        $description=trim(htmlspecialchars($_POST['descriptionEdit']));
        
    
        $database = new GestionBaseDeDonnees();
        $pdo = $database->getConnection();
        $theme = new Theme($id,$nom,null,$description);
        $res = $theme->modifierTheme($pdo);
        if($res == 'OK')
        {
            header('Location: ../../../../front-end/admin/themes.php');
        }
        else {
            echo "couldn't Modify Theme";
        }
        
        


} else {
    header('Location: ../../public');

}
?>