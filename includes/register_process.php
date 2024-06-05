<?php
session_start();


require 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    /** @noinspection PhpUndefinedVariableInspection */
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $hashed_password = hash('sha256', $password);
    // Check if passwords match
    if ($password == $confirm_password) {
        // Insert user data into database
        $sql_check_email = "SELECT * FROM users WHERE Email='$email'"; //email check
        $result_check_email = mysqli_query($conn, $sql_check_email);

        if(mysqli_num_rows($result_check_email) > 0) {
            // Email already exists
            $_SESSION['unique_check'] = true;
            header("location: ../public/Register.php");
            exit;
        }

        // Check if username is already registered
        $sql_check_username = "SELECT * FROM users WHERE Username='$username'"; //username check
        $result_check_username = mysqli_query($conn, $sql_check_username);

        if(mysqli_num_rows($result_check_username) > 0) {
            // Username already exists
            $_SESSION['unique_check'] = true;
            header("location: ../public/Register.php");
            exit;
        }

        $sql = "INSERT INTO users (Username, Email, Password) VALUES ('$username', '$email', '$hashed_password')";
        mysqli_query($conn, $sql);

        // Set session variables
        $_SESSION['U_ID'] = mysqli_insert_id($conn);
        $_SESSION['Username'] = $username;
        $_SESSION['User_Type'] = 'normal';
        mysqli_close($conn);
        sleep(1);
        header("location: ../public/index.php"); // Redirect to welcome page
    } else {
        $_SESSION['password_check'] = true;
        sleep(1);
        header('location: ../public/Register.php');

    }
}
