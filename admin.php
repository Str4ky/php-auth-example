<?php
    #On initialise la session
    session_start();

    #On inclus les fichiers de configuration nécessaire
    include('./config/database.php');
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

            <h3>Administration</h3>

            <?php
                #On vérifie si on est connecté
                if(isset($_SESSION['user'])) {
                    #On récupère l'identifiant
                    $requete = "SELECT type FROM users WHERE user = '{$_SESSION['user']}'";
                    $resultat = $cnn->query($requete) or die(print_r($database->errorInfo()));
                    while($row = $resultat->fetch()){
                        #On affiche un message de permissions
                        echo "Changer les permissions<br><br>";

                        #Si l'utilisateur n'est pas administrateur
                        if($row['type'] != 2) {
                            header('Location: account.php');
                        }
                    }
                    
                    echo "<form action='admin/change_type.php' method='post'><select name='user' id='user'>";

                    #On récupère l'identifiant de tous les membres sauf nous
                    $requete1 = "SELECT user FROM users WHERE user <> '{$_SESSION['user']}'";
                    $resultat1 = $cnn->query($requete1) or die(print_r($database->errorInfo()));
                    while($row1 = $resultat1->fetch()){
                        echo "<option value=".$row1['user'].">".$row1['user']."</option>";
                }
                
                echo "</select><br><br><select name='type' id='type'><option value=1>Utilisateur</option> <option value=2>Administrateur</option></select><br><br><input type='submit' class='input' value='Modifier'/></form>";

                echo "<br>Supprimer un compte<br><br><form action='admin/delete_user.php' method='post'><select name='user' id='user'>";

                 #On récupère l'identifiant de tous les membres sauf nous
                 $requete2 = "SELECT user FROM users WHERE user <> '{$_SESSION['user']}'";
                 $resultat2 = $cnn->query($requete2) or die(print_r($database->errorInfo()));
                 while($row2 = $resultat2->fetch()){
                    echo "<option value=".$row2['user'].">".$row2['user']."</option>";
             }
             
             echo "</select><br><br><input type='submit' class='input' value='Supprimer'/></form>";

                echo "<br>Comptes<br><br>";

                #On récupère les données des utilisateurs pour les afficher
                $requete3 = "SELECT user, type FROM users";
                $resultat3 = $cnn->query($requete3) or die(print_r($database->errorInfo()));
                while($row3 = $resultat3->fetch()){
                    if($row3['type'] == 1)
                    echo $row3['user']." - Utilisateur<br><br>";
                    else if($row3['type'] == 2)
                    echo $row3['user']." - Administrateur<br><br>";
                }

                #On affiche un bouton retour
                echo "<br><a href='account.php' class='input'>Retour</a>";

            }
            ?>
        </center>
    </body>

</html>