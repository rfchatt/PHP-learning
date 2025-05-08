## PHP 

### 1. Introduction à PHP
•	Définition : PHP (Hypertext Preprocessor) est un langage de script côté serveur, open source, conçu pour le développement web dynamique.
•	Historique : Créé en 1994 par Rasmus Lerdorf, initialement pour suivre les visites sur son CV en ligne.
•	Fonctionnalités :
o	Intégration facile avec HTML.
o	Supporte les bases de données (MySQL, PostgreSQL).
o	Plus de 500 fonctions intégrées (manipulation d'images, sockets, etc.).
•	Atouts : Gratuit, simple à apprendre, multiplateforme, compatible avec les serveurs (Apache, IIS).


### 2. Bases du Langage PHP
•	Balises PHP :
o	Syntaxe recommandée : <?php ... ?>.
o	Autres syntaxes (dépréciées) : <script language="php"> ... </script>, <? ... ?>.
•	Affichage :
o	echo : Affiche du texte, plus rapide, pas de valeur de retour.
o	print : Affiche du texte, retourne 1, utile dans les expressions.
•	Commentaires :
o	// ou # pour une ligne.
o	/* ... */ pour plusieurs lignes.


### 3. Variables et Types de Données
•	Variables :
o	Commencent par $, sensibles à la casse.
o	Noms valides : lettres, chiffres, underscores (pas d'espaces ni de caractères spéciaux).
•	Portée :
o	Locale : Accessible uniquement dans la fonction.
o	Globale : Accessible partout, déclarée avec global.
o	Statique : Conserve sa valeur entre les appels de fonction (static).
•	Superglobales :
o	$_GET, $_POST, $_SERVER, $_SESSION, $_COOKIE, etc.
•	Types de données :
o	Scalaires : int, float, string, bool.
o	Composés : array, object, callable, iterable.
o	Spéciaux : resource, null.


### 4. Opérateurs
•	Arithmétiques : +, -, *, /, %, **.
•	Affectation : =, +=, -=, etc.
•	Comparaison : ==, ===, !=, !==, >, <, etc.
•	Logiques : &&, ||, !, and, or, xor.
•	Incrémentation/Décrémentation : ++, --.


### 5. Structures de Contrôle
•	Conditionnelles :
o	if, else, elseif.
o	switch : Comparaison stricte, nécessite break.
o	match (PHP 8+) : Retourne une valeur, comparaison stricte.
•	Boucles :
o	while, do-while, for, foreach.
o	break : Sortie de boucle.
o	continue : Passe à l'itération suivante.


### 6. Fonctions sur les Chaînes et Dates
•	Chaînes :
o	strlen(), str_replace(), strpos(), substr(), strtoupper(), strtolower(), etc.
•	Dates :
o	date() : Formate une date (Y-m-d H:i:s).
o	DateTime : Manipulation avancée des dates.
o	strtotime() : Convertit une date en timestamp.


### 7. Formulaires et Transmission de Données
•	Méthodes :
o	GET : Données visibles dans l'URL, limitées en taille.
o	POST : Données cachées, plus sécurisées.
o	$_REQUEST : Combine GET, POST, et COOKIE (à éviter pour la sécurité).
•	Validation :
o	Vérifier les champs obligatoires, formats (email, téléphone), etc.


### 8. Sessions et Cookies
•	Sessions :
o	session_start(), $_SESSION : Stocke des données entre pages.
•	Cookies :
o	setcookie() : Stocke des données côté client.
o	$_COOKIE : Accède aux cookies.


### 9. Redirection et En-têtes HTTP
•	Redirection :
o	header("Location: page.php").
o	exit après redirection pour éviter l'exécution supplémentaire.
•	En-têtes :
o	header("Content-Type: application/pdf") pour forcer un téléchargement.


### 10. Bonnes Pratiques
•	Sécurité :
o	Échapper les entrées utilisateur (htmlspecialchars()).
o	Préférer POST pour les données sensibles.
•	Performance :
o	Utiliser des boucles efficaces.
o	Éviter les requêtes SQL dans les boucles.


#### Points Clés à Retenir
•	PHP est un langage côté serveur, interprété, et orienté web.
•	Les variables ont des portées spécifiques (local, global, static).
•	Les superglobales ($_GET, $_POST) sont essentielles pour les formulaires.
•	Les structures de contrôle (if, for, foreach) permettent de gérer le flux du programme.
•	Les sessions et cookies sont utilisés pour persister les données.
