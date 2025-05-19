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
