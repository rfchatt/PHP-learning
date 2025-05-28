<?php

session_start();

session_destroy(); // Détruire la session les données de la session
header('Location: login.php'); 
exit();

