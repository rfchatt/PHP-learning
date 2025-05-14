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
