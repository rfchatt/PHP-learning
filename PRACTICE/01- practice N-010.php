<?php
// Initialisation des variables d'erreur
$erreurs = [];
$donnees_valides = false;

// Dossier pour stocker les fichiers telecharges
$dossier_upload = "uploads/";


// Verification si le formulaire a ete soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Fonction pour nettoyer les donnees
    function nettoyer($donnee) {
        // Suppression des espaces en debut et fin de chaine
        $donnee = trim($donnee);
        // Conversion des caracteres speciaux en entites HTML (securise contre les injections HTML/JavaScript)
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }

    // Recuperation et nettoyage des donnees
    $nom = isset($_POST['nom']) ? nettoyer($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? nettoyer($_POST['prenom']) : '';
    $email = isset($_POST['email']) ? nettoyer($_POST['email']) : '';
    $telephone = isset($_POST['telephone']) ? nettoyer($_POST['telephone']) : '';
    $cp = isset($_POST['cp']) ? nettoyer($_POST['cp']) : '';
    $genre = isset($_POST['genre']) ? nettoyer($_POST['genre']) : '';
    $poste = isset($_POST['poste']) ? nettoyer($_POST['poste']) : '';
    $message = isset($_POST['message']) ? nettoyer($_POST['message']) : '';
    
    // Recuperation des competences (tableau)
    $competences = isset($_POST['competences']) ? $_POST['competences'] : [];
    
    // Variables pour les fichiers
    $photo_path = "";
    $cv_path = "";
    
    // Validation : tous les champs sont obligatoires
    if (empty($nom)) {
        $erreurs[] = "Le nom est obligatoire";
    }
    
    if (empty($prenom)) {
        $erreurs[] = "Le prenom est obligatoire";
    }
    
    if (empty($email)) {
        $erreurs[] = "L'email est obligatoire";
    } else {
        // Validation : l'email doit contenir un et un seul caractere @
        $count = substr_count($email, '@');
        if ($count !== 1) {
            $erreurs[] = "L'email doit contenir exactement un caractere @";
        }
    }
    
    if (empty($telephone)) {
        $erreurs[] = "Le numero de telephone est obligatoire";
    } else {
        // Validation : le telephone doit être sous la forme (06 ou 05) 00 00 00 00
        // On supprime d'abord les espaces pour faciliter la validation
        $tel_clean = str_replace(' ', '', $telephone);
        if (!preg_match('/^(06|05)[0-9]{8}$/', $tel_clean)) {
            $erreurs[] = "Le numero de telephone doit être au format (06 ou 05) 00 00 00 00";
        }
    }
    
    if (empty($cp)) {
        $erreurs[] = "Le code postal est obligatoire";
    } else {
        // Validation : le code postal doit contenir 5 chiffres seulement
        if (!preg_match('/^[0-9]{5}$/', $cp)) {
            $erreurs[] = "Le code postal doit contenir exactement 5 chiffres";
        }
    }
    
    if (empty($genre)) {
        $erreurs[] = "Le genre est obligatoire";
    }
    
    if (empty($poste)) {
        $erreurs[] = "Le poste souhaite est obligatoire";
    }

    // Verification des competences (au moins une doit être selectionnee)
    if (empty($competences)) {
        $erreurs[] = "Veuillez selectionner au moins une competence";
    }
    
    if (empty($message)) {
        $erreurs[] = "Le message est obligatoire";
    }
    
    // Traitement de la photo

    // Traitement de la photo simplifie
    if (!empty($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        // Dossier pour stocker les fichiers telecharges
        $dossier_upload = "uploads/";
        $file_info = pathinfo($_FILES['photo']['name']);
        $photo_name = ($_FILES["photo"]["name"]);
        $extension = strtolower($file_info['extension']);
        $photo_path = $dossier_upload . uniqid() . '.' . $extension;
        $photo_path =$photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
        /*
            $photo_nom = $_FILES['photo']['name'];
            $chemin_photo = $dossier . $photo_nom;
            move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_photo);
        */
    }
    else {
        $erreurs[] = "La photo est obligatoire";
    }
    
    // Traitement du CV
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $file_info = pathinfo($_FILES['cv']['name']);
        $extension = strtolower($file_info['extension']);
        
        if ($extension == 'pdf') {
            $new_filename = uniqid() . '.pdf';
            $cv_path = $dossier_upload . $new_filename;
            
            if (!move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path)) {
                $erreurs[] = "Erreur lors du telechargement du CV";
                $cv_path = "";
            }
        } else {
            $erreurs[] = "Format de CV non autorise. Seul le format PDF est accepte";
        }
    } else {
        $erreurs[] = "Le CV est obligatoire";
    }
    
    // Si aucune erreur, les donnees sont valides
    if (empty($erreurs)) {
        $donnees_valides = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement du formulaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        
        h2 {
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        
        .erreur {
            color: red;
            background-color: #ffeeee;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table, th, td {
            border: 1px solid #ddd;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .bouton {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        
        .bouton:hover {
            background-color: #45a049;
        }
        
        .photo-preview {
            max-width: 200px;
            max-height: 200px;
            border: 1px solid #ddd;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Traitement du formulaire</h2>
    
 
        
        <?php if (!empty($erreurs)): ?>
            <div class="erreur">
                <strong>Des erreurs ont ete detectees :</strong>
                <ul>
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?php echo $erreur; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="index.html" class="bouton">Retour au formulaire</a>
        <?php else: ?>
            <h3>Recapitulatif des informations saisies</h3>
            
            <table>
                <tr>
                    <th>Champ</th>
                    <th>Valeur</th>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td><?php echo $nom; ?></td>
                </tr>
                <tr>
                    <td>Prenom</td>
                    <td><?php echo $prenom; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td><?php echo $telephone; ?></td>
                </tr>
                <tr>
                    <td>Code Postal</td>
                    <td><?php echo $cp; ?></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td><?php echo $genre; ?></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>
                        <?php if (!empty($photo_path)): ?>
                            <img src="<?php echo $photo_path; ?>" alt="Photo du candidat" class="photo-preview">
                        <?php else: ?>
                            Aucune photo telechargee
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Poste souhaite</td>
                    <td><?php echo $poste; ?></td>
                </tr>
                <tr>
                    <td>Competences</td>
                    <td>
                        <?php 
                        if (!empty($competences)) {
                            //implode : Retourne un tableau de chaines
                            echo implode(", ", $competences);
                        } else {
                            echo "Aucune competence selectionnee";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>CV</td>
                    <td>
                        <?php if (!empty($cv_path)): ?>
                            <a href="<?php echo $cv_path; ?>" target="_blank">Voir le CV</a>
                        <?php else: ?>
                            Aucun CV telecharge
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><?php echo nl2br($message); ?></td>
                </tr>
            </table>
            
            <a href="index.html" class="bouton">Retour au formulaire</a>
        <?php endif; ?>
        

</body>
</html>
