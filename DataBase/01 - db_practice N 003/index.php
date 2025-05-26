<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Produits</title>
</head>

<body>
    <h2>Liste des Produits</h2>
    <a href="ajouterProduit.php">ajouter Produit</a>
    <br><br>
    <a href="rechercherProduit.php">Rechercher Produit</a>
    <br><br>
    <table border="1">
        <tr>
            <th>Réf</th>
            <th>designation</th>
            <th>categorie</th>
            <th>Prix</th>
            <th>quantité</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM $tableName");
        foreach ($stmt as $row) {
            echo "<tr>
                <td>{$row['Réf']}</td>
                <td>{$row['designation']}</td>
                <td>{$row['categorie']}</td>
                <td>{$row['prix']}</td>
                <td>{$row['quantite']}</td>
                <td>{$row['dateCreation']}</td>
                <td>
                    <a href='modifierProduit.php?ref=" . $row["Réf"] . "'>Modifier</a>
                    <a href='supprimerProduit.php?ref=" . $row["Réf"] . "
                    onclick='return confirm(\"Confirmer la suppression ?\")''>Supprimer</a>
                </td>
              </tr>";
        }
        ?>
    </table>
</body>

</html>
