<?php

session_start();

require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    /** @noinspection PhpUndefinedVariableInspection */
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = hash('sha256', $password);
    // Check if username and password are correct
    $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$hashed_password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Set session variables
        $_SESSION['U_ID'] = $row['U_ID'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['User_Type'] = $row['User_Type'];
        $_SESSION['About_me'] = $row['About_me'];
        mysqli_close($conn);
        sleep(1);
        header("location: ../public/index.php"); // Redirect to welcome page
    } else {
        $_SESSION['wrong_input'] = true;
        header('location: ../public/Login.php');
        exit;
    }
}
