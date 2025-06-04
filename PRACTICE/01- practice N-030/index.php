<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Sélectionnez votre thème préféré :</p>
    
    <form method="post" action="changer_theme.php">
        <input type="radio" name="theme" value="clair"> Clair<br>
        <input type="radio" name="theme" value="sombre"> Sombre<br>
        <input type="radio" name="theme" value="colore"> Coloré<br>
        <br>
        <input type="submit" name="submit" value="Valider">
    </form>
</body>
</html>