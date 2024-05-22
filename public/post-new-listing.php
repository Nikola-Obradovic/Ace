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


    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
</head>
<body>

<header class="header">

    <a href="./index.php">
        <img
                src="../img/AceLogo.png"
                alt="Ace logo"
                class="header-logo"
        />
    </a>
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li><a href="./index.php" class="main-nav-link">Discover</a></li>
            <?php if(isset($_SESSION['U_ID'])) { ?>
                <li>
                    <a href="your_profile.php" class="main-nav-link">Your Profile</a>
                </li>
                <li>
                    <a href="post-new-listing.php" class="main-nav-link">Post New Listing</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="Login.php" class="main-nav-link">Your Profile</a>
                </li>
                <li>
                    <a href="Login.php" class="main-nav-link">Post New Listing</a>
                </li>
            <?php } ?>
        </ul>
        <?php if(!isset($_SESSION['U_ID'])) { ?>
            <a href="Login.php" class="link-button" id="login-button">Log in</a>
        <?php } else { ?>
            <a href="../includes/Logout.php" class="link-button" id="login-button">Log out</a>
        <?php } ?>
    </nav>
    <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>

</header>

<main class="margin-top-lg add-listing">
    <div class="flex flex-gap-sm your-profile-header margin-bottom-md">
        <img src="../img/default-avatar-icon.jpg" class="profile-picture">
        <p class="heading-secondary"><?php echo $_SESSION["Username"] ?></p>
    </div>
    <div class="container">
        <form action="../includes/post-new-listing-processing.php" method="POST">
            <p class="margin-bottom-sm">Type:</p>
            <select class="select-input smaller-input margin-bottom-xsm" required id="type-input-select" name="listing_type">
                <option value="" disabled selected>Select Option</option>
                <option>Cars</option>
                <option>Housings</option>
                <option>Smartphones</option>
                <option>Shoes</option>
                <option>Laptops</option>
                <option>Other</option>
            </select>
            <div class="grid grid--2-cols">
                <div>
                    <p class="margin-bottom-sm">Name:</p>
                    <input type="text" class="general-text--input margin-bottom-xsm" required name="item_name">
                </div>
                <div>
                    <p class="margin-bottom-sm">Price:</p>
                    <input type="number" step="0.01" class="general-text--input margin-bottom-xsm" required name="price">
                </div>
            </div>
            <div class="grid grid--3-cols">
                <div>
                    <p class="margin-bottom-sm">Location:</p>
                    <input type="text" class="general-text--input margin-bottom-xsm" required name="location">
                </div>
                <div>
                    <p class="margin-bottom-sm">Condition:</p>
                    <select class="select-input margin-bottom-xsm" required name="condition">
                        <option value=""  selected disabled>Select Option</option>
                        <option>New</option>
                        <option>Used</option>
                    </select>
                </div>
                <div>
                    <p class="margin-bottom-sm">Quantity:</p>
                    <input type="number" step="1" class="general-text--input margin-bottom-xsm" required name="quantity">
                </div>
            </div>

                <div class="item-inputs hidden">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Manufacturer:</p>
                        <select class="select-input margin-bottom-xsm" name="manufacturer">
                            <option value="" selected>Select Option</option>
                            <option>Audi</option>
                            <option>Porsche</option>
                            <option>BMW</option>
                            <option>Lada</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input margin-bottom-xsm" name="model">
                            <option value=""  selected>Select Option</option>
                            <option>A6</option>
                            <option>Panamera</option>
                            <option>iX</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Mileage:</p>
                        <input type="number" step="1" class="general-text--input margin-bottom-xsm" name="mileage" value="">
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Transmission:</p>
                        <select class="select-input margin-bottom-xsm" name="transmission">
                            <option value=""  selected>Select Option</option>
                            <option>Manual</option>
                            <option>Automatic</option>
                        </select>
                    </div>

                </div>
                    <div class="div-center one-row--filter">
                        <p class="margin-bottom-sm">Fuel type:</p>
                        <select class="select-input margin-bottom-xsm" name="fuel_type">
                            <option value="" selected>Select Option</option>
                            <option>Petrol</option>
                            <option>Diesel</option>
                            <option>Hybrid</option>
                            <option>Electric</option>
                        </select>
                    </div>
                </div>



                <div class="item-inputs hidden">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Type:</p>
                        <select class="select-input margin-bottom-xsm" name="type">
                            <option value="" selected>Select Option</option>
                            <option>House</option>
                            <option>Apartment</option>

                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Square Meters:</p>
                        <input type="number" step="0.1" class="general-text--input margin-bottom-xsm" name="square_meters">
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Bedrooms:</p>
                        <input type="number" step="1" class="general-text--input margin-bottom-xsm" name="num_of_bedrooms">
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Floor:</p>
                        <input type="number" step="1" class="general-text--input margin-bottom-xsm" name="floor">
                    </div>
                </div>
                </div>


                <div class="item-inputs hidden">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input margin-bottom-xsm" name="brand_phone">
                            <option value=""  selected>Select Option</option>
                            <option>Apple</option>
                            <option>Xiaomi</option>
                            <option>Samsung</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Series:</p>
                        <select class="select-input margin-bottom-xsm" name="series">
                            <option value=""  selected>Select Option</option>
                            <option>S24</option>
                            <option>iPhone 15</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Color:</p>
                        <select class="select-input margin-bottom-xsm" name="color">
                            <option value=""  selected>Select Option</option>
                            <option>Red</option>
                            <option>Green</option>
                            <option>Blue</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Storage:</p>
                        <select class="select-input margin-bottom-xsm" name="storage_phone">
                            <option value=""  selected>Select Option</option>
                            <option>64</option>
                            <option>128</option>
                            <option>256</option>
                        </select>
                    </div>

                </div>

                    <div class="div-center one-row--filter">
                        <p class="margin-bottom-sm">RAM:</p>
                        <select class="select-input margin-bottom-xsm" name="ram_phone">
                            <option value=""  selected>Select Option</option>
                            <option>16</option>
                            <option>32</option>
                            <option>64</option>
                        </select>
                    </div>
                </div>




            <div class="item-inputs hidden">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input margin-bottom-xsm" name="brand_shoe">
                            <option value=""  selected>Select Option</option>
                            <option>Nike</option>
                            <option>Adidas</option>
                            <option>Puma</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input margin-bottom-xsm" name="model_shoe">
                            <option value=""  selected>Select Option</option>
                            <option>Jordan 1</option>
                            <option>Yeezy</option>
                            <option>Air Force 1</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Gender:</p>
                        <select class="select-input margin-bottom-xsm" name="gender">
                            <option value=""  selected>Select Option</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Unisex</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Shoe Size:</p>
                        <select class="select-input margin-bottom-xsm" name="size">
                            <option value="" selected>Select Option</option>
                            <option>42</option>
                            <option>43</option>
                            <option>44</option>
                        </select>
                    </div>
                </div>
            </div>





                <div class="item-inputs hidden">
                <div class="grid grid--2-cols">
                    <div>
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input margin-bottom-xsm" name="brand_laptop">
                            <option value=""  selected>Select Option</option>
                            <option>MSI</option>
                            <option>Asus</option>
                            <option>Acer</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input margin-bottom-xsm" name="model_laptop">
                            <option value=""  selected>Select Option</option>
                            <option>Katana</option>
                            <option>Dobrila</option>
                            <option>xyz</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Display (inches):</p>
                        <select class="select-input margin-bottom-xsm" name="display_size">
                            <option value=""  selected>Select Option</option>
                            <option>18</option>
                            <option>24</option>
                            <option>28</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Processor:</p>
                        <select class="select-input margin-bottom-xsm" name="processor">
                            <option value=""  selected>Select Option</option>
                            <option>Intel i7</option>
                            <option>Intel i9</option>
                            <option>Ryzen 5000</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">Storage:</p>
                        <select class="select-input margin-bottom-xsm" name="storage">
                            <option value=""  selected>Select Option</option>
                            <option>256</option>
                            <option>512</option>
                            <option>1024</option>
                            <option>2058</option>
                        </select>
                    </div>
                    <div>
                        <p class="margin-bottom-sm">RAM:</p>
                        <select class="select-input margin-bottom-xsm" name="ram_laptop">
                            <option value=""  selected>Select Option</option>
                            <option>16</option>
                            <option>32</option>
                            <option>64</option>
                        </select>
                    </div>
                </div>
                </div>


        <div class="margin-bottom-lg">

                <p class="margin-bottom-sm">Description:</p>
                <textarea class="textarea" rows="8" name="description"></textarea>

        </div>
            <?php
            if(isset($_SESSION['no_img'])) {
                echo '<h4 class="red-alert">'."At least one image required".'</h4>';
                unset($_SESSION['no_img']); // Unset the session variable
            }?>
            <div id="my-dropzone" class="dropzone margin-bottom-md">
                <div class="dz-message">Drop files here or click to upload.</div>
            </div>

        <button class="wide-button div-center">Post</button>
        </form>

    </div>

</main>

<footer class="footer">
    <div class="grid grid--3-cols footer-grid">
        <div>
            <p class="margin-bottom-sm footer-headings">ACE</p>
            <p><a href="./index.php">Discover</a></p>
            <p><a href="your_profile.php">Your Profile</a></p>
            <p><a href="post-new-listing.php">Post new listing</a></p>
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

<script src="../js/main.js"></script>
<script src="../js/drop_zone.js"></script>
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