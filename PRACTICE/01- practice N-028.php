<?php

class Produit {
    private $nom;
    private $prix;
    private $stock;

    public function __construct() {
        $this->nom;
        $this->prix;
        $this->stock;
    }

    public function __tostring() {
        return "Produit : $this->nom | Prix : $this->prix | Stock : $this->stock .";
    }

    public function __get($property) {
        if ($property == 'nom') {
            return $this->nom;
        }
        if ($property == 'prix') {
            return $this->prix;
        }
        if ($property == 'stock') {
            return $this->stock;
        } else {
            echo "La $property n'exist pas !";
        }
    }

    public function __set($property, $valeur) {
        if ($property == 'nom') {
            return $this->nom = $valeur;
        }
        if ($property == 'prix') {
            return $this->prix = $valeur;
        }
        elseif (!is_int($property == 'prix')) {
            return "Prix doit etre un nombre";
        }
        if ($property == 'stock') {
            return $this->stock = $valeur;
        }
        elseif (!is_int($property == 'stock')) {
            return "Stock doit etre un nombre";
        } else {
            echo "Impossible de modifier la propriété '$property'";
        }
    }


}
