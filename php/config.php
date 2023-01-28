<?php

$dsn = "mysql:host=localhost; dbname=caysti_courses;";
$user = "root";
$password = "";

try {
    $db = new PDO($dsn, $user, $password);
    // echo "success";
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
    echo "problem";
}