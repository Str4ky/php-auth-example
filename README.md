<h2>PHP Authentification Example</h2>

Exemple d'authentification en PHP

__Fonctionnalités :__

<li>Création de compte</li>
<li>Connexion au compte</li>
<li>Modification d'identifiant et de mot de passe</li>
<li>Administration des permissions des membres</li>
<li>Suppression de comptes</li>

<br>

__Utilisation :__

Importer le fichier __auth.sql__ sur votre base de donnée à l'aide de votre outil favori

Dans le fichier __config/database.php__ changez ces 4 lignes avec les logins de votre base de données

```
$host = "localhost";
$database = "auth";
$user = "root";
$password = "";
```

<br>

__Administration :__

Pour une première utilisation, il faut vous mettre en administrateur via la base de données, en modifiant votre compte
Vous pouvez le faire en modifiant la valeur de la colone "type" de la table "users", la changeant de 1 à 2
Vous pouvez aussi le faire en réalisant cette requette SQL ```UPDATE users SET type = 2 WHERE user = 'Votre identifiant';```

<br>

__Test du projet :__

Utilisez un logiciel de wamp tel que [Wamp server](https://www.wampserver.com/) par exemple
<br>
Mettez le dossier du projet dans le dossier __www__ du logiciel de Wamp et lancer le projet depuis votre navigateur web
<br><br>
Vous pouvez aussi l'hoster sur votre propre site web/serveur
