<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>TP - Transfert ZIP</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Transférez un fichier ZIP</b></legend>
            <table border="0">
                <tr>
                    <td>Choisissez un fichier :</td>
                    <td>
                        <input type="file" name="ficher" accept=".zip" required />
                        <!-- accept ajouté pour filtrer les ZIP côté client -->
                    </td>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" value="ENVOYER" /></td>
                </tr>
            </table>
        </fieldset>
    </form>

<!-- --------------------------------------------- -->
  
    <?php
    //echo $_FILES['ficher']['type'];
    if (isset($_FILES['ficher'])) {
        // Vérification de la taille
        if ($_FILES['ficher']['size'] > 1000000) {
            echo "<b>Taille trop grande</b><hr />";
            echo "Taille maximale autorisée : 1 000 000 octets<hr />";
            echo "Taille du fichier transféré : " . $_FILES['ficher']['size'] . " octets<hr />";
        }
        // Vérification du type MIME

        elseif ($_FILES['ficher']['type'] !== 'application/zip') {
            echo "<b>Erreur :</b> Le fichier n’est pas un fichier ZIP.<hr />";
        } else {
            // Déplacement du fichier transféré
            $uploadSuccess = move_uploaded_file($_FILES['ficher']['tmp_name'], basename($_FILES['ficher']['name']));
            if ($uploadSuccess) {
                echo "<b>Fichier transféré avec succès !</b><hr />";
                echo "Nom du fichier : " . htmlspecialchars($_FILES['ficher']['name']) . "<hr />";
                echo "Taille du fichier : " . $_FILES['ficher']['size'] . " octets<hr />";
            } else {
                echo "<b>Erreur de transfert n°</b> " . $_FILES['ficher']['error'] . "<hr />";
            }
        }
    }
    ?>
</body>

</html>
