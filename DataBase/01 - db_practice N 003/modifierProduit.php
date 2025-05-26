<?php include 'config.php';

if (!isset($_GET["ref"])) {
    header("Location : index.php");
}

$ref = $_GET['ref'];
$stmt = $pdo->prepare("SELECT * FROM produit WHERE Ref = ? ");
$stmt->execute($ref);
$produit = $stmt->fetch();
if (isset($_POST['modifier'])) {
    $stmt = $pdo->prepare("UPDATE produit SET designation=?, categorie=?, prix=?, quantite=?, dateCreation=?");
    $stmt->execute([
        $_POST["designation"],
        $_POST["categorie"],
        $_POST["prix"],
        $_POST["quantite"],
        $_POST["dateCreation"],
        $ref
    ]);
}

