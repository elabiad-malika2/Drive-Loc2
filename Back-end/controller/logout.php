<?php
    require_once('../Model/user.php');
    $logout= User::logout();
    if ($logout) {
        header("Location: ../../front-end/login.php")
    }
?>