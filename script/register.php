<?php
    #On inclus les fichiers de configuration nécessaire
    include('../config/islogin.php');
    include('../config/database.php');

    #On récupère l'identifiant
    $username = $_POST['username'];

    #On sécurise le mot de passe
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    #On vérifie si un compte extsie déjà
    if(isset($_POST['username']) AND isset($_POST['password'])){
        #On récupère l'identifiant
        $requete = "SELECT user FROM users";
        $resultat = $cnn->query($requete) or die(print_r($database->errorInfo()));
        while($row = $resultat->fetch()){
            #Si un identifiant existe déjà on redirige vers un message d'erreur
            if($row['user'] == $username){
                $_SESSION['message_register'] = "L'identifiant existe déjà";
                header('Location: ../register.php');
                return;
            }
        }
        #Sinon on créer un compte		
        $requete = "INSERT INTO users (user, pass, type)
                    VALUES ('$username', '$password', 1)";
        $cnn->exec($requete) or die(print_r($database->errorInfo()));
        $_SESSION['user'] = $username;
    }
    header('Location: ../account.php');
    $cnn=null;
?>