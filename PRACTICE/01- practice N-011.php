<?php
  // fumctions used => 
  // str_word_count() : count the number of words in a string.
  // substr_count() : count the number of a Letter in a string.

  // déclarer de la chaine de caracteres.
   $ch = "Bonjour tout le monde";
   // calculer du nombre des motes dans la chaine.
   $nombre_de_mots = str_word_count($ch);
   echo "Nombre de mots de la chaine :" . $nombre_de_mots . "\n";
   // déclaration du caractere a chercher.
   $c = 'o';
   // calculer du nombre d'occurences de ce caractére dans la chaine.
   $occurences = substr_count($ch, $c);
   // echo .....
?>
 
