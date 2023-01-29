<?php

require_once "php/config.php";

if (isset($_GET['id'])) {
    $id = trim($_GET['id']);

    $statement = $db->prepare("SELECT * FROM `students` WHERE id=:id");
    $statement->execute(['id' => $id]);

    if ($statement->rowCount() > 0) {
        $student = $statement->fetch(PDO::FETCH_ASSOC);
        // print_r($student);
    } else {
        $error = "Aucune information n'a été trouvée !";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>




    <div class="container mt-5">

        <h3 class="text-center text-uppercase">Mettre à Jour les informations d'un inscrit</h3>

        <div class="row mt-5">
            <div class="col-md-6 bg-success p-1 text-white text-center success mx-auto">
                llodfnjbfjsdbjf
            </div>
            <div class="col-md-6 bg-danger p-1 text-white text-center errors mx-auto">
                efefjewnfweruih
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 mx-auto">
                <form action="edit.php" method="POST" class="update-form">
                    <div class="input-group my-4">
                        <input type="text" name="fname" value="<?php echo $student['fname'] ?>" class="form-control">
                    </div>
                    <div class="input-group my-4">
                        <input type="text" name="lname" value="<?php echo $student['lname'] ?>" class="form-control">
                    </div>
                    <div class="input-group my-4">
                        <input type="email" name="email" value="<?php echo $student['email'] ?>" class="form-control">
                    </div>
                    <div class="input-group my-4">
                        <input type="date" name="bdate" value="<?php echo $student['bdate'] ?>" class="form-control">
                    </div>
                    <div class="input-group my-4 d-flex justify-content-around">
                        <div>
                            <input type="radio" name="session" value="offline"
                                <?php $student['session'] === 'offline' ?  print 'checked' :  '' ?> class="" /> Offline
                        </div>
                        <div>
                            <input type="radio" name="session" value="online"
                                <?php $student['session'] === 'online' ? print 'checked' :  '' ?> class=""> En ligne
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </div>

                    <input type="submit" name="update" value="Update" class="btn w-100 btn-success">
                </form>
            </div>

        </div>

    </div>



    <script>
    let form = document.querySelector(".update-form");
    let errors = document.querySelector(".errors"),
        success = document.querySelector(".success");
    errors.style.display = "none";
    success.style.display = "none"
    form.onsubmit = e => {
        e.preventDefault();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://caysticourses.great-site.net/php/edit.php", true);
        xhr.onload = () => {
            let data = xhr.response;
            console.log(data)
            let response = JSON.parse(data);

            if (response.status === 201) {
                success.textContent = response.message;
                success.style.display = "block";
            } else if (response.status === 301) {
                errors.textContent = response.message;
                errors.style.display = "block";
            } else if (response.status === 404) {
                errors.textContent = response.message;
                errors.style.display = "block";
            };

        }
        let formData = new FormData(form)
        xhr.send(formData);
    }
    </script>

</body>

</html>