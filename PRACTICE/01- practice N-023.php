<?php

// You can finde This file's Questions on the README file :) 

// ---------------

class Compte {
    // Déclaration des Proprietes.
    private $montant;
    private $interet;

    // Contructeur
    public function __construct($montant, $interet) {
        $this->montant = $montant;
        $this->interet = $interet;
    }

    public function get_montant() {
        return $this->montant;
    }

    public function un_an() {
        $this->montant *= 1 + ( $this->interet / 100 );
    }
}

$compte1 = new Compte(200, 20);
$compte2 = new Compte(1000, 2);
for ($i = 1; $i <= 10; $i++) {
    $compte1->un_an();
    $compte2->un_an();
}
echo "<p>Valeur de compte = " . $compte1->get_montant() . "</p>";
echo "<p>Valeur de compte = " . $compte2->get_montant() . "</p>";
