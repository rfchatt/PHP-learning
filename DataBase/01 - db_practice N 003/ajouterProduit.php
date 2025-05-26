<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <h2>Ajouter un Produit :</h2>
        <label for='browser'>Categorie : </label>
        <input list='options' id='browser' name='browser' />
        <datalist id='options'>
            <option value='Nettoyage'>
            <option value='Cosmetique'>
            <option value='Electrique'>
        </datalist><br>

        <label for="designation">Désignation : </label>
        <input id="designation" type="text" name="designation"><br>

        <label for="designation">Catégorie : </label>
        <input id="categorie" type="text" name="categorie"><br>

        <label for="prix">Prix : </label>
        <input id="prix" type="number" name="prix"><br>

        <label for="quantite">Quantite : </label>
        <input id="quantite" type="text" name="quantite"><br>

        <label for="dateCreation">Date de Création : </label>
        <input id="dateCreation" type="date" name="dateCreation"><br>

        <button type="submit" name="ajouter">Ajouter un Produit</button>
    </form>

    <?php
    if (isset($_POST['ajouter'])) {
        $stmt = $pdo->prepare("INSERT INTO produit(designation, categorie, prix, quantite, dateCreation) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST["designation"],
            $_POST["categorie"],
            $_POST["prix"],
            $_POST["quantite"],
            $_POST["dateCreation"]
        ]);
        header("Location: index.php");
    }
    ?>

</body>

</html>
