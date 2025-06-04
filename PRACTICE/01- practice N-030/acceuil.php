<?php
    $theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'clair';
    
    $backgroundColor = '';
    switch($theme) {
        case 'clair':
            $backgroundColor = '#ffffff';
            break;
        case 'sombre':
            $backgroundColor = '#333333';
            break;
        case 'colore':
            $backgroundColor = 'yellow';
            break;
        default:
            $backgroundColor = '#ffffff';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="background-color: <?php echo $backgroundColor ?>;">
        <h1>Bienvenue sur notre site !</h1>
        
        <p>Voici le contenu du site personnalisé selon votre thème préféré.</p>
        
        <a href=" reset_theme.php">Réinitialiser le thème</a>
    </div>
</body>
</html>