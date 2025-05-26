<?php include 'config.php';

if (isset($_GET['ref'])) {
    $ref = $_GET['ref'];

    $stmt = $pdo->prepare("DELETE FROM $tableName WHERE `Réf` = :ref");
    $stmt->bindParam(':ref', $ref);

    if ($stmt->execute()) {
        header("Location: index.php?msg=suppression_ok");
        exit();

    } else { echo "Erreur lors de la suppression du produit."; }

} else { echo "Référence du produit manquante."; }

?>
