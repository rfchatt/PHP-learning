<?php

$servername = 'localhost';
$username = 'root';
$password = "";
$dbname = 'ma_nouvelle_base';

try {
    // Connexion au serveur MySQL (sans spécifier de base)
    $pdo = new PDO("mysql:host=$servername", $username, $password);
    // Configure PDO pour lancer des exceptions  en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Requet pour créer la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    // Excéption de la requete
    $pdo->exec($sql);
    echo "Base de données '$dbname' créée avec succés.";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la base de données : " . $e->getMessage();
}

