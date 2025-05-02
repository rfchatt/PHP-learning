<?php
  // functions used =>
  // explode() : to separate the string.
  // strtoupper() : change all Letters to Upper cases.
  // strtolower() : chnage all Letters to Lower cases.
  // ucfirst() : to specefic the first Letter.

  // Déclaration de la variable contenant le nom et le prénom.
   $nom_prenom = "chate aBDERRAFIE";
   // utilisation de la fonction == explode() == pour séparer le nom et le prénom.
   $parts = explode(" ", $nom_prenom);
   // Récupérer le nom (premiere partie) et le prénom (deuxieme partie).
   $nom = $parts[0];
   $prenom = $parts[1];
   // afficher le nom en MAJUSCULES == strtoupper() ==.
   $nom_majuscules = strtoupper($nom);
   echo $nom_majuscules . " ";
   // afficher le prénom en miniscule sauf la premiere lettre en majiscule.
   $prenom_miniscule = strtolower($prenom);
   $prenom_correct = ucfirst($prenom_miniscule);
   // afficher le prénom corrigé.
   echo $prenom_correct . "\n";
?>
