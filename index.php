<?php
    #On inclus les fichiers de configuration nécessaire
    include('config/islogin.php');

    #On vérifie si le message d'erreur de connexion existe et on le défini à une variable temporaire
    if(isset($_SESSION['message_login'])) {
        $message = $_SESSION['message_login'];
        $_SESSION['message_login'] = "";
    }
    #Sinon on initialise les 2 variables
    else {
        $_SESSION['message_login'] = "";
        $message = "";
    }
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
        <center><h3>Système d'authentification</h3></center>

        <form method="post" action="script/login.php">
            <center><p>Se connecter</p>
            <input type="text" name="username" id="username" placeholder="Entrez votre identifiant" required><br><br>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required><br><br>
            <input type="submit" class="input" value="Se connecter"/><br><br>
            <a href="register.php">Pas encore de compte ?</a></center>
        </form>
            
        <?php
            echo '<center>'.$message.'</center>';
        ?>

    </body>

</html>