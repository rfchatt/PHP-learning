<?php
// functions utilisé :
array_map('strtolower', $mots);
array_map('strtoupper', $mots);
array_filter($mots, 'filter_a');



// --------

// Déclarer un tableau de chaine de caractere.
$mots = ["Bonjour", "VOITURE", "ecole", "Maison", "ORDINATEUR"];
// array_map : applique une fonction a chaque élément d'un tableau.
// 1. Convertir toutes les chaines en  minuscules.
$motsMinuscules = array_map('strtolower', $mots);
// 2. Convertir toutes les chaines en majuscules.
$motsMajuscules = array_map('strtoupper', $mots);
// 3. Filtrer les mots contenant la lettre 'a' (indépendamment de la case)
$motsAvecA = array_filter($mots, 'filter_a');
function filter_a($var)
{
    return stripos($var, 'a') !== false;
}

// affichage.
echo "tableau original : <br>";
print_r($mots);
echo "<br> Toutes les chaines en Minuscules :<br>";
print_r($motsMinuscules);
echo "<br> Toutes les chaines en Majuscules :<br>";
print_r($motsMajuscules);
echo "<br> mots contenant la Lettre 'a' :<br>";
print_r($motsAvecA);

?>
