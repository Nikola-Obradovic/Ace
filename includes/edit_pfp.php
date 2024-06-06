<?php
session_start();
require 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {


    if(isset($_SESSION['profile_picture'])) {
        $pfp = $_SESSION['profile_picture'];

        $pfp_sql = "UPDATE users SET Profile_Picture_Path = '$pfp' WHERE U_ID = '$_SESSION[U_ID]'";
        mysqli_query($conn, $pfp_sql);
    }


    header("Location: ../public/your_profile.php");
}