<?php

// LES METHODES MAGIQUES :
// __construct() | __destruct() | __call() | __callStatic() | __get() & __set() | 
// used if a function or a property private or not exists..


// 1 : __construct() -----------------------------------------------------------------------------------------------------
// Déclaration d'une classe nommée 'User'
class User
{
    // Déclaration d'une propriété publique appelée '$name'
    public $name;

    // Déclaration du constructeur de la classe, qui s'exécute lors de la création d'une instance
    public function __construct($name)
    {
        // Affectation de la valeur du paramètre '$name' à la propriété de l'objet '$this->name'
        $this->name = $name;

        // Affiche le contenu de '$this->name' à des fins de débogage
        var_dump($this->name);
    }
}

// Création d'un nouvel objet 'User' avec le nom 'Timmy', ce qui déclenche le constructeur
$timmy = new User('Timmy');

// Affiche la propriété 'name' de l'objet '$timmy'
echo $timmy->name;


// 2 : __destruct() -----------------------------------------------------------------------------------------------------
// Déclaration d'une classe appelée Maison
class Maison
{
    // Déclaration de deux propriétés publiques : dame et monsieur
    public $dame;
    public $monsieur;

    // Constructeur appelé automatiquement lors de la création d'un objet de la classe
    public function __construct($dame, $monsieur)
    {
        // Initialisation des propriétés avec les valeurs fournies
        $this->dame = $dame;
        $this->monsieur = $monsieur;

        // Affichage d'un message de bienvenue
        echo "Bienvenue à la maison " . $this->dame . " & " . $this->monsieur . " !<br><br>";
    }

    // Destructeur appelé automatiquement lorsque l'objet est détruit (ex : avec unset())
    public function __destruct()
    {
        // Affichage d'un message lorsqu'un objet est détruit
        echo "Vous êtes sur le point de mourir " . $this->dame . " & " . $this->monsieur;
    }
}

// Création d'un objet Maison avec les noms 'Sarah' et 'Tom' comme résidents
$maison = new Maison('Sarah', 'Tom');

// Création d'un deuxième objet Maison avec d'autres noms
$maison_lac = new Maison('Señorita Épicée', 'Surfeur Californien');

// Destruction explicite de l'objet $maison, ce qui déclenche le destructeur pour cet objet
unset($maison);


// 3 : __call() -----------------------------------------------------------------------------------------------------
// Declaration d'une classe nommee Animal
class Animal
{
    // Methode privee, donc accessible uniquement a l'interieur de la classe
    private function crie($nom)
    {
        echo "$nom crie fort.<br>"; // Affiche un message indiquant que l'animal crie
    }

    // Methode magique __call : elle est appelee lorsqu'une methode inaccessible ou inexistante est invoquee
    public function __call($methode, $arguments)
    {
        // Verifie si la methode appelee existe dans la classe (meme si elle est privee)
        if (method_exists($this, $methode)) {
            // Si oui, on appelle cette methode avec les arguments fournis
            return call_user_func_array([$this, $methode], $arguments);
        } else {
            // Sinon, on affiche un message d'erreur
            echo "La methode '$methode' n'existe pas.";
        }
    }
}

// Instanciation de la classe Animal dans l'objet $chien
$chien = new Animal;

// Appel de la methode crie (qui est privee), mais intercepte par __call
$chien->crie("Rex"); // Resultat : "Rex crie fort."

// Appel d'une methode qui n'existe pas : test
$chien->test("Rex"); // Resultat : "La methode 'test' n'existe pas."


// 4 : __callStatic() -----------------------------------------------------------------------------------------------------
class Equipe
{
    // Cette méthode magique est appelée quand une méthode statique non définie est appelée
    public static function __callStatic($methode, $parametres)
    {
        // Affiche le nom de la méthode appelée et les paramètres passés
        var_dump($methode, $parametres);
    }
}

// Appel d'une méthode statique inexistante sur la classe Equipe
Equipe::fonctionStatiqueNonDefinieSurClasseEquipe('parametreUn', 'parametreDeux', 'parametreTrois');


// 5 : __get() & __set() -----------------------------------------------------------------------------------------------------
// Déclaration de la classe Personne
class Personne {
    // Propriété privée, inaccessible directement depuis l'extérieur
    private $nom = "Inconnu";

    // Méthode magique __get() : appelée lorsqu'on tente d'accéder à une propriété inaccessible
    public function __get($propriete) {
        // Si la propriété demandée est 'nom', on retourne sa valeur
        if ($propriete === 'nom') {
            return $this->nom;
        } else {
            // Sinon, on retourne un message d'erreur personnalisé
            return "Propriété '$propriete' non accessible";
        }
    }

    // Méthode magique __set() : appelée lorsqu'on tente de modifier une propriété inaccessible
    public function __set($propriete, $valeur) {
        // Si la propriété est 'nom', on autorise la modification
        if ($propriete === 'nom') {
            $this->nom = $valeur;
        } else {
            // Sinon, on affiche un message d'erreur
            echo "Impossible de modifier la propriété '$propriete'\n";
        }
    }
}

// Instanciation d'un objet Personne
$personne = new Personne();

// Accès en lecture à la propriété privée 'nom' via __get()
echo $personne->nom . "<br>"; // Affiche : Inconnu

// Modification de la propriété privée 'nom' via __set()
$personne->nom = "Alice";

// Lecture à nouveau pour vérifier la mise à jour
echo $personne->nom . "<br>"; // Affiche : Alice

// Tentative d'écriture sur une propriété qui n'existe pas ('age')
$personne->age = 30; // Affiche : Impossible de modifier la propriété 'age'


// 6 : __isset() -----------------------------------------------------------------------------------------------------
class Personne {
    private $nom = "Alice";
    private $age = null;

    public function __isset($propriete) {
        if ($propriete === 'nom') {
            return isset($this->nom);
        } elseif ($propriete === 'age') {
            return isset($this->age);
        } else {
            return false;
        }
    }
}

$personne = new Personne();

var_dump(isset($personne->nom));  // true (car $nom = "Alice")
var_dump(isset($personne->age));  // false (car $age = null)
var_dump(isset($personne->email)); // false (non défini) 


// 7 : __unset() -----------------------------------------------------------------------------------------------------
class Personne {
    private $nom = "Alice";
    private $age = 30;

    public function __unset($propriete) {
        if ($propriete === 'nom') {
            $this->nom = null;
        } elseif ($propriete === 'age') {
            $this->age = null;
        }
    }

    public function afficher() {
        echo "Nom : " . ($this->nom ?? 'non défini') . "<br>";
        echo "Âge : " . ($this->age ?? 'non défini') . "<br>";
    }
}

$personne = new Personne();
$personne->afficher();        // Nom : Alice / Âge : 30

unset($personne->nom);        // Appelle __unset('nom')
unset($personne->age);        // Appelle __unset('age')

$personne->afficher();        // Nom : non défini / Âge : non défini


// 8 : __tostring() -----------------------------------------------------------------------------------------------------
// Déclaration de la classe Personne
class Personne {
    // Propriétés privées
    private $nom;
    private $age;

    // Constructeur pour initialiser les propriétés
    public function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = $age;
    }

    // Méthode magique __toString()
    // Elle est appelée automatiquement lorsque l'objet est utilisé dans un contexte de chaîne
    public function __toString() {
        return "Nom : {$this->nom}, Âge : {$this->age} ans";
    }
}

// Création d’un objet Personne
$personne = new Personne("Alice", 30);

// Utilisation de l'objet dans un contexte d'affichage de chaîne
// Cela déclenche automatiquement l'appel à __toString()
echo $personne; // Affiche : Nom : Alice, Âge : 30 ans


// 9 : wakeup() -----------------------------------------------------------------------------------------------------
class Utilisateur {
    public $nom;
    public $etat;

    public function __construct($nom) {
        $this->nom = $nom;
        $this->etat = 'déconnecté';
    }

    public function __wakeup() {
        // Action exécutée lors de la désérialisation
        $this->etat = 'réactivé';
        echo "L'utilisateur $this->nom est réactivé.\n";
    }
}

// Création d’un objet et sérialisation
$u = new Utilisateur('Alice');
$donnees = serialize($u);

// Désérialisation (déclenche __wakeup)
$objetReconstitue = unserialize($donnees);
echo $objetReconstitue->etat; // Affiche : réactivé
