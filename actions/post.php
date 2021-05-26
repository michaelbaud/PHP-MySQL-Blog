<?php 
    include "../db_connection.php";

    // Ajouter un article
    $req = $bdd->prepare('INSERT INTO articles(title, content) VALUES(:title, :content)');
    $req->execute(array(
        'title' => $_POST["title"],
        'content' => $_POST["content"]
    ));
    $req->closeCursor();
    header("Location: ../index.php");
?>