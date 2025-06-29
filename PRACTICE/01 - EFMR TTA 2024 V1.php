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
    $pdo = new PDO('mysql:host=$server_name;dbname=$db_name;port=$port',$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERMODE, PDO::ERMODE_EXCERTION);
    echo "Vous étes connectez avec la base de données !";
} catch (PDOExecption as $e) {
    echo "Erreur lors la connexion a la bese de données $e->getMessage()";
};

// B :

include "config.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
    $matricule = $_POST['matricule'];
    $motPasse = $_POST['motPasse'];
    
    if (empty($matricule) || empty($motPasse)) {
        echo 'veuillez remplir tout les champs';
        header('Location: login.php?erreur=1');
        exit();
    }
    
    $sql = $pdo->prepare('SELECT * FROM ResponsableFormation WHERE matricule = ? AND motPasse = ?');
    $sql->execute([$matricule, $motPasse]);
    $responsable = $sql->fetch();
    
    if ($matricule !== $responsable['matricule'] || $motPasse !== $responsable['motPasse']) {
        echo 'Matricule ou mot de passe incorrect';
        header('Location: login.php');
        exit();
    } else {
        $_SESSION['matricule'] = $matricule;
        header('Location: monCompte.php');
        exit();
    }
}

// C :

// C - 1) :
if (empty($_SESSION['matricule'])) {
    header("Location: login.php");
    exit();
}

// C - 2) a, b, c :
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
            <td><?php echo htmlspecialchars($idformation) ?></td>
            <td><?php echo htmlspecialchars($titre) ?></td>
            <td><img src="images/<?php $logo; ?>" width="50%" /></td>
            <td><?php echo htmlspecialchars($dateDebut) ?></td>
            <td><?php echo htmlspecialchars($dateFin) ?></td>
            <td><?php echo htmlspecialchars($duree) ?></td>
            <td><?php echo htmlspecialchars($nom . " " . $prenom) ?></td>
            <td><?php echo htmlspecialchars($statut) ?></td>
            <td>
                <a href="annuler=<? $formation['idFormation'] ?>">Annuler</a><br>
                <a href="terminer=<? $formation['idFormation'] ?>">Terminer</a> 
            </td>
        </tr>
      <?php endforeach;>

// D :

// D - 1) :
if (!empty($_FILES['logo']['name'])) {
    $dossier = 'images/';
    if (!is_dir($dossier)) {
        mkdir($dossier);
    };
    $photo = $_FILES['logo']['name'];
    $chemin = $dossier . $photo;
    move_uploaded_file($photo, $chemin);
}

// D - 2) a, b, c, d :
$idfomation_valide = /^F_20\d{2}_\d{3}$/;
if (!preg_match($idfomation_valide, $idfomation)) {
    echo "Format invalide !";
}

$sql = $pdo->prepare('SELECT idformation FROM formation WHERE idformation = ?');
$sql->execute([$idformation]);
$id = $sql->fetch();
if ($id) {
    echo "ID formation déja exits !";
};
$current_date = new DateTime();
if ($dateDebut > $current_date || $dateFin > $current_date) {
    echo "Date invalide !";
}

$sql = $pdo->prepare('INSERT INTO formation (idformation, titre, logo, dateDebut, dateFin, status, matriculeResponsable) 
        VALUES (?, ?, ?, ?, ?, 0, ?)');
$sql->execute([$idformation, $titre, $logo, $dateDebut, $dateFin, $_SESSION['matricule']]);

// D - 3)
header("Location: monCompte.php");
exit();

// E :

$sql = $pdo->prepare('SELECT statut FROM formation WHERE idformation = ?');
$sql->execute($idformation);
$formation = $sql->fetch();

if ($formation && $formation['statut'] == 0) {
    $pdo->prepare('DELETE * FROM formation WHERE idformation = ?');
        ->execute([$idformation]);
    echo "Formation annulée avec succès.";
} else {
    echo "Erreur: impossible d'Annuler un formation déjà terminée !";
};

// F :

$sql = $pdo->prepare('SELECT statut FROM formation WHERE idformation = ?');
$sql->execute($idformation);
$formation = $sql->fetch();

if ($formation && $formation['statut'] == 0) {
    $pdo->prepare('UPDATE formation SET statut = 1 WHERE idformation = ?');
        ->execute([$idformation]);
        echo "Formation marquée comme terminée";
} else {
    echo "Erreur: Action déja effectué !";
};

// I :

if (SESSION_STATUT() === PHP_SESSION_NONE) {
    session_start();
    session_destroy();
    header('Location: login.php');
    exit();
};


// ABDERRAFIE CHATE wish you a Good Luck ;) 
