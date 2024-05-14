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
    <title>Discover</title>


    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">

    <!-- LATO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <?php if(isset($_SESSION['U_ID'])) { ?>
                <li>
                    <a href="./your_profile.php" class="main-nav-link">Your Profile</a>
                </li>
                <li>
                    <a href="./post-new-listing.php" class="main-nav-link">Post New Listing</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="./Login.php" class="main-nav-link">Your Profile</a>
                </li>
                <li>
                    <a href="./Login.php" class="main-nav-link">Post New Listing</a>
                </li>
            <?php } ?>
        </ul>
        <a href="Login.php" class="link-button" id="login-button">Log in</a>
    </nav>
    <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>

</header>

<main class="margin-top-lg add-listing">
    <div class="flex flex-gap-sm your-profile-header margin-bottom-md">
        <img src="./img/default-avatar-icon.jpg" class="profile-picture">
        <p class="heading-secondary">Username</p>
    </div>
    <div class="container">
        <form action="">
            <p class="margin-bottom-sm">Type:</p>
            <select class="select-input smaller-input margin-bottom-xsm">
                <option>Car</option>
                <option>Housings</option>
                <option>Smartphones</option>
                <option>Shoes</option>
                <option>Laptops</option>
                <option>Other</option>
            </select>
            <div class="grid grid--2-cols">
                <div>
                    <p class="margin-bottom-sm">Name:</p>
                    <input type="text" class="general-text--input margin-bottom-xsm">
                </div>
                <div>
                    <p class="margin-bottom-sm">Price:</p>
                    <input type="text" class="general-text--input margin-bottom-xsm">
                </div>
            </div>
        </form>

        <div>
            <form action="">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Manufacturer:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Mileage:</p>
                        <input type="text" class="general-text--input margin-bottom-xsm">
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Transmission:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="div-center one-row--filter">
                    <p class="margin-bottom-sm">Gas:</p>
                    <select class="select-input margin-bottom-xsm">
                        <option></option>
                    </select>
                </div>
            </form>
        </div>

        <div>
            <form action="">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Type:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Square Footage:</p>
                        <input type="text" class="general-text--input margin-bottom-xsm">
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Bedrooms:</p>
                        <input type="text" class="general-text--input margin-bottom-xsm">
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Floor:</p>
                        <input type="text" class="general-text--input margin-bottom-xsm">
                    </div>
                </div>
            </form>
        </div>

        <div>
            <form action="">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Gender:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Shoe Size:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div>
            <form action="">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Series:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Color:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Storage:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="div-center one-row--filter">
                    <p class="margin-bottom-sm">RAM:</p>
                    <select class="select-input margin-bottom-xsm">
                        <option></option>
                    </select>
                </div>
            </form>
        </div>

        <div>
            <form action="">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Display (inches):</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Processor:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Storage:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">RAM:</p>
                        <select class="select-input margin-bottom-xsm">
                            <option></option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="margin-bottom-lg">
            <form action="">
                <p class="margin-bottom-sm">Description:</p>
                <textarea class="textarea" rows="8"></textarea>
            </form>
        </div>

        <button class="wide-button div-center">Post</button>

    </div>

</main>

<footer class="footer">
    <div class="grid grid--3-cols footer-grid">
        <div>
            <p class="margin-bottom-sm footer-headings">ACE</p>
            <p><a href="./index.php">Discover</a></p>
            <p><a href="./your_profile.php">Your Profile</a></p>
            <p><a href="./add_listing.php">Post new listing</a></p>
        </div>
        <div>
            <p class="margin-bottom-sm footer-headings">CONTACT US</p>
            <p>tarik.basic@stu.ssst.edu.ba</p>
            <p>hana.catic@stu.ssst.edu.ba</p>
            <p>nikola.obradovic@stu.ssst.edu.ba</p>
        </div>
        <div>
            <p class="margin-bottom-sm footer-headings">WHERE TO FIND US?</p>
            <p>Hrasnička cesta 3a, Ilidža 71210</p>
            <p>Sarajevo, Bosnia and Herzegovina</p>
        </div>
    </div>
    <p id="copyright">Copyright &copy; 2024 Inwolve</p>
</footer>

<script src="main.js"></script>
</body>
</html>

<!-- IMPROVE -->
<!--
<section class="main-section">
    <div class="container">
        <h2>Post New Listing</h2>
        <form action="add_listing.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price"><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</section>

-->