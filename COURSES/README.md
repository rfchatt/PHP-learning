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
##	Balises PHP :<br>
o	Syntaxe recommandée : <?php ... ?>.<br>
o	Autres syntaxes (dépréciées) : <script language="php"> ... </script>, <? ... ?>.<br>
##	Affichage :<br>
o	echo : Affiche du texte, plus rapide, pas de valeur de retour.<br>
o	print : Affiche du texte, retourne 1, utile dans les expressions.<br>
##	Commentaires :<br>
o	// ou # pour une ligne.<br>
o	/* ... */ pour plusieurs lignes.<br>


### 3. Variables et Types de Données
##	Variables :<br>
o	Commencent par $, sensibles à la casse.<br>
o	Noms valides : lettres, chiffres, underscores (pas d'espaces ni de caractères spéciaux).<br>
##	Portée :<br>
o	Locale : Accessible uniquement dans la fonction.<br>
o	Globale : Accessible partout, déclarée avec global.<br>
o	Statique : Conserve sa valeur entre les appels de fonction (static).<br>
##	Superglobales :<br>
o	$_GET, $_POST, $_SERVER, $_SESSION, $_COOKIE, etc.<br>
##	Types de données :<br>
o	Scalaires : int, float, string, bool.<br>
o	Composés : array, object, callable, iterable.<br>
o	Spéciaux : resource, null.<br>


### 4. Opérateurs
•	Arithmétiques : +, -, *, /, %, **.<br>
•	Affectation : =, +=, -=, etc.<br>
•	Comparaison : ==, ===, !=, !==, >, <, etc.<br>
•	Logiques : &&, ||, !, and, or, xor.<br>
•	Incrémentation/Décrémentation : ++, --.<br>


### 5. Structures de Contrôle
##	Conditionnelles :<br>
o	if, else, elseif.<br>
o	switch : Comparaison stricte, nécessite break.<br>
o	match (PHP 8+) : Retourne une valeur, comparaison stricte.<br>
##	Boucles :<br>
o	while, do-while, for, foreach.<br>
o	break : Sortie de boucle.<br>
o	continue : Passe à l'itération suivante.<br>


### 6. Fonctions sur les Chaînes et Dates
##	Chaînes :<br>
o	strlen(), str_replace(), strpos(), substr(), strtoupper(), strtolower(), etc.<br>
##	Dates :<br>
o	date() : Formate une date (Y-m-d H:i:s).<br>
o	DateTime : Manipulation avancée des dates.<br>
o	strtotime() : Convertit une date en timestamp.<br>


### 7. Formulaires et Transmission de Données
##	Méthodes :<br>
o	GET : Données visibles dans l'URL, limitées en taille.<br>
o	POST : Données cachées, plus sécurisées.<br>
o	$_REQUEST : Combine GET, POST, et COOKIE (à éviter pour la sécurité).<br>
##	Validation :<br>
o	Vérifier les champs obligatoires, formats (email, téléphone), etc.<br>


### 8. Sessions et Cookies
##	Sessions :<br>
o	session_start(), $_SESSION : Stocke des données entre pages.<br>
##	Cookies :<br>
o	setcookie() : Stocke des données côté client.<br>
o	$_COOKIE : Accède aux cookies.<br>


### 9. Redirection et En-têtes HTTP
##	Redirection :<br>
o	header("Location: page.php").<br>
o	exit après redirection pour éviter l'exécution supplémentaire.<br>
##	En-têtes :<br>
o	header("Content-Type: application/pdf") pour forcer un téléchargement.<br>


### 10. Bonnes Pratiques
##	Sécurité :<br>
o	Échapper les entrées utilisateur (htmlspecialchars()).<br>
o	Préférer POST pour les données sensibles.<br>
##	Performance :<br>
o	Utiliser des boucles efficaces.<br>
o	Éviter les requêtes SQL dans les boucles.<br>


#### Points Clés à Retenir
##	PHP est un langage côté serveur, interprété, et orienté web.<br>
##	Les variables ont des portées spécifiques (local, global, static).<br>
##	Les superglobales ($_GET, $_POST) sont essentielles pour les formulaires.<br>
##	Les structures de contrôle (if, for, foreach) permettent de gérer le flux du programme.<br>
##	Les sessions et cookies sont utilisés pour persister les données.<br>
