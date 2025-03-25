// studied on 24 Mars 25
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <?php
    $tableau = [
        1 => "Pomme ",
        "2" => "Banane ",
        3.5 => "Orange ",
        true => "Poire "
    ];
    echo $tableau[1];
    echo $tableau[2];
    echo $tableau[3];

    $r = 5;
    $Pi = 3.14;
    $P = 2 * $Pi * $r;
    $S = $r ** 2 * $Pi;

    echo "Le Périmètre est : " . $P . "\n";
    echo "La Surface est : " . $S . "\n";

    // ---------------------------

    // >> Referrence
    $x = "PostgreSQL";
    $y = "MySQL";
    $z = &$x;
    $x = "PHP 5";
    $y = &$x;

    echo $x;
    echo $y;
    echo $z;

    // ---------------------------

    // >> permutation
    $a = " Tangier ";
    $b = " Morocco ";

    $c = $a;
    $a = $b;
    $b = $c;

    echo $a;
    echo $b;
    echo $c;

    // ---------------------------

    // >> maths 1
    $note_maths = 15;
    $note_francais = 12;
    $note_histoire_geo = 9;
    $moyenne = ($note_maths + $note_francais + $note_histoire_geo) / 3;

    echo "la moyenne est de" . number_format($moyenne, 2) . "/20";

    // ---------------------------

    // >> maths 2
    $prix_ht = 50;
    $tva = 20;
    $prix_ttc = 50 * (1 + $tva / 100);

    echo "le Prix Total TTC est : $prix_ttc DH";

    // ---------------------------

    // >> maths 2
    $n1 = 10;
    $n2 = 5;

    $result = $n1 / $n2;
    $result_int = (int) ($result);
    $rest = $n1 % $n2;

    echo "la resultat de divisio est : $result";
    echo "la resultat en intier est : $result_int";
    echo "le rest est : $rest";

    ?>
</body>

</html>
