<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Exercice 1 : verification d'un Multiple.
    $nombre = 30;
    if ($nombre % 3 === 0 && $nombre % 5 === 0)
        echo "Le Nombre $nombre est un multiple de 3 et 5";
    else
        echo "Le nombre $nombre n'est pas un multiple de 3 et 5.";

    // --------------------

    // Exercice 2 : verfication d'un nombre pair.
    $nombre = 20;
    if ($nombre % 2 === 0)
        echo "Le nombre $nombre est pair";
    else
        echo "le nombre $nombre est impair"

    // --------------------

    // Exercice 3 : verification de la note.
    $note = 1;

    if ($note >= 10 && $note < 12)
        echo "Passable";
    elseif ($note >= 12 && $note < 14)
        echo "Assez bien";
    elseif ($note >= 14 && $note < 16)
        echo "Bien";
    elseif ($note >= 16 && $note <= 20)
        echo "Tres bien";
    else
        echo "La note n'est pas Correct";

    ?>
</body>

</html>
