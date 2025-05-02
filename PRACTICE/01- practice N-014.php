<?php
   // On verifier si le Cookie a été recu dans la superglobale $_COOKIE.
   if (isset($_COOKIE["dates_visites"])) {
      $liste_visites = $_COOKIE["dates_visites"];
      // $dates = 
      $dates[] = time();
      setcookie("dates_visites", serialize($dates));
      echo "Vous avez consulter cette page " . count($dates) . "Fois, voici les détailes.";
      echo "<ul>";
      foreach ($dates as $key => $value) {
         echo "<li>" . date("d-m-Y H:i:s", $value) . "</li>";
      };
      echo "</ul>";
   } else {
      // le cookie n'a pas été recu.
      $dates[] = time();
      setcookie("dates_visites", serialize($dates));
      echo "C'est votre premiere visite : " . date("d-m-Y H:i:s", time());
   }

?>
