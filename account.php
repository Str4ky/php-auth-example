<?php
    #On inclus les fichiers de configuration nécessaire
    include('config/database.php');
    include('config/isntlogin.php');

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
        <center>
            <?php
                #On vérifie si on est connecté
                if(isset($_SESSION['user'])) {
                    #On récupère l'identifiant
                    $requete = "SELECT user, type FROM users WHERE user = '{$_SESSION['user']}'";
                    $resultat = $cnn->query($requete) or die(print_r($database->errorInfo()));
                    while($row = $resultat->fetch()){
                        #On affiche un message de bienvenue
                        echo "<br>Bon retour parmi nous ".$row['user']."<br><br><br>";

                        #On affiche un bouton d'édition de compte
                        echo "<a href='edit.php' class='input'>Modifier mon compte</a><br><br>";

                        #On vérifie si l'utilisateur est administrateur
                        if($row['type'] == 2) {
                            echo "<a href='admin.php' class='input'>Administration</a><br><br>";
                        }
                    }
                #On affiche un bouton déconnexion
                echo "<a href='logout.php' class='input'>Déconnexion</a>";
                }
            ?>
        </center>
    </body>

</html>