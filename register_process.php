<?php
session_start();


$conn = new mysqli('localhost', 'root', 'Oracle2003.', 'ace');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $hashed_password = hash('sha256', $password);
    // Check if passwords match
    if ($password == $confirm_password) {
        // Insert user data into database
        $sql = "INSERT INTO users (Username, Email, Password) VALUES ('$username', '$email', '$hashed_password')";
        mysqli_query($conn, $sql);

        // Set session variables
        $_SESSION['U_ID'] = mysqli_insert_id($conn);
        $_SESSION['Username'] = $username;
        $_SESSION['User_Type'] = 'normal';
        sleep(1);
        header("location: index.php"); // Redirect to welcome page
    } else {
        $error = "Passwords do not match";
    }
}
?>
