<?php
session_start();
if (!isset($_SESSION)) {
    header("location:http://caysticourses.great-site.net/index.html");
}

require_once "./php/config.php";

// delete student
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $statement = $db->prepare("DELETE FROM `students` WHERE id=:id");
    $statement->execute(['id' => $id]);
}

$sql = "SELECT * FROM `students`";
$statement = $db->prepare($sql);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootsrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <style>
    td {
        font-size: .8rem;
        border: .1rem solid #777;
    }

    th {
        font-size: .8rem;
        border: .1rem solid #777;
    }

    .btn {
        font-size: .7rem;
    }
    </style>
</head>

<body>

    <h5 class="text-center h2 text-white mb-5 mt-2 bg-secondary p-3">LISTE DES INSCRITS</h5>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de Naissance</th>
                <th scope="col">Addresse Email</th>
                <th scope="col">Session</th>
                <th scope="col">Telephone</th>
                <th scope="col">Sexe</th>
                <th scope="col">Class</th>
                <th scope="col">Langue</th>
                <th scope="col">A un ordinateur</th>
                <th scope="col">Tranches</th>
                <th scope="col">Type Formation</th>
                <th scope="col">Établissement</th>
                <th scope="col">Yaoundé</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $student) {
                echo '
                <tr>
                    <th scope="row">' . $student["id"] . '</th>
                    <td>' . $student["fname"] . '</td>
                    <td>' . $student["lname"] . '</td>
                    <td>' . $student["bdate"] . '</td>
                    <td>' . $student["email"] . '</td>
                    <td>' . $student["session"] . '</td>
                    <td>' . $student["phone"] . '</td>
                    <td>' . $student["sex"] . '</td>
                    <td>' . $student["class"] . '</td>
                    <td>' . $student["language"] . '</td>
                    <td>' . $student["ordinateur"] . '</td>
                    <td>' . $student["tranches"] . '</td>
                    <td>' . $student["formation_ype"] . '</td>
                    <td>' . $student["etablissement"] . '</td>
                    <td>' . $student["yaounde"] . '</td>
                    <td>
                    <a href="edit.php?id=' . $student["id"] . '" class="btn btn-success">Edit</a>
                    <a href="admin.php?id=' . $student["id"] . '" class="btn btn-danger">Delete</a>
                    </td>
               </tr>
            ';
            }



            ?>



        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>