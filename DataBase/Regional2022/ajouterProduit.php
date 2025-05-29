<?php
include("connexion.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Ajouter un produit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-lg">
          <div class="card-header bg-success text-white text-center">
            <h4>Ajouter un produit</h4>
          </div>
          <div class="card-body">
            <form action="ajouterProduitAction.php" method="POST" enctype="multipart/form-data"> <!-- -->
              <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
              </div>

              <div class="mb-3">
                <label for="prixUnitaire" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prixUnitaire" name="prixUnitaire" required>
              </div>

              <div class="mb-3">
                <label for="dateAchat" class="form-label">Date d'achat</label>
                <input type="date" class="form-control" id="dateAchat" name="dateAchat" required>
              </div>

              <div class="mb-3">
                <label for="photoProduit" class="form-label">Image</label>
                <input type="file" class="form-control" id="photoProduit" name="photoProduit" required>
              </div>

              <div class="mb-3">
                <label for="idCategorie" class="form-label">Catégorie</label>
                <select class="form-select" id="idCategorie" name="idCategorie" required>
                  <option value="Informatique">Informatiques</option>
                  <option value="biologique">Vehicules</option>
                  <option value="Autres">Autres</option>
                  <?php
                  //req lust Categorie
                  $stmt = $conn->query("SELECT * FROM Categorie");
                  while ($cat = $stmt->fetch()) {
                    echo "<option value='{$cat["idCategorie"]}'>{$cat["denomination"]}</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-success">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>