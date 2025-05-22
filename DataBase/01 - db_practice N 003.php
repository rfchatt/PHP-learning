<?php

$host = 'localhost';
$dbname = 'myfirstproject'; 
$username = 'root';
$password = '';

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Vous êtes maintenant connecté à $dbname sur $host.";
} catch (PDOException $e) {
    die("Impossible de se connecter à la base de donnée $dbname :" . $e->getMessage());
}

// 2- Créer une bdd appelée MyFirstProject
$req = "CREATE DATABASE IF NOT EXISTS MyFirstProject";
$connexion->exec($req);

// 3- Créer Table Utilisateur avec les champs Login et password
$requ = "CREATE TABLE IF NOT EXISTS utilisateur ( 
    id int(11) unsigned NOT NULL auto_increment PRIMARY KEY,
    login varchar(30) NOT NULL,
    password varchar(20) NOT NULL
    )";
$connexion->exec($requ);

// 4- Insérer des éléments dans la table utilisateur
$nomUser = "login";
$passwordUser = "password";
$statement = $connexion->prepare("INSERT INTO utilisateur (login, password) VALUES (?, ?)");
$statement->bindParam(1, $nomUser); // 1er"?"
$statement->bindParam(2, $passwordUser); //2ème "?"
$statement->execute();


// 5- Lister(Récupérer) les enregistrements d’un tableau
// a- Utilisation de prepare() + execute()
// Requête SQL
$requete = "SELECT login, password FROM utilisateur";
// Préparer la requête
$statement = $connexion->prepare($requete);
// Exécuter la requête
$statement->execute();
// Récupérer les résultats
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
// Afficher les résultats
foreach ($results as $row) {
    echo "Login: " . $row['login'] . ", Password: " .
        $row['password'] . "<br>";
}
// PDO::FETCH_ASSOC retourne chaque ligne de la requête
// sous forme de tableau associatif, où les clés sont les noms
// des colonnes de ta table, et les valeurs sont les valeurs
// des colonnes correspondantes.

// b- Utilisation de Query
// 1. Définir la requête SQL
$query = "SELECT login, password FROM utilisateur";
// 2. Exécuter directement la requête
$statement = $connexion->query($query);
// 3. Récupérer tous les enregistrements sous forme de tableaux associatifs
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

// 6- Modifier un enregistrement dans la bdd 
$sql = "UPDATE utilisateur
SET login = ?,
password = ?
WHERE id = ?";
$statement = $connexion->prepare($sql);
$statement->bindParam(1, $newLogin);
$statement->bindParam(2, $newPassword);
$statement->bindParam(3, $idUser);
$statement->execute();

// 7- Supprimer un enregistrement depuis la bdd 
// 1. Préparation de la requête DELETE
$sql = "DELETE FROM utilisateur WHERE id = ?";
$statement = $connexion->prepare($sql);
// 2. Liaison du paramètre (ici l'id de l'utilisateur)
$statement->bindParam(1, $idUser);
// 3. Exécution
$statement->execute();
