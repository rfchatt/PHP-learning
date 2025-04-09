<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php

    // syntaxe of Arrays in PHP is different we use Array with () 

    $tableau = array(
        'Maroc' => "Rabat",
        'Espagne' => "Madrid",
        'Italie' => "Rome"
    );
    foreach ($tableau as $t) {
        echo $t . ' ';
    }
    

    ?>
</body>

</html>
