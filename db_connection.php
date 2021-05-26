<?php 

    include ".env.php";

    // Don't display server errors 
    ini_set("display_errors", "on");

    try {
        $bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Destroy if not possible to create a connection
    if(!$bdd){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Problème de connexion à la base de données<h3>";
    }
?>