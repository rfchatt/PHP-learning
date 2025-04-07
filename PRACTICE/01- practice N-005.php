
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // for loop :
    for ($i = 0; $i <= 10; $i++) {
        echo "$i - <br>";
    }

    // --
    for ($i = 0; $i <= 10; $i++) {
        if ($i % 2 === 0) {
            echo "$i est un nombre pair <br>";
        }
    }

    // --
    for ($i = 0; $i <= 10; $i++) {
        if ($i % 2 !== 0) {
            echo "$i est un nombre impair <br>";
        }
    }

// ----

// nested loops 
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $i;    // output => 1 \n 22 \n 333 \n 4444 \n 55555
        }
        echo "<br>";
    }

    ?>
</body>

</html>
