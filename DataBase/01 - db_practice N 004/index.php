<?php

// il faut le modifier pour qu'il prenne les variables de session !!!

session_start();
include 'login.php';

// $user = $_SESSION['user'];
// $password = $_SESSION['password'];

if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
    header('Location: login.php');
    exit();
    echo ("Vous n'êtes pas connecté");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta> charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($user); ?> sur la page sécurisée !</h1><br>
    <p>Vous étes connecté.</p>
    <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>
