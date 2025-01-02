<?php
require 'database.php';
require 'user.php';


class Admin extends User {
    

    public function __construct($id = null, $nom, $email, $password, $role = 'admin') {
        parent::__construct($id,$nom,$email,$password,$role);
    }


}
?>