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

session_start();
$matricule = $_POST['matricule'] ?? '';
$motPasse = $_POST['motPasse'] ?? '';

if (empty($matricule) || empty($motPasse)) {
    echo 'veuillez remplir tout les champs';
    header('Location: login.php?erreur=1');
    exit();
}

$sql = $pdo->prepare('SELECT * FROM ResponsableFormation WHERE matricule = ?');
$sql->execute([$matricule]);
$responsable = $sql->fetch();

if ($matricule !== $responsable['matricule'] || !password_verify($motPasse, $responsable['motPasse'])) {
    echo 'Matricule ou mot de passe incorrect';
    header('Location: login.php');
    exit();
} else {
    header('Location: monCompte.php');
    exit();
    $_SESSION['matricule'] = $matricule;
    $_SESSION['motPasse'] = $motPasse;
}

// C :

// C - 1) :
if (empty($_SESSION['matricule'])) {
    header("Location: login.php");
    exit();
}

// C - 2) a :
      $sql = $pdo->prepare('SELECT * FROM formation, ResponsableFormation WHERE matriculeResponsable = matricule ORDER BY dateDebut DESC');
      $sql->execute();
      $formations = $sql->fetchAll();
      .
      <?php foreach($formations as $formation);>
          $dateDebut = new DateTime($formation['dateDebut'])
          $dateFin = new DateTime($formation['dateFin'])
          $logo = $formation['logo']
          $duree = dateDebut->diff(dateFin)->days;
          $nom = $responsable['nom'];
          $prenom = $responsable['prenom'];
          $statut = $formation['formation'] == 0 ? "En cours" : "Terminée";
        <tr>
            <td>htmlspecialChars($idformation)</td>
            <td>htmlspecialChars($titre)</td>
            <td><img src="images/<?php $logo;>" width="50%" /></td>
            <td>htmlspecialChars($dateDebut)</td>
            <td>htmlspecialChars($dateFin)</td>
            <td>htmlspecialChars($duree)</td>
            <td>htmlspecialChars($nom . " " . $prenom)</td>
            <td>htmlspecialChars($statut)</td>
            <td>
                <a href="annuler=<? $formation['idFormation'] ?>">Annuler</a><br>
                <a href="terminer=<? $formation['idFormation'] ?>">Terminer</a> 
            </td>
        </tr>
      <?php endforeach;>










