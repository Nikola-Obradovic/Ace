<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discover</title>


    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script
            type="module"
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
            nomodule=""
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
    ></script>
</head>
<body>
<header class="header">

    <a href="./index.php">
        <img
            src="./img/AceLogo.png"
            alt="Ace logo"
            class="header-logo"
        />
    </a>
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li><a href="./index.php" class="main-nav-link">Discover</a></li>
            <li>
                <a href="./about-us.html" class="main-nav-link">About us</a>
            </li>
            <li>
                <a href="./post-new-listing.php" class="main-nav-link">Post New Listing</a>
            </li>
        </ul>
        <a href="./Login.html" class="link-button" id="login-button">Log in</a>
    </nav>
    <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>

</header>

<main class="margin-top-lg">
<section class="red-circles container flex flex-gap-lg wrapped">
    <div class="flex flex-column flex-gap-tiny"><button class="red-circle-button"><i class="fa-solid fa-car"></i></button><p>Cars</p>
    </div>
    <div class="flex flex-column flex-gap-tiny"><button class="red-circle-button"><i class="fa-solid fa-house"></i></button><p>Housings</p></div>
    <div class="flex flex-column flex-gap-tiny"><button class="red-circle-button"><i class="fa-solid fa-mobile-screen-button"></i></button><p>Smartphones</p></div>
    <div class="flex flex-column flex-gap-tiny"><button class="red-circle-button"><i class="fa-solid fa-shoe-prints"></i></button><p>Shoes</p></div>
    <div class="flex flex-column flex-gap-tiny"><button class="red-circle-button"><i class="fa-solid fa-laptop"></i></button><p>Laptops</p></div>

</section>




</main>

<script src="main.js"></script>
</body>
</html>