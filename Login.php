<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ace Login</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">


    <!-- LATO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>

<main class="container black-box">

<img src='img/AceLogo.png' alt='Ace Logo' class="margin-bottom-lg" id="ace-logo"/>
    <form action="login_process.php" method="post">
        <p class="heading-tertiary margin-bottom-sm">Username</p>
        <input  type="text" class="margin-bottom-xsm general-text--input"  name="username">
        <p class="heading-tertiary margin-bottom-sm">Password</p>
        <input  type="text" class="margin-bottom-xsm general-text--input" name="password">
        <button class="form-button div-center margin-bottom-lg">Log in</button>
    </form>
    <div class="flex flex-gap-sm">
        <p>Don't have an account?</p>
        <a class="link-button" href="Register.php">Register</a>
    </div>


</main>

</body>
</html>