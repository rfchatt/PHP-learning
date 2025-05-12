<?php
// Files


function ecrireTableauDansFichier($tableau, $nomFichier)
{
    // convertir le tableau en une seul chaine avec des retours a la ligne (PHP_EOL)
    $contenu = implode(PHP_EOL, $tableau);
    // Écrire le contenu dans le fichier (écrase le fichier s'il existe)
    file_put_contents($nomFichier, $contenu);
}
$phrases = [
    "Bonjour tout le monde.",
    "Voici un fichier généré par PHP.",
    "Chaque ligne vient d'un élément du tableau."
];
ecrireTableauDansFichier($phrases, "sortie.txt");

// ---------------------------

function Afficher10PremieresLignes($nomFichier)
{
    $fichier = fopen($nomFichier, "r"); // Ouvre le fichier en lecture.
    $compteur = 0;
    while (!feof($fichier) && $compteur < 10) {
        $ligne = fgets($fichier); // fgets: Récupére la ligne courante.
        echo $ligne . "<br>"; // afficher la ligne (avec saut de ligne HTML).
        $compteur++;
    }
    fclose($fichier); // Ferme le fichier.
}
// Exemple d'utilisation :
Afficher10PremieresLignes("sortie.txt");

?>
