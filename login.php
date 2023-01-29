<?php
session_start();
require_once "php/config.php";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    if (isset($name, $password) && !empty($name) && !empty($password)) {
        $sql = "SELECT * FROM `admins` WHERE name=:name";
        $statement = $db->prepare($sql);
        $statement->execute(['name' => $name]);

        if ($statement->rowCount() > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($password == $row['password']) {
                header("location:./admin.php");
                $_SESSION = $row;
                echo "Authentifié avec succès";
            } else {
                echo "Combinaison mot de passe - nom invalide";
            }
        } else {
            echo "Non authentifié";
        }
    } else {
        echo "Tous les champs sont obligatoires";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <form class="row g-3" method="POST" action="./login.php">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="name" name="name" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/login.js">

    </script>

</body>

</html>