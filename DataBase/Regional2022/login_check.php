<?php
//session
session_start();

//connexiondb
include 'login.php';
include 'connexion.php';

// a.	le login ou le mot de passe est vide il renvoie vers la page login.php avec un message erreur - Veuillez saisir un login et un mot de passe. (2pts)
if (empty($_POST['login']) || empty($_POST['motPasse'])) {
    header("Location: login.php?erreur=veuillez saisir un login et un mot de passe.");
    exit();
}

// b.   le login ou le mot de passe est incorrect, il renvoie vers la page login.php avec une autre erreur – Erreur de login/mot de passe. (2pts)
$login = $_POST['login'];
$motPasse = $_POST['motPasse'];
$stmt = $conn->prepare("SELECT * FROM CompteProprietaire WHERE loginProp = ? AND motPasse = ?");
$stmt->bindParam(1, $login);
$stmt->bindParam(2, $motPasse);
$stmt->execute();
if ($stmt->rowCount() == 0) {
    header("Location: login.php?erreur=Erreur de login/mot de passe.");
    exit();
} else {
    $_SESSION['login'] = $login;
    header("Location: accueil.php");
    exit();
}

// c.	le login et le mot de passe sont correct, il renvoie vers la page accueil.php et crée une session avec la valeur du login. (3pts)
if ($login == $correct_login) {
}

