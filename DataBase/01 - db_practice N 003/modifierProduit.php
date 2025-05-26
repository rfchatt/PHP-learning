<?php
include 'config.php';

if (!isset($_GET["ref"])) {
    header("Location: index.php");
    exit();
}

$ref = $_GET['ref'];

$stmt = $pdo->prepare("SELECT * FROM produit WHERE Réf = ?");
$stmt->execute([$ref]);
$produit = $stmt->fetch();

if (isset($_POST['modifier'])) {
    $stmt = $pdo->prepare("UPDATE produit SET designation=?, categorie=?, prix=?, quantite=?, dateCreation=? WHERE Réf=?");
    $stmt->execute([
        $_POST["designation"],
        $_POST["categorie"],
        $_POST["prix"],
        $_POST["quantite"],
        $_POST["dateCreation"],
        $ref
    ]);
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
</head>

<body>
    <h2>Modifier Produit</h2>
    <form method="POST">
        <label>Désignation:
            <input type="text" name="designation" value="<?= htmlspecialchars($produit['designation'] ?? '') ?>" required>
        </label><br>

        <label>Catégorie:
            <input type="text" name="categorie" value="<?= htmlspecialchars($produit['categorie'] ?? '') ?>" required>
        </label><br>

        <label>Prix:
            <input type="number" name="prix" value="<?= htmlspecialchars($produit['prix'] ?? '') ?>" required>
        </label><br>

        <label>Quantité:
            <input type="number" name="quantite" value="<?= htmlspecialchars($produit['quantite'] ?? '') ?>" required>
        </label><br>

        <label>Date de Création:
            <input type="date" name="dateCreation" value="<?= htmlspecialchars($produit['dateCreation'] ?? '') ?>" required>
        </label><br>

        <button type="submit" name="modifier">Enregistrer les modifications</button>
    </form>
</body>

</html>
