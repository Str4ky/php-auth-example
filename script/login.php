<?php
    #On inclus les fichiers de configuration nécessaire
    include('../config/islogin.php');
    include('../config/database.php');

    #On récupère l'identifiant et le mot de passe
    $username = $_POST['username'];
    $password = $_POST['password'];

    #On vérifie si le login et le mot de passe correspondent ou non
    if(isset($username) AND isset($password)){
        #On récupère l'dentifiant et le mot de passe
        $requete = "SELECT user, pass FROM users WHERE user = '$username'";
        $resultat = $cnn->query($requete) or die(print_r($database->errorInfo()));
            while($row = $resultat->fetch()){
                #Si les mot de passes correspondent
                if (password_verify($password, $row['pass'])) {
                    $_SESSION['user'] = $username;
                    header('Location: ../account.php');
                }
                else {
                    #Sinon on redirige vers un message d'erreur
                    $_SESSION['message_login'] = "L'identifiant ou le mot de passe est incorrect";
                    header('Location: ../index.php');
                }
            }
    }
?>