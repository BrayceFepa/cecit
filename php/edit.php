<?php
require_once "./config.php";

// print_r($_POST);
$id = trim($_POST['id']);
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

if (isset(
    $fname,
    $lname,
    $email,
    $bdate,
    $session,
    $tel,
    $sex,
    $class,
    $language,
    $ordi,
    $formation,
    $tranches,
    $school,
    $yde
) && !empty($fname) && !empty($lname) && !empty($email) && !empty($bdate) && !empty($session) && !empty($tel) && !empty($sex) && !empty($class) && !empty($language) && !empty($ordi) && !empty($ordi) && !empty($formation) && !empty($tranches) && !empty($school) && !empty($yde)) {



    $statement = $db->prepare("SELECT * FROM `students` WHERE id=:id");
    $statement->execute(['id' => $id]);
    if ($statement->rowCount() > 0) {
        try {
            $stmnt = $db->prepare("UPDATE `students` SET fname=:fname, lname=:lname, email=:email, session=:session, :phone, :sex, :class, :language, :ordi, :tranches, :formation, :school, :yde WHERE id=:id");
            $stmnt->execute([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'session' => $session,
                'phone' => $tel,
                'sex' => $sex,
                'class' => $class,
                'language' => $language,
                'ordi' => $ordi,
                'tranches' => $tranches,
                'formation' => $formation,
                'school' => $school,
                'yde' => $yde,
                'id' => $id
            ]);
            echo json_encode(['status' => 201, 'message' => "Informations Mises à jour avec succès"]);
        } catch (Exception $e) {
            echo json_encode(['status' => 301, 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 404, 'message' => "Élève non trouvé"]);
    }
} else {
    echo json_encode(['status' => 301, 'message' => "Tous Les champs sont obligatoires"]);
}