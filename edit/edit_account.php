<?php
    #On inclus les fichiers de configuration nécessaire
    include('../config/database.php');
    include('../config/isntlogin.php');

    #On récupère l'utilisateur et le type de compte
    $user = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    #On vérifie si on est connecté
    if(isset($_SESSION['user'])) {
        #On récupère l'identifiant et le mot de passe
        $requete = "SELECT user, pass FROM users WHERE user = '{$_SESSION['user']}'";
        $resultat = $cnn->query($requete) or die(print_r($database->errorInfo()));
        while($row = $resultat->fetch()){
            #On le modifie l'identifiant et le mot de passe
            $requete1 = "UPDATE users SET user = '$user', pass = '$password' WHERE user = '{$_SESSION['user']}'";
            $cnn->query($requete1) or die(print_r($database->errorInfo()));
            $_SESSION['user'] = $user;
            header('Location: ../account.php');
        }  
    }
?>