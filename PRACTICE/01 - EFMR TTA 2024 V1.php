Examen de Fin de Module.
Module : M-107 Sites Web Dynamiques.
Région : Tanger Tetouan Al-Housseima.
Année : 2023/2024.
Niveau : TS.

<?php

// ----- ----- ----- PARTIE THÉORIQUE ----- ----- ----- : 

// A :

1) b;
2) d;
3) d;
4) b;
5) d;
6) c;

// B :

class Logger {
  
  public $fichier;

// B - 1) a :
  public function __construct($fichier) {
      $this->fichier = $fichier;
      file_put_contents($thsi->fichier, "M107_EFM.txt");
  }

// B - 1) b :
  public function log($message) {
      $time = date("[Y-m-d H:i]");
      file_put_contents($this->fichier, $time $message);
  }
}

// B - 2) a :
$logger1 = new Logger("M107_EFM.txt");

// B - 2) b :
$logger1->log("Message 1");
$logger1->log("Message 2");
$logger1->log("Message 3");

// B - 2) c :
...

// ----- ----- ----- PARTIE PRATIQUE ----- ----- ----- : 

// A :

$server_name = 'localhost';
$db_name = 'gestionFormations';
$username = 'root';
$password = '';
$port = 3306;

try {
    $pdo = new PDO('mysql:host=$server_name, $username, $password, $port');
    $pdo->setAttribute(PDO::ATTR_ERMODE, PDO::ERMODE_EXCERTION);
    $sql = 'CREATE DATABASE IF NOT EXISTS $db_name';
    $pdo->exec($sql);
    echo "Vous étes connectez avec la base de données !";
} catch (PDOExecption as $e) {
    echo "Erreur lors la connexion a la bese de données $e->getMessage()";
};

// B :












