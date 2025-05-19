<?php

// static properties : acceder by using keyWord => self::property  OR  static::property.
class Produit {
    public static $tva = 0.2;
    public $prix;
    public function __construct($prix) {
        $this->prix = $prix;
    }
    public function prixTTC() {
        $this->prix * ( 1 + self::$tva );
    }
}

echo Produit::$tva; // Affiche : 0.2
$p = new Produit(100);
echo $p->prixTTC(); // Affiche : 120


// -------------------------------------

// static Methodes : acceder by using keyWord => className::Methodes
class Outils
{
    public static function direBonjour($nom)
    {
        return "Bonjour, $nom !";
    }
}

// Appel
echo Outils::direBonjour("Abderrafie"); // Affiche.

?>
