<?php 
    include "../db_connection.php";

    // Modifier un article
    $req = $bdd->prepare('UPDATE articles SET title=:nv_title, content=:nv_content WHERE id=:id');
    $req->execute(array(
        'id' => $_POST["id"],
        'nv_title' => $_POST["title"],
        'nv_content' => $_POST["content"],
    ));
    $req->closeCursor();
    header("Location: ../index.php");
?>