<?php
	#On rentre les informations de connections à la base de données
    $host = "localhost";
    $database = "auth";
    $user = "root";
    $password = "";

    #On essaie de se connecte à la base de données
    try{
        $cnn = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
    }
    #Sinon on affiche une erreur
    catch(PDOException $e){
        echo "Erreur : ".$e->getMessage();
    }
?>