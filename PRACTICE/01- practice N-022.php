<?php

// Getter & Setter in php.
// Private Properties.

class Voiture
{
    private $marque;
    private $module;
    private $couleur;
    private $vitessActuelle = 0;
    private $vitesseMax = 220;

    public function __construct($marque, $module, $couleur) {
        $this->marque = $marque;
        $this->module = $module;
        $this->couleur = $couleur;
    }

    // Getters
    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function getVitessActuelle() {
        return $this->vitesseActuelle;
    }

    public function getVitesseMax() {
        return $this->vitesseMax;
    }

    // Setter pour la couleur
    public function setCouleur($nouvelleCouleur) {
        $this->couleur = $nouvelleCouleur;
    }

    // Méthodes de comportement
    public function accelerer($acceleration) {
        $this->vitessActuelle += $acceleration;
        if ($this->vitessActuelle > $this->vitesseMax) {
            $this->vitessActuelle = $this->vitesseMax;
            echo "Vitesse maximale atteinte !<br>";
        }
        echo "La voiture Accélére á " . $this->vitesseActuelle . " km/h.<br>";
    }

    public function ralentir($deceleration) {
        $this->vitessActuelle -= $deceleration;
        if ($this->vitessActuelle < 0) {
            $this->vitessActuelle = 0;
            echo "la voiture est á l'arréte. <br>";
        }
        echo "La voiture ralentit á " . $this->vitesseActuelle . " km/h.<br>";
    }

    public function afficherDetaille() {
        echo "--- Détails de la voiture ---<br>";
        echo "Marque : $this->marque <br>";
        echo "Modéle : $this->modele <br>";
        echo "Couleur : $this->couleur <br>";
        echo "vitesse Actuelle : " . $this->getVitessActuelle() . " km/h. <br>";
        echo "vitesse Maximale : " . $this->getVitesseMax() . " km/h. <br>";
        echo "-------------------";
    }
}

// Section de test.
$voiture1 = new Voiture("Renault", "Clio Classique", "Blue");
$voiture1->afficherDetails();
$voiture1->accelerer(50);
$voiture1->accelerer(100);
$voiture1->accelerer(60); // Devrait atteindre la vitesse max
$voiture1->afficherDetails();

$voiture1->ralentir(80);
$voiture1->ralentir(150); // Devrait s'arrêter
$voiture1->afficherDetails();

// Tenter d'accéder directement à une propriété privée (doit générer une erreur)
// echo $voiture1->marque; // Décommentez pour tester l'erreur

// Utiliser un getter
echo "La marque de la voiture 1 est : " . $voiture1->getMarque() . "<br>";
// Changer la couleur
$voiture1->setCouleur("Noire");
$voiture1->afficherDetails();
?>
