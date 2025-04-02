<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Exercice 5 : while / do while.
    $nombre = 0;

    while ($nombre <= 20) {
        $nombre += 2;
        if ($nombre == 10) {
            echo "<strong>$nombre</strong><br>";
        } else {
            echo "le nombre apres l'incrementation $nombre<br>";
        }
    }

    ?>
</body>

</html>
