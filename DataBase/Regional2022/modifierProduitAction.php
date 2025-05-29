<?php
include("connexion.php");
$stmt = $conn->prepare("UPDATE Produit
                        SET libelle = ?, prixUnitaire = ?, idCategorie = ?
                        WHERE reference = ?");
$stmt->bindParam(2, $_POST['libelle']);
$stmt->bindParam(3, $_POST['prixUnitaire']);
$stmt->bindParam(4, $_POST['dateAchat']);
$stmt->bindParam(6, $_POST['idCategorie']);
$stmt->bindParam(1, $_POST['reference']);
$stmt->execute();
header("Location: accueil.php");
exit();
