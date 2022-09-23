<?php
    #On inclus les fichiers de configuration nécessaire
    include('config/islogin.php');

    #On vérifie si le message d'erreur d'inscrition existe et on le défini à une variable temporaire
    if(isset($_SESSION['message_register'])) {
        $message = $_SESSION['message_register'];
        $_SESSION['message_register'] = "";
    }
    #Sinon on initialise les 2 variables
    else {
        $_SESSION['message_register'] = "";
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

        <form method="post" action="script/register.php">
            <center><p>S'inscrire</p>
            <input type="text" name="username" id="username" placeholder="Entrez un identifiant" required><br><br>
            <input type="password" name="password" id="password" placeholder="Entrez un mot de passe" required><br><br>
            <input type="submit" class="input" value="S'inscrire"/><br><br>
            <a href="index.php">Déjà un de compte ?</a></center>
        </form>
        <?php
            echo '<center>'.$message.'</center>';
        ?>

    </body>

</html>