<?
   // Date de naissance.
   $naissance = new DateTime("2005-07-06");
   // date actuelle
   $aujourdhui = new DateTime();
   // Calcul de la difference.
   $interval = $naissance->diff($aujourdhui);
   // affichage de l'age.
   echo "votre age est : " . $interval->y . "ans.";
   // trouver le jour de la semaine.
   $timestamp = mktime(0, 0, 0, 6, 7, 2005);
   $day_of_week = date("1", $timestamp); // "1" : Jour complete.
   echo "Le 6 Juillet 2005 était un : $day_of_week \n";
?>
