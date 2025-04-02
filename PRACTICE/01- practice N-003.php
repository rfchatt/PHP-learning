<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Exercice 4 : switch.
    $jour = 7;

    switch ($jour) {
        case 1:
            echo "Lundi";
            break;
        case 2:
            echo "Mardi";
            break;
        case 3:
            echo "Mercredi";
            break;
        case 4:
            echo "Jeudi";
            break;
        case 5:
            echo "vendredi";
            break;
        case 6:
            echo "Samedi";
            break;
        case 7:
            echo "Dimanche";
            break;
        default:
            echo "Pas de jour correspond a cet nombre";
    }

    ?>
</body>

</html>
