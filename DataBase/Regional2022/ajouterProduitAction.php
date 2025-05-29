<?php
session_start();
include 'connexion.php';

// Préparation de la requête d'insertion
$photoName = '';
if (!empty($_FILES['photoProduit']['name'])) {
    $photoName = uniqid() . '_' . $_FILES['photoProduit']['name'];
    move_uploaded_file($_FILES['photoProduit']['name'], "images/$photoName");
}
$stmt = $conn->prepare("INSERT INTO produit (reference, libelle, prixUnitaire, dateAchat, photoProduit, idCategorie) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST['reference']);
$stmt->bindParam(2, $_POST['libelle']);
$stmt->bindParam(3, $_POST['prixUnitaire']);
$stmt->bindParam(4, $_POST['dateAchat']);
$stmt->bindParam(5, $photoName);
$stmt->bindParam(6, $_POST['idCategorie']);
$stmt->execute();

// Redirection vers l'accueil après ajout
header("Location: accueil.php?success=Produit ajouté avec succès");
exit();
