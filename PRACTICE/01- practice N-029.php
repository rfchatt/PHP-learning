<?php
// Traitement des actions
$resultat = "";

// When form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Create cookie
    if (isset($_POST['creer'])) {
        $nom = trim($_POST['nom']);
        $age = trim($_POST['age']);
        $ville = trim($_POST['ville']);

        // Set cookie for 1 hour (3600 seconds)
        setcookie("nom", $nom, time() + 3600);
        setcookie("age", $age, time() + 3600);
        setcookie("ville", $ville, time() + 3600);
        $resultat = "Cookies crees avec succes !";
    }
}

// Read cookie
if (isset($_POST['lire'])) {
    if (isset($_COOKIE['nom']) && isset($_COOKIE['age']) && isset($_COOKIE['ville'])) {
        $resultat = "Nom : " . htmlspecialchars($_COOKIE['nom']) . "<br>" .
            "Age : " . htmlspecialchars($_COOKIE['age']) . "<br>" .
            "Ville : " . htmlspecialchars($_COOKIE['ville']);
    } else {
        $resultat = "Aucun cookie trouve.";
    }
}

// Delete cookie
if (isset($_POST['supprimer'])) {
    // To delete a cookie, set expiration time in the past
    setcookie("nom", "", time() - 3600);
    setcookie("age", "", time() - 3600);
    setcookie("ville", "", time() - 3600);
    $resultat = "Cookies supprimes avec succes !";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Portail Cookie PHP</title>
    <style>
        body {
            background-color: rgba(236, 249, 206, 0.9);
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 40px;
        }

        input,
        button {
            margin: 6px;
            padding: 8px;
            width: 250px;
        }

        .btns {
            margin-top: 20px;
        }

        .result {
            margin-top: 25px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2 style="color:green;">MonPortailCookie</h2>
    <h3>Portail de gestion des cookies (PHP uniquement)</h3>

    <form method="POST">
        <div>
            <label>Entrez votre nom :</label><br>
            <input type="text" name="nom" placeholder="Votre nom">
        </div>
        <div>
            <label>Entrez votre âge :</label><br>
            <input type="number" name="age" placeholder="Votre âge">
        </div>
        <div>
            <label>Entrez votre ville :</label><br>
            <input type="text" name="ville" placeholder="Votre ville">
        </div>

        <div class="btns">
            <button type="submit" name="creer">Créer Cookie</button>
            <button type="submit" name="lire">Lire Cookie</button>
            <button type="submit" name="supprimer">Supprimer Cookie</button>
        </div>
    </form>

    <div class="result">
        <?php
        //resultat
        echo $resultat
        ?>
    </div>

</body>

</html>
