<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php

    echo "<pre>"; // <pre> : pour centrer

    for ($i = 0; $i <= 10; $i++) {
      
        // boucle des espaces => 
        for ($j = 0; $j <= 10 - $i; $j++) {
            echo " ";
        }
      
        // boucle des etoiles =>
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br>";
    }

    echo "<pre>";

    // Result :
    //                    *                    
    //                   ***                    
    //                  *****
    //                 *******
    //                *********
    //               ***********
    //              *************
    //             ***************
    //            *****************
    //           *******************

    ?>
</body>

</html>
