<?php
    #On initialise la session
    session_start();

    #On inclus les fichiers de configuration nécessaire
    include('../config/database.php');

    #On récupère l'utilisateur et le type de compte
    $user = $_SESSION['user'];

    #On vérifie si on est connecté
    if(isset($user)) {
        #On supprime le compte et on reviens à la page d'accueil
        $requete = "DELETE FROM users WHERE user = '$user'";
        $cnn->query($requete) or die(print_r($database->errorInfo()));
        header('Location: ../logout.php');
    }
?>