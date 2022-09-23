<?php
    #On inclus les fichiers de configuration nécessaire
    include('config/database.php');
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
            <?php
                #On vérifie si on est connecté
                if(isset($_SESSION['user'])) {
                    #On récupère l'identifiant
                    $requete = "SELECT user, type FROM users WHERE user = '{$_SESSION['user']}'";
                    $resultat = $cnn->query($requete) or die(print_r($database->errorInfo()));
                    while($row = $resultat->fetch()){
                        #On affiche un message de bienvenue
                        echo "<br><p>Bon retour parmi nous ".$row['user']."</p><br>";

                        #On affiche un bouton de paramètres de compte
                        echo "<a href='settings.php' class='input'>Paramètres</a><br><br>";

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