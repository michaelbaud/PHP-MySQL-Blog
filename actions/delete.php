<?php 
    include "../db_connection.php";

    // Suprimer un article
    $req = $bdd->prepare('DELETE FROM articles WHERE id=:id');
    $req->execute(array(
        'id' => $_POST["id"]
    ));
    $req->closeCursor();
    header("Location: ../index.php");
?>