<?php
//connexiondb
include "connexion.php";

if (!isset($_GET["ref"])) {
    header("Location: accueil.php?erreur=Produit introuvable");
    exit();
}

$ref = $_GET["ref"];
$stmt = $conn->prepare("DELETE FROM Produit WHERE reference = ?");
$stmt->bindParam(1, $ref);
$stmt->execute();
header("Location: accueil.php?success=PrduitSupprimé");
exit();
