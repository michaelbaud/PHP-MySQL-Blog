<?php include "db_connection.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Mika Blog</title>
</head>
<body>

   <div class="container mt-5">

        <?php 

            $req = $bdd->prepare('SELECT * FROM articles WHERE id=:id');
            $req->execute(array(
                'id' => $_GET["id"],
            ));
            while($data = $req->fetch()) { 
                ?><div class="bg-dark p-5 rounded-lg text-white text-center">
                    <h1><?php echo htmlspecialchars($data['title']); ?></h1>

                    <div class="d-flex mt-2 justify-content-center align-items-center">
                        <a href="edit.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-light btn-sm" name="edit">Modifier</a>
                        <form method="POST" action="./actions/delete.php">
                            <input type="text" hidden value='<?php echo htmlspecialchars($data['id']); ?>' name="id">
                            <button class="btn btn-danger btn-sm ml-2" type="submit">Supprimer</button>
                        </form>
                    </div>

                </div>
                <p class="mt-5 border-left border-dark pl-3"><?php echo htmlspecialchars($data['content']); ?></p>
            <?php }
        ?>

        <a href="index.php" class="btn btn-outline-dark my-3">Accueil</a>
   </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>