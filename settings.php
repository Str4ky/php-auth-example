<?php
    #On inclus les fichiers de configuration nécessaire
    include('config/isntlogin.php');
?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Système d'authentification</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <link rel=icon type=image/png href="assets/favicon.png"/>
    </head>

    <body>
        <center>
            <br><p>Paramètre du compte</p><br>
            <a href='edit.php' class='input'>Modifier</a><br><br>
            <a href='settings/delete_account.php' class='input'>Supprimer</a><br><br>
            <a href='account.php' class='input'>Retour</a><br><br>
        </center>
    </body>

</html>