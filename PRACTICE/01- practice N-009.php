<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Candidature</title>
</head>

<body>

    <h2>Formulaire de Candidature</h2>

    <form action="traitement.php" method="post" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telephone">Numéro de téléphone :</label>
        <input type="tel" id="telephone" name="telephone" required><br><br>

        <label for="cp">Code Postal :</label>
        <input type="text" id="cp" name="cp" required><br><br>

        <label>Genre :</label>
        <input type="radio" name="genre" value="Masculin" required> Masculin
        <input type="radio" name="genre" value="Féminin" required> Féminin<br><br>

        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br><br>

        <label for="poste">Poste souhaité :</label>
        <select id="poste" name="poste">
            <option value="Développeur">Développeur</option>
            <option value="Designer">Designer</option>
            <option value="Administrateur Systèmes">Administrateur Systèmes</option>
            <option value="Autre">Autre</option>
        </select><br><br>

        <label>Compétences :</label><br>
        <input type="checkbox" name="competences[]" value="HTML"> HTML
        <input type="checkbox" name="competences[]" value="CSS"> CSS
        <input type="checkbox" name="competences[]" value="JavaScript"> JavaScript
        <input type="checkbox" name="competences[]" value="PHP"> PHP
        <input type="checkbox" name="competences[]" value="Python"> Python
        <br><br>

        <label for="cv">CV (PDF uniquement) :</label>
        <input type="file" id="cv" name="cv" accept=".pdf"><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" maxlength="500"></textarea><br><br>

        <input type="submit" value="Envoyer">
        <input type="reset" value="Annuler">
    </form><br><br>

    <!-- ----------- -->

    <!-- ----------- -->

</body>

</html>


<!-- --------------------------------------------------------- -->


<!-- file traitement.php qui est dans le => action="traitement.php" -->

<?php

$nom = htmlspecialchars($_POST["nom"] ?? '');
$prenom = htmlspecialchars($_POST["prenom"] ?? '');
$email = htmlspecialchars($_POST["email"] ?? '');
$telephone = htmlspecialchars($_POST["telephone"] ?? '');
$CodePostal = htmlspecialchars($_POST["cp"] ?? '');
$genre = htmlspecialchars($_POST["genre"] ?? '');

$photo_path = '';

if (!empty($_FILES["photo"]) && $_FILES["photo"]["error"] === 0) {
    $dossier_upload = "upload/";
    $file_info = pathinfo($_FILES['photo']['name']);
    $extension = strtolower($file_info['extension']);
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $photo_path = $dossier_upload . uniqid() . '.' . $extension;
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
}

$cv_path = '';

if (!empty($_FILES["cv"]) && $_FILES["cv"]["error"] === 0) {
    $dossier_upload = "upload/";
    $file_info = pathinfo($_FILES['cv']['name']);
    $extension = strtolower($file_info['extension']);
    $allowed_extensions = ['pdf', 'doc', 'docx'];
    $cv_path = $dossier_upload . uniqid() . '.' . $extension;
    move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path);
}

$poste = htmlspecialchars($_POST["poste"] ?? '');
$competence = htmlspecialchars($_POST["competences[]"] ?? '');
$message = htmlspecialchars($_POST["message"] ?? '');

?>

<table border=1 style="width: 35%;">
    <tr>
        <th>Champ</th>
        <th>Valeur</th>
    </tr>
    <tr>
        <td>Nom</td>
        <td><?php echo $nom ?></td>
    </tr>
    <tr>
        <td>Prénom</td>
        <td><?php echo $prenom ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $email ?></td>
    </tr>
    <tr>
        <td>Téléphone</td>
        <td><?php echo $telephone ?></td>
    </tr>
    <tr>
        <td>Genre</td>
        <td><?php echo $genre ?></td>
    </tr>
    <tr>
        <td>Poste souhaité</td>
        <td><?php echo $poste ?></td>
    </tr>
    <tr>
        <td>Compétences</td>
        <td><?php echo $competence ?></td>
    </tr>
    <tr>
        <td>Message</td>
        <td><?php echo $message ?></td>
    </tr>
    <tr>
        <td>Photo</td>
        <td><img src="<?php echo $photo_path ?>"></td>
    </tr>
    <tr>
        <td>CV</td>
        <td><a href="<?php echo $cv_path ?>" target="_blank">Télécharger le CV</a></td>
    </tr>
</table>
