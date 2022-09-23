<?php
    #On inclus les fichiers de configuration nécessaire
    include('./config/database.php');
    include('./config/isntlogin.php');
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
        <form method="post" action="edit/edit_account.php">
            <center><br><p>Modifier son compte</p>
            <?php
            #On récupère l'identifiant
            $requete = "SELECT user FROM users WHERE user = '{$_SESSION['user']}'";
            $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
            while($row = $resultat->fetch()){
            #On affiche un formulaire avec l'identifiant pré-rempli
                echo "
            <input type='text' name='username' id='username' value='".$row['user']."' placeholder='Entrez un nouvel identifiant' required><br><br>
            <input type='password' name='password' id='password' placeholder='Entrez votre/un autre mot de passe' required><br><br>
            <input type='submit' class='input' value='Modifier'/><br><br>";
            }
            ?>
            <a href="account.php" class='input'>Retour</a></center>
        </form>

    </body>

</html>