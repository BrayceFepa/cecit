<?php

include_once "config.php";

$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$bdate = trim($_POST['bdate']);
$session = trim($_POST['session']);

if (isset($fname, $lname, $email, $bdate, $session) && !empty($fname) && !empty($lname) && !empty($email) && !empty($bdate) && !empty($session)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // let's check if that email already exists
        $statement = $db->prepare("SELECT * FROM students WHERE email=:email");
        $statement->execute(['email' => $email]);
        if ($statement->rowCount() > 0) {
            echo "Cet address email est déjà enregitrée";
        } else {
            try {
                $sql = "INSERT INTO `students` (fname, lname, email, bdate, session) VALUES (:fname, :lname, :email, :bdate, :session)";
                $statement = $db->prepare($sql);
                $statement->execute([
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'bdate' => $bdate,
                    'session' => $session
                ]);
                echo "success";
            } catch (Exception $e) {
                echo "Une erreur est survenue" . $e->getMessage();
                die();
            }
        }
    } else {
        echo "$email n'est pas une addresse valide";
    }
} else {
    echo "Tous les champs sont obligatoires";
}