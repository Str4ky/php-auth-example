<h2>PHP Authentification Example</h2>

Exemple d'authentification en PHP

__Fonctionnalités :__

<li>Création de compte</li>
<li>Connexion au compte</li>
<li>Modification d'identifiant et de mot de passe</li>
<li>Administration des permissions des membres</li>
<li>Suppresions de comptes</li>

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

__Test du projet :__

Utilisez un logiciel de wamp tel que Uwamp : https://www.uwamp.com ou Laragon : https://laragon.org
<br>
Mettez le dossier du projet dans le dossier __www__ de votre logiciel de Wamp et lancer le projet depuis votre navigateur web
<br><br>
Vous pouvez aussi l'hoster sur votre propre site web/serveur
