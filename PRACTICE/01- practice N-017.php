<?php
// in this practice ==> Triage des Tableaux.
// Functions utilisée :
ksort(Table_name, SORT_ASC | SORT_DSC)
array_key_first() // => afficher la premiere clé du tableau trié.

// ----------

$stagiaires = [
    "12345" => "Lamine Yamal",
    "67890" => "Achraf hakimi",
    "24680" => "Karim Benzema",
    "13579" => "Cristaino Ronaldo",
    "97531" => "Leo Messi"
];
// 1. Trier le tableau par clés en ordre croissant (SORT_ASC)
ksort($stagiaires, SORT_ASC);
echo "Tri par clés (ordre Croissant) :<br>";
print_r($stagiaires);
// 2. Trier le Tableau par valeurs en ordre décroissant (SORT_DESC)
ksort($stagiaires, SORT_DESC);
echo "Tri par clés (ordre Décroissant) :<br>";
print_r($stagiaires);
// 3. Récupérer et Afficher la premiere clé du tableau trié
$premiereCle = array_key_first($stagiaires);
echo "<br> Premiere clé ...";
?>
