<?php

class Voiture {
    // Déclaration des propriétés
    public $marque;
    public $modele;
    public $couleur;
    public $vitessActuelle = 0;
    public $vitessMax = 220;

    // Définition de la fonction details()
    public function details() {
        echo "Marque : $this->marque \n";
        echo "Vitesse Actuelle : $this->vitessActuelle km/h \n";
    }

    // Définition de la fonction accelerer()
    public function accelerer($acceleration) {

        $this->vitessActuelle += $acceleration;
        if ($this->vitessActuelle > $this->vitesseMax) {
            $this->vitessActuelle = $this->vitesseMax;
            echo "Vitesse Maximale atteinte !\n";
        }
        echo "La voiture accélére á $this->vitesseActuelle km/h \n";
    }
}

// Création d'un premier objet Voiture
$voiture1 = new Voiture();
$voiture1->marque = "reunault";
$voiture1->modele = "clio 2 classique";
$voiture1->couleur = "Blue";
$voiture1->details();
$voiture1->accelerer(50);
$voiture1->accelerer(100);
$voiture1->accelerer(100);
$voiture1->details();


// --------------------------- 
// avec le constructeur

class Voiture {
    public $marque;
    public $modele;
    public $couleur;
    public $vitessActuelle = 0;
    public $vitessMax = 220;

    // Définition du constructeur
    public function __construct($marque, $modele, $couleur) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
    echo "Nouvelle voiture créée : " . $this->marque . " " . $this->modele . "\n";
    }

    public function details() {
        echo "Marque : $this->marque \n";
        echo "Vitesse Actuelle : $this->vitessActuelle km/h \n";
    }

    public function accelerer($acceleration) {

        $this->vitessActuelle += $acceleration;
        if ($this->vitessActuelle > $this->vitesseMax) {
            $this->vitessActuelle = $this->vitesseMax;
            echo "Vitesse Maximale atteinte !\n";
        }
        echo "La voiture accélére á $this->vitesseActuelle km/h \n";
    }
}

// 1er objet
$voiture1 = new Voiture("Peugeot", "208", "Bleu");
$voiture1->details();
$voiture1->accelerer(50);
$voiture1->details();
// 2eme objet
$voiture2 = new Voiture("BMW", "Série 3", "Noire");
$voiture2->details();
$voiture2->accelerer(80);
$voiture2->details();


