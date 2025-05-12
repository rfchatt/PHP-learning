<?php
// in this Practice we'll learn using those funstions :
array_merge() => // Pour fusionner les deux Tableaux.
array_unique() => // Pour les Nombres doublons entre les deux tableaux.
array_search() => // Pour chercher un element dans le tableau.

 
// 1. Définir les deux tableaux.
$tableau1 = [1, 2, 3, 4, 5];
$tableau2 = [3, 4, 5, 6, 7];
// 2. Fusionner les tableaux array_merge.
$tableauFusionne = array_merge($tableau1, $tableau2);
// 3. Supprimer les doublons avec array_unique.
$tableauUnique = array_unique($tableauFusionne);
// 4. Réindexer le tableau (Optionnel mais propre).
$tableauUnique = array_values($tableauUnique);
// 5. rechercher la position de l'élement 5.
$elementRecherche = 5;
$position = array_search($elementRecherche, $tableauUnique);
// Afficher des résultats.
echo "Tableau fusionné sans doublons : <br>";
print_r($tableauUnique);
if ($position !== false) {
    echo "<br> L'élement $elementRecherche se trouve á la position $position";
} else {
    echo "<br> L'élément $elementRecherche n'a pas été trouvé dans le tableau.";
}
