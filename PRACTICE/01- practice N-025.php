<?php

class Personne {
    private $nom;
    private $prenom;
    private $dateNaissance;
    public static $nombrePresonne;

    public function presenter() {
        return "Je m'appelle $this->nom $this->prenom";
    }

    public function age() {
        $aujourdhui = new DateTime();
        $age = $this->dateNaissance->diff($aujourdhui);
        return $age;
    }

    public static function getNombrePersonne() {
        return self::$nombrePresonne;
    }
}

// -------------------------

// connect the two files of php
include 'tableaux.php';

$p1 = new Personne("Lamine", "Yamal", "2007-01-01");
$p2 = new Personne("Cristiano", "Ronaldo", "1985-01-01");

echo $p1->presenter() . "<br>";
echo "Age : " . $p1->age() . " ans<br><br>";

echo $p2->presenter() . "<br>";
echo "Age : " . $p2->age() . " ans<br><br>";

// Affichage du nombre total de personne.
echo "Nombre total de personnes crées";
Personne::$nombrePresonne();
