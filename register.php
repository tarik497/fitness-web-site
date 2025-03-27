<?php
session_start();

$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['password'];

include("config.php");

$sql = "SELECT * FROM users WHERE email = '$email'";

$results = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($results);

if ($num_rows == 0) {
    $sql = "INSERT INTO users(nom, email, password) 
    values ('$nom', '$email', '$password')";

    mysqli_query($conn, $sql);

    $id = mysqli_insert_id($conn);


    $_SESSION['user'] = array("id" => $id, "nom" => $nom);

    header("location: login.php");
} else {
    echo "A user already exists";
}
