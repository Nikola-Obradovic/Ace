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
            <li>
                <a href="your_profile.php" class="main-nav-link">Your Profile</a>
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

<section class="listing-section">
    <div class="container flex flex-gap-lg">
        <a>Comments</a>
        <button class="form-button">Purchase</button>
    </div>


    <div class="pop-up transaction-pop-up">
        <div class="exit-button-payment margin-bottom-sm">
            <i class="fa-solid fa-x" style="color: #040404;"></i>
        </div>

        <div class="payment-section">
            <p class="heading-secondary margin-bottom-md">Item name</p>
            <p class="margin-bottom-sm">Payment method</p>
            <select class="select-input margin-bottom-xsm smaller-input">
                <option></option>
            </select>
        </div>

        <div class="payment-section">
            <p class="margin-bottom-sm">Credit card details</p>
            <div class="grid grid--2-cols">
                <input type="text" class="general-text--input margin-bottom-xsm" placeholder="First Name">
                <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Last Name">
                <div class="credit-card-input margin-bottom-xsm">
                    <input type="text" class="general-text--input" placeholder="1234 1234 1234 1234">
                    <span class="credit-card-icons">
                        <i class="fa-brands fa-cc-mastercard" style="color: #000;"></i>
                        <i class="fa-brands fa-cc-visa" style="color: #000;"></i>
                    </span>
                </div>
                <div class="flex flex-gap-sm margin-bottom-xsm">
                    <input type="text" class="general-text--input" placeholder="MM/YY">
                    <input type="text" class="general-text--input" placeholder="CVC">
                </div>
            </div>

            <div>
                <p class="margin-bottom-xsm"></p>
                <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Email">
                <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Password">
                <button id="paypal" class="margin-bottom-md">Log In</button>
            </div>

            <p class="margin-bottom-sm">Billing Address</p>
            <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Street Name">
            <div class="flex flex-gap-sm">
                <input type="text" class="general-text--input margin-bottom-xsm" placeholder="City">
                <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Postal/Zip Code">
            </div>
            <div class="margin-bottom-xsm">
                <input type="checkbox" name="save-info" id="save-info">
                <label for="save-info">Save payment information for later</label>
            </div>
        </div>


        <p class="heading-tertiary--black container-button-left margin-bottom-sm">Price</p>
        <div class="container-button-left">
            <button class="form-button">Purchase</button>
        </div>


    </div>
</section>

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


</body>
</html>