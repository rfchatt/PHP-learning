<?php
require "index.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['submit'])){
        $theme = $_POST['theme'];
        setcookie('theme',$theme, time() + 3600);
        header('Location: acceuil.php');
        exit();
    }
}



?>