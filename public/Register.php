<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ace Register</title>

    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">

    <!-- LATO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>

<main class="container black-box">

    <img src="../img/AceLogo.png" alt="Ace Logo" class="margin-bottom-lg" id="ace-logo">

    <form action="../includes/register_process.php" method="post">
        <?php
        if(isset($_SESSION['unique_check'])) {
            echo '<h4 class="red-alert">'."Username or email already exists".'</h4>';
            unset($_SESSION['unique_check']); // Unset the session variable
        }?>
        <?php
        if(isset($_SESSION['password_check'])) {
            echo '<h4 class="red-alert">'."Passwords do not match".'</h4>';
            unset($_SESSION['password_check']); // Unset the session variable
        }?>
        <p class="heading-tertiary margin-bottom-sm">Username</p>
        <input type="text" class="general-text--input margin-bottom-xsm" name="username" required>
        <p class="heading-tertiary margin-bottom-sm">Email</p>
        <input type="text" class="general-text--input margin-bottom-xsm" name="email" required>
        <p class="heading-tertiary margin-bottom-sm">Password</p>
        <div class="password">
            <input  type="password" class="margin-bottom-xsm general-text--input password-input" name="password" required>
            <div class="eye-container">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 eye-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>

        </div>
        <p class="heading-tertiary margin-bottom-sm">Confirm Password</p>
        <div class="password">
            <input  type="password" class="margin-bottom-xsm general-text--input password-input" name="confirm_password" required>
            <div class="eye-container">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 eye-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>

        </div>
        <button class="form-button margin-bottom-lg div-center">Register</button>
    </form>

    <div class="flex flex-gap-sm">
        <p>Already have an account?</p>
        <a href="Login.php" class="link-button">Log in</a>
    </div>

</main>
<script src="../js/password.js"></script>

</body>
</html>