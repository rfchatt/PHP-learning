<?php
//code connexion db
try {
    $conn = new PDO("mysql:host=localhost;dbname=gestionproduit_v2", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
