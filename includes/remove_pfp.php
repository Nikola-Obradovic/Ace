<?php
session_start();
require 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $remove_sql = "UPDATE users SET Profile_Picture_Path = NULL WHERE U_ID = '$_SESSION[U_ID]'";
    mysqli_query($conn, $remove_sql);

    header("Location: ../public/your_profile.php");
}