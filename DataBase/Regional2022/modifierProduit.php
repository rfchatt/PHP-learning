<?php
include("connexion.php");

if (!isset($_GET['ref'])) {
    header("Location: accueil.php?erreur=Produit introuvable");
    exit();
}

$ref = $_GET['ref'];
$stmt = $conn->prepare("SELECT * FROM Produit WHERE reference = ?");
$stmt->bindParam(1, $ref);
$stmt->execute();
$prod = $stmt->fetch();

if (!$prod) {
    header("Location: accueil.php?erreur=Produit introuvable");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-warning text-dark text-center">
                        <h4>Modifier un produit</h4>
                    </div>
                    <div class="card-body">
                        <form action="modifierProduitAction.php" method="POST">
                            <input type="hidden" name="reference" value="<?= htmlspecialchars($prod['reference']) ?>">

                            <div class="mb-3">
                                <label for="libelle" class="form-label">Libellé</label>
                                <input type="text" class="form-control" id="libelle" name="libelle" value="<?= htmlspecialchars($prod['libelle']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="prixUnitaire" class="form-label">Prix</label>
                                <input type="text" class="form-control" id="prixUnitaire" name="prixUnitaire" value="<?= htmlspecialchars($prod['prixUnitaire']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="dateAchat" class="form-label">Date d'achat</label>
                                <input type="date" class="form-control" id="dateAchat" name="dateAchat" value="<?= $prod['dateAchat'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="idCategorie" class="form-label">Catégorie</label>
                                <select class="form-select" id="idCategorie" name="idCategorie" required>
                                    <?php
                                    $catStmt = $conn->query("SELECT * FROM Categorie");
                                    while ($cat = $catStmt->fetch()) {
                                        $selected  = ($cat["idCategorie"] == $prod["idCategorie"]) ? "selected" : "";
                                        echo "<option value='{$cat["idCategorie"]}' $selected>{$cat["denomination"]}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>