<?php

// >>>>> CREATION DE DATABASE <<<<<<<<<
$servername = 'localhost';
$username = 'root';
$password = "";
$dbname = 'ma_nouvelle_base';

try {
    // Connexion au serveur MySQL (sans spécifier de base)
    $pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    // Configure PDO pour lancer des exceptions  en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Requet pour créer la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    // Excéption de la requete
    $pdo->exec($sql);

    // >>>>>>>>  CREATE A TABLE <<<<<<<<<<<<
    $sql2 = "CREATE TABLE IF NOT EXISTS utilisateur(
    id int(11) unsigned NOT NULL auto_increment PRIMARY KEY,
    login VARCHAR(20) NOT NULL
    );";
    // EXcécution de la requete
    $pdo->exec($sql2);
    // -------

    echo "Base de données '$dbname' créée avec succés.<br>";

    // >>>>>>>>>>>>>>>>>>>>> CREATE AN UTILISAREUR
    try {
        // First try to drop user if exists
        $pdo->exec("DROP USER IF EXISTS 'user2'@'localhost'");
        // Then create user with password
        $pdo->exec("CREATE USER 'user2'@'localhost' IDENTIFIED BY '.monPass1!'");
        // Grant privileges to this user
        $pdo->exec("GRANT ALL PRIVILEGES ON $dbname.* TO 'user2'@'localhost'");
        $pdo->exec("FLUSH PRIVILEGES");
        echo "User 'user2' created and privileges granted successfully.<br>";
        
    } catch (PDOException $e) {
        echo "User creation error: " . $e->getMessage() . "<br>";
    }
    // -------

} catch (PDOException $e) {
    echo $e->getMessage();
}
