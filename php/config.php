<?php

$dsn = "mysql:host=sql307.epizy.com; dbname=epiz_33419357_caysti_courses;";
$user = "epiz_33419357";
$password = "bXNiGZVnQNF947";

try {
    $db = new PDO($dsn, $user, $password);
    // echo "success";
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
    echo "problem";
}