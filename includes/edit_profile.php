<?php
session_start();
require 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_SESSION['U_ID'];
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    $sql = "UPDATE users SET About_me = '$bio' WHERE U_ID = '$id'";
    $result = mysqli_query($conn, $sql);

    header("Location: ../public/your_profile.php");
}