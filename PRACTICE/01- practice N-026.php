<?php

class Personne
{
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;
    private $confirmationMotDePasse;
    private $dateNaissance;

    // Constructeur
    public function __construct($nom, $prenom, $email, $motDePasse, $confirmationMotDePasse, $dateNaissance)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->confirmationMotDePasse = $confirmationMotDePasse;
        $this->dateNaissance = $dateNaissance;
    }

    // Getters et setters
    public function getNom() { return $this->nom; }
    public function setNom($nom) { $this->nom = $nom; }

    public function getPrenom() { return $this->prenom; }
    public function setPrenom($prenom) { $this->prenom = $prenom; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getMotDePasse() { return $this->motDePasse; }
    public function setMotDePasse($motDePasse) { $this->motDePasse = $motDePasse; }

    public function getConfirmationMotDePasse() { return $this->confirmationMotDePasse; }
    public function setConfirmationMotDePasse($confirmationMotDePasse) { $this->confirmationMotDePasse = $confirmationMotDePasse; }

    public function getDateNaissance() { return $this->dateNaissance; }
    public function setDateNaissance($dateNaissance) { $this->dateNaissance = $dateNaissance; }

    // Validation des champs
    public function validation()
{
    // Réinitialiser le tableau d'erreurs (optionnel si tu veux garder les anciennes erreurs)
    $messageErreur = [];

    if (empty($this->nom)) {
        $messageErreur[] = "Nom obligatoire.";
    }
    if (empty($this->prenom)) {
        $messageErreur[] = "Prénom obligatoire.";
    }
    if (empty($this->email)) {
        $messageErreur[] = "Email obligatoire.";
    }
    if (empty($this->motDePasse)) {
        $messageErreur[] = "Mot de passe obligatoire.";
    }
    if (empty($this->confirmationMotDePasse)) {
        $messageErreur[] = "Confirmation du mot de passe obligatoire.";
    }
    if (empty($this->dateNaissance)) {
        $messageErreur[] = "Date de naissance obligatoire.";
    }


    if ($this->motDePasse !== $this->confirmationMotDePasse) {
        $messageErreur[] = "Le mot de passe et la confirmation ne correspondent pas.";
    }

    if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $this->dateNaissance)) {
        $messageErreur[] = "La date de naissance doit être au format jj/mm/aaaa.";
    } else {
        $dateParts = explode('/', $this->dateNaissance);
        if (!checkdate($dateParts[1], $dateParts[0], $dateParts[2])) {
            $messageErreur[] = "La date de naissance n'est pas valide.";
        } else {
            $dateNaissanceObj = DateTime::createFromFormat('d/m/Y', $this->dateNaissance);
            $aujourdhui = new DateTime();

            if ($dateNaissanceObj > $aujourdhui) {
                $messageErreur[] = "La date de naissance ne peut pas être supérieure à aujourd’hui.";
            }
        }
    }

    // Retourne true s’il n’y a pas d’erreurs
    return $messageErreur;
    }

    // Affichage des informations
    public function afficher()
    {
        return "Nom: {$this->nom}<br>" .
               "Prénom: {$this->prenom}<br>" .
               "Email: {$this->email}<br>" .
               "Date de naissance: {$this->dateNaissance}";
    }
}


// ---------------------------------------------------------------------------------------------


<?php
//require_once : Inclut le fichier uniquement s’il n’a pas déjà été inclus auparavant 
require_once 'Personne.php';
$messageErreur = [];
$resultat = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $personne = new Personne(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['motdepasse'],
        $_POST['confirmation'],
        $_POST['datenaissance']
    );
    $messageErreur=$personne->validation();
    if(empty($messageErreur)) {
        $resultat = $personne->afficher();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Personne</title>
    <style>
        table {
            border-collapse: collapse;
            width: 45%;
        }
        td {
            padding: 8px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Formulaire</h2>
    <form method="post">
        <table border="1" >
            <tr>
                <td>Nom :</td>
                <td><input type="text" name="nom" value="<?= $_POST['nom'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td>Prénom :</td>
                <td><input type="text" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td>Mot de passe :</td>
                <td><input type="password" name="motdepasse"></td>
            </tr>
            <tr>
                <td>Confirmation mot de passe :</td>
                <td><input type="password" name="confirmation"></td>
            </tr>
            <tr>
                <td>Date de naissance (jj/mm/aaaa) :</td>
                <td><input type="text" name="datenaissance" value="<?= $_POST['datenaissance'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Valider"></td>
            </tr>
        </table>
    </form>


    <?php
    echo '<div>';
    if (!empty($messageErreur)) {
        echo '<p style="color:red;">Erreurs :<br>' . implode('<br>', $messageErreur) . '</p>';
    }
    if (!empty($resultat)) {
        echo '<h3>Informations saisies :</h3><p>' . $resultat . '</p>';
    }
    echo '</div>';
    ?>

</body>
</html>
