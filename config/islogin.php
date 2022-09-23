<?php
    #On initialise la session
    session_start();

    #On vérifie si l'utilisateur est connecté et on le redirige
    if(isset($_SESSION['user'])) {
        header('Location: ./account.php');
    }
?>