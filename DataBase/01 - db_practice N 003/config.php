<?php

$host = "localhost";
$dbname = "gestionStock";
$username = "root";
$password = "";
$tableName = 'produit';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    $stmt = $pdo->query("SELECT 1 FROM $tableName LIMIT 1");
    
} catch (PDOException $e) {
    die("Erreur de Connexion : " . $e->getMessage());
}

