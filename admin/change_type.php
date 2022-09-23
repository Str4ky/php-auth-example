<?php
    #On initialise la session
    session_start();

    #On inclus les fichiers de configuration nécessaire
    include('../config/database.php');

    #On récupère l'utilisateur et le type de compte
    $user = $_POST['user'];
    $type = $_POST['type'];

    #On vérifie si on est connecté
    if(isset($_SESSION['user'])) {
        #On récupère l'identifiant
        $requete = "SELECT type FROM users WHERE user = '{$_SESSION['user']}'";
        $resultat = $cnn->query($requete) or die(print_r($database->errorInfo()));
        while($row = $resultat->fetch()){
            #Si l'utilisateur n'est pas administrateur on le redirige vers son compte
            if($row['type'] != 2) {
                header('Location: ../account.php');
            }
            else {
                #On modifie le compte et on reviens à la page d'administration
                $requete1 = "UPDATE users SET type = '$type' WHERE user = '$user'";
                $cnn->query($requete1) or die(print_r($database->errorInfo()));
                header('Location: ../admin.php');
            }
        }
    }
?>