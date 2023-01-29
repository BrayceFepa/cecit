<?php

include_once "config.php";

$tel = trim($_POST['tel']);
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$bdate = trim($_POST['bdate']);
$session = trim($_POST['session']);
$sex = trim($_POST['sex']);
$class = trim($_POST['classe']);
$language = trim($_POST['language']);
$ordi = trim($_POST['ordi']);
$formation = trim($_POST['formation']);
$tranches = trim($_POST['tranches']);
$school = trim($_POST['school']);
$yde = trim($_POST['yde']);


if (isset($fname, $lname, $email, $bdate, $session, $tel, $sex, $class, $language, $ordi, $formation, $tranches, $school, $yde) && !empty($fname) && !empty($lname) && !empty($email) && !empty($bdate) && !empty($session) && !empty($tel) && !empty($sex) && !empty($class) && !empty($language) && !empty($ordi) && !empty($ordi) && !empty($formation) && !empty($tranches) && !empty($school) && !empty($yde)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // let's check if that email already exists
        $statement = $db->prepare("SELECT * FROM students WHERE email=:email");
        $statement->execute(['email' => $email]);
        if ($statement->rowCount() > 0) {
            echo "Cet address email est déjà enregitrée";
        } else {
            try {
                $sql = "INSERT INTO `students` (fname, lname, email, bdate, session, phone, sex, class, language, ordinateur, tranches, formation_ype, etablissement, yaounde) VALUES (:fname, :lname, :email, :bdate, :session, :phone, :sex, :class, :language, :ordi, :tranches, :formation, :school, :yde)";
                $statement = $db->prepare($sql);
                $statement->execute([
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'bdate' => $bdate,
                    'session' => $session,
                    'phone' => $tel,
                    'sex' => $sex,
                    'class' => $class,
                    'language' => $language,
                    'ordi' => $ordi,
                    'tranches' => $tranches,
                    'formation' => $formation,
                    'school' => $school,
                    'yde' => $yde
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
    echo 'Tous les champs sont obligatoires';
}