<?php

// PARTIE THÉORIQUE :

// 1 )

/*
la difference:
    STATIQUE-> langauges comme HTML, CSS.
            -> Base de base de données.
            -> ex : portfolio.
    DYNAMIQUE   -> langauges comme HTML, CSS, PHP.
                -> Une base de données.
                -> Coté serveur etc.. 
*/

// PARTIE THÉORIQUE :

// 1 )

// CREATE DATA BASE IF NOT EXISTS banque;
// USE banque;

// 2 )

class Modele {
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=banque','root','');
            $this->pdo->setAttribute(PDO::ATTR_ERMODE,PDO::ERMODE_EXCEPTION);
        } catch (PDOException as $e) {
            echo 'Erreur la connexion a la base données : ' . $e->getMessage();
        }
    }

    public function monPDO() {
        return $this->pdo;
    }
}

// 3 )

class client {
    public $id;
    public $nom;
    public $prenom;
    public $date_naissance;

    public function ajouter($nom, $prenom, $date_naissance) {
        $pdo = (new Modele())->monPDO();
        $sql = $pdo->prepare('INSERT INTO client (nom, prenom, date_naissance) VALUES (?,?,?)');
        $sql->execute([$nom, $prenom, $date_naissance]);
    }

    public function modifier($id) {
        $pdo = (new Modele();)->monPDO();
        $sql = $pdo->prepare('UPDATE client SET nom=?, prenom=?, date_naissance=? WHERE id=?');
        $sql->execute([$id]);
    }

    public function supprimer($id) {
        $pdo = (new Modele();)->monPDO();
        $sql = $pdo->prepare('DELETE * FROM client WHERE id=?');
        $sql->execute([$id]);
    }

    public function recuperer($id) {
        $pdo = (new Modele();)->monPDO();
        $sql = $pdo->prepare('INSERT * FROM client WHERE id=?');
        $sql->execute([$id]);
        $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

// 4 )

class compte {
    public $id;
    public $type;
    public $solde;
    public $id_client;

    public function ajouter($type, $solde, $id_client) {
        $pdo = (new Modele();)->monPDO();
        $sql = $pdo->prepare('INSERT INTO compte (type, solde, id_client) VALUES (?,?,?)');
        $sql->execute([$type, $solde, $id_client]);
    }

    public function modifier($id) {
        $pdo = (new Modele();)->monPDO();
        $sql = $pdo->prepare('UPDATE compte SET type=?, solde=?, id_client=? WHERE id=?');
        $sql->execute([$id]);
    }

    public function supprimer($id) {
        $pdo = (new Modele();)->monPDO();
        $sql = $pdo->prepare('DELETE * FROM compte WHERE id=?');
        $sql->execute([$id]);
    }

    public function recuperer($id) {
        $pdo = (new Modele();)->monPDO();
        $sql = $pdo->prepare('INSERT * FROM compte WHERE id=?');
        $sql->execute([$id]);
        $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

// 5 )
include 'Modele.php';
include 'client.php';
include 'compte.php';

$pdo = (new Modele())->monPDO();
$sql = $pdo->prepare('SELECT client.id, client.nom, client.prenom, compte.type, compte.solde FROM client JOIN compte ON client.id = compte.id_client');
$sql->execute([$id, $nom, $prenom, $type, $solde]);
$comptes = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Solde</th>
        <th>Client</th>
        <th>Actions</th>
    </tr>
    <?php foreach($comptes as $compte) ?>
    <tr>
        <td><?php htmlspecialchars($compte['id']) ?></td>
        <td><?php htmlspecialchars($compte['type']) ?></td>
        <td><?php htmlspecialchars($compte['solde']) ?></td>
        <td><?php htmlspecialchars($compte['nom'] . " " . $compte['prenom']) ?></td>
        <td>
            <a href="modifier.php?id=<? $compte['id'] ?>">Modifier Compte</a>
            <a href="supprimer.php?id=<? $compte['id'] ?>">Supprimer</a>
        </td>
    </tr>
    <? endforeach ?>
</table>
<?php

// 6 )

// 6 - Page Modifier :

$id = $_POST['id'];
$pdo = (new Modele())->monPDO();
$sql = $pdo->prepare('SELECT * FROM compte WHERE id=?');
$sql->execute([$id]);
$compte = $sql->fetch(PDO::FETCH_ASSOC);

?>
<table>
    <form method="post">
        <h1>Modifier les Infos de client ID : <? $compte['id'] ?></h1>
        <tr>
            <label>
                client ID : <? $compte['id'] ?>
            </label>
            <label>
                <input type="text"><?php htmlspecialchars($compte['id']) ?>
            </label>
            <label>
                <input type="number"><?php htmlspecialchars($compte['solde']) ?>
            </label>
            <button type="submit">Enregistrer</button>
        </tr>
    </form>
</table>
<?php

// 6 - Page Supprimer :

$id = $_POST['id'];
$pdo = (new Modele())->monPDO();
$sql = $pdo->prepare('DELETE * FROM compte WHERE id=?');
$sql->execute([$id]);
header('Location:accueil.php');
exit();

// 7 )

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $solde = $_POST['solde'];
    $id_client = $_POST['client'];

    $pdo = (new Modele())->monPDO();
    $sql = $pdo->prepare('INSERT INTO compte (type, solde, id_client) VALUES (?, ?, ?)');
    $sql->execute([$type, $solde, $id_client]);
    header('Location: index.php');
    exit();
}

$pdo = (new Modele())->monPDO();
$clients = $pdo->query('SELECT id, nom, prenom FROM client ORDER BY nom')->fetchAll(PDO::FETCH_ASSOC);

?>
<h1>Ajouter un Compte</h1>
<form method="post">
    <label for="type">Type de compte:</label><br>
    <input type="text" id="type" name="type" required><br><br>
    <label for="solde">Solde initial:</label><br>
    <input type="number" id="solde" name="solde" required><br><br>
    <label for="client">Client:</label><br>
    <select id="client" name="client" required>
        <option value="">Sélectionner un client</option>
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client['id'] ?>">
                <?= htmlspecialchars($client['nom'] . ' ' . $client['prenom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <button type="submit">Ajouter le compte</button>
</form>
<?php

// 8 )
...


// @rfchatt wish you a good luck ;)
