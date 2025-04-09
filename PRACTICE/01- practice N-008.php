<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1 - Méthode GET</title>
    <!-- just a css code -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- html code -->
    <div class="container">
        <h1>Exercice 1 : Transmission via GET</h1>

        <form>
            <label for="nom">Votre nom :</label>
            <input type="text" id="nom" name="nom" required>

            <input type="submit" value="Envoyer">
        </form>

    </div><br>

    <!-- php code -->
    <!-- in this file => $_GET[nomdeID] & $_SERVER["REQUEST_URI"] -->
    <?php
    echo "Bonjour <b>" . $_GET["nom"] . " </b><br>";
    echo "vou avez utilisé GET pour envoyer votre nom<br>";
    echo "URL actuelle : " . $_SERVER["REQUEST_URI"]
    ?>
</body>

</html>
