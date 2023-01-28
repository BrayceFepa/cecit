<?php
require_once "./config.php";

// print_r($_POST);

if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['bdate'], $_POST['session'], $_POST['id']) && !empty($_POST['fname'] && !empty($_POST['lname'])) && !empty($_POST['email']) && !empty($_POST['bdate']) && !empty($_POST['session'])) {

    $id = trim($_POST['id']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $bdate = trim($_POST['bdate']);
    $session = trim($_POST['session']);
    $id = trim($_POST['id']);

    $statement = $db->prepare("SELECT * FROM `students` WHERE id=:id");
    $statement->execute(['id' => $id]);
    if ($statement->rowCount() > 0) {
        try {
            $stmnt = $db->prepare("UPDATE `students` SET fname=:fname, lname=:lname, email=:email, session=:session WHERE id=:id");
            $stmnt->execute([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'session' => $session,
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