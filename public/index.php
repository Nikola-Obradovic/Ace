<?php
session_start();
require '../includes/db_connection.php';
include '../includes/fetch_listings.php';
include '../includes/location_fetch.php';
include '../includes/shoe_size_fetch.php';

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
</head>
<body>
<header class="header">

    <a href="index.php">
        <img
            src="../img/AceLogo.png"
            alt="Ace logo"
            class="header-logo"
        />
    </a>
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li><a href="index.php" class="main-nav-link">Discover</a></li>
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

<main class="margin-top-lg">
<section class="red-circles container flex flex-gap-lg wrapped margin-bottom-lg">
    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button"><i class="fa-solid fa-car"></i></button><p>Cars</p></label></div>
    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button"><i class="fa-solid fa-house"></i></button><p>Housings</p></label></div>
    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button"><i class="fa-solid fa-mobile-screen-button"></i></button><p>Smartphones</p></label></div>
    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button"><i class="fa-solid fa-shoe-prints"></i></button><p>Shoes</p></label></div>
    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button"><i class="fa-solid fa-laptop"></i></button><p>Laptops</p></label></div>

</section>

    <section class="filter-section hidden">
        <div class="container">

            <form method="post" class="flex flex-gap-tiny margin-bottom-md" style="display: contents">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="cars_search" class="general-text--input searchInput" placeholder="Search" style="width: 96%; margin-left: 1.6rem; margin-bottom: 4.8rem">
            </form>
            <form method="post" style="padding: 0">
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Manufacturer:</p>
                    <select class="select-input" name="manufacturer">
                        <option value="">Any</option>
                        <option>Audi</option>
                        <option>Porsche</option>
                        <option>BMW</option>
                        <option>Mazda</option>
                        <option>Lada</option>
                        <option>Citroen</option>
                    </select>
                    <!--<input type="text" class="general-text--input">-->
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Model:</p>
                    <select class="select-input" name="model">
                        <option value="">Any</option>
                        <option>A6</option>
                        <option>Panamera</option>
                        <option>CX 3</option>
                        <option>iX</option>
                        <option>C3</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Mileage:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" name="mileage_from" placeholder="from">
                        <input type="text" class="general-text--input" name="mileage_to" placeholder="to">
                    </div>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Transmission:</p>
                    <select class="select-input" name="transmission">
                        <option value="">Any</option>
                        <option>Manual</option>
                        <option>Automatic</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" name="cars_price_min" placeholder="from">
                        <input type="text" class="general-text--input" name="cars_price_max" placeholder="to">
                    </div>
                </div>
                <div class="margin-bottom-lg">
                    <p class="margin-bottom-sm">Fuel type:</p>
                    <select class="select-input" name="fuel_type">
                        <option value="">Any</option>
                        <option>Petrol</option>
                        <option>Diesel</option>
                        <option>Hybrid</option>
                        <option>Electric</option>
                    </select>
                </div>
            </div>
            <button class="form-button div-center" type="submit">Apply</button>
            </form>
        </div>
    </section>

    <section class="filter-section hidden">
        <div class="container">
            <form method="post" class="flex flex-gap-tiny margin-bottom-md" style="display: contents">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="housings_search" class="general-text--input searchInput" placeholder="Search" style="width: 96%; margin-left: 1.6rem; margin-bottom: 4.8rem">
            </form>
            <form method="post" style="padding: 0">
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Type:</p>
                    <select class="select-input" name="housings_type">
                        <option value="">Any</option>
                        <option>House</option>
                        <option>Apartment</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Location:</p>
                    <select class="select-input" name="location">
                        <option value="">Any</option>
                        <?php
                        /** @noinspection PhpUndefinedVariableInspection */
                            fetchlocation($conn);
                        ?>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Square meters:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" name="square_meters_from" placeholder="from">
                        <input type="text" class="general-text--input" name="square_meters_to" placeholder="to">
                    </div>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Bedrooms:</p>
                    <select class="select-input" name="bedrooms">
                        <option value="">Any</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option value="5+">5+</option>
                    </select>
                </div>
            </div>

            <div class="div-center margin-bottom-lg one-row--filter">
                <p class="margin-bottom-sm">Price range:</p>
                <div class="flex flex-gap-sm">
                    <input type="text" class="general-text--input" name="housings_price_min" placeholder="from">
                    <input type="text" class="general-text--input" name="housings_price_max" placeholder="to">
                </div>
            </div>
            <button class="form-button div-center" type="submit">Apply</button>
            </form>
        </div>
    </section>

    <section class="filter-section hidden">
        <div class="container">
            <form method="post" class="flex flex-gap-tiny margin-bottom-md" style="display: contents">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>

                <input type="text" name="phones_search" class="general-text--input searchInput" placeholder="Search" style="width: 96%; margin-left: 1.6rem; margin-bottom: 4.8rem">
            </form>
            <form method="post" style="padding: 0">
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Brand:</p>
                    <select class="select-input" name="phone_brand">
                        <option value="">Any</option>
                        <option>Apple</option>
                        <option>Xiaomi</option>
                        <option>Samsung</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Series:</p>
                    <select class="select-input" name="phone_series">
                        <option value="">Any</option>
                        <option>S24</option>
                        <option>iPhone 15</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Color:</p>
                    <select class="select-input" name="phone_color">
                        <option value="">Any</option>
                        <option>Black</option>
                        <option>Red</option>
                        <option>Green</option>
                        <option>Blue</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Storage:</p>
                    <select class="select-input" name="phone_storage">
                        <option value="">Any</option>
                        <option>64</option>
                        <option>128</option>
                        <option>256</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">RAM:</p>
                    <select class="select-input" name="phone_RAM">
                        <option value="">Any</option>
                        <option>16</option>
                        <option>32</option>
                        <option>64</option>
                    </select>
                </div>
                <div class="margin-bottom-lg">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" name="phone_price_min" placeholder="from">
                        <input type="text" class="general-text--input" name="phone_price_max" placeholder="to">
                    </div>
                </div>
            </div>

            <button class="form-button div-center" type="submit">Apply</button>
            </form>
        </div>
    </section>

    <section class="filter-section hidden">

        <div class="container">
            <form class="flex flex-gap-tiny margin-bottom-md" style="display: contents">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>

                <input type="text" name="shoes_search" class="general-text--input searchInput" placeholder="Search" style="width: 96%; margin-left: 1.6rem; margin-bottom: 4.8rem">
            </form>
            <form method="post" style="padding: 0">
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Brand:</p>
                    <select class="select-input" name="shoe_brand">
                        <option value="">Any</option>
                        <option>Nike</option>
                        <option>Adidas</option>
                        <option>Puma</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Model:</p>
                    <select class="select-input" name="shoe_model">
                        <option value="">Any</option>
                        <option>Jordan 1</option>
                        <option>Yeezy</option>
                        <option>Air Force 1</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Gender:</p>
                    <select class="select-input" name="gender">
                        <option value="">Any</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Unisex</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Shoe size:</p>
                    <select class="select-input" name="shoe_size">
                        <option value="">Any</option>
                        <?php
                        /** @noinspection PhpUndefinedVariableInspection */
                            fetchShoeSize($conn);
                        ?>
                    </select>
                </div>
            </div>
                <div class="div-center margin-bottom-lg one-row--filter">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" name="shoes_price_min" placeholder="from">
                        <input type="text" class="general-text--input" name="shoes_price_max" placeholder="to">
                    </div>
                </div>

            <button class="form-button div-center" type="submit">Apply</button>
            </form>
        </div>
    </section>

    <section class="filter-section hidden">
        <div class="container">
            <form class="flex flex-gap-tiny margin-bottom-md" style="display: contents">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>

                <input type="text" name="laptops_search" class="general-text--input searchInput" placeholder="Search" style="width: 96%; margin-left: 1.6rem; margin-bottom: 4.8rem">
            </form>
            <form method="post" style="padding: 0">
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Brand:</p>
                    <select class="select-input" name="laptop_brand">
                        <option value="">Any</option>
                        <option>MSI</option>
                        <option>Asus</option>
                        <option>Acer</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Model:</p>
                    <select class="select-input" name="laptop_model">
                        <option value="">Any</option>
                        <option>Katana</option>
                        <option>Dobrila</option>
                        <option>xyz</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Display:</p>
                    <select class="select-input" name="display_size">
                        <option value="">Any</option>
                        <option>18</option>
                        <option>24</option>
                        <option>28</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Processor:</p>
                    <select class="select-input" name="processor">
                        <option value="">Any</option>
                        <option>Intel i7</option>
                        <option>Intel i9</option>
                        <option>Ryzen 5000</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Storage:</p>
                    <select class="select-input" name="laptop_storage">
                        <option value="">Any</option>
                        <option>256</option>
                        <option>512</option>
                        <option>1024</option>
                        <option>2058</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">RAM:</p>
                    <select class="select-input" name="laptop_RAM">
                        <option value="">Any</option>
                        <option>16</option>
                        <option>32</option>
                        <option>64</option>
                    </select>
                </div>
                </div>

                <div class="div-center margin-bottom-lg one-row--filter">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" name="laptop_price_min" placeholder="from">
                        <input type="text" class="general-text--input" name="laptop_price_max" placeholder="to">
                    </div>
                </div>

                <button class="form-button div-center" type="submit">Apply</button>
            </form>
        </div>
    </section>

    <div class="container-main grid grid--2-cols" id="search-and-filters-button">
        <form method="post" class="flex flex-gap-tiny" style="padding: 0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
            </svg>
            <input type="text" name="q" class="search-bar-main searchInput" placeholder="Find something new">
        </form>
        <button class="filters-button">
            <div class="flex flex-gap-tiny">
                <i class="fa-solid fa-filter" style="color: #d0cdce;"></i>
                <p>Filters</p>
            </div>
        </button>
    </div>


        <div class="pop-up hidden">
            <div class="exit-button-div margin-bottom-sm">
                <i class="fa-solid fa-x exit-button-right" style="color: #040404;"></i>
            </div>
            <form action="" method="post" style="padding: 0;">
                <section class="red-circles container flex flex-gap-tiny wrapped" style="margin-bottom: 20px">
                    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button1" name="subcategory" value="car" type="submit"><i class="fa-solid fa-car"></i></button></label></div>
                    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button1" name="subcategory" value="house" type="submit"><i class="fa-solid fa-house"></i></button></label></div>
                    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button1" name="subcategory" value="mobile" type="submit"><i class="fa-solid fa-mobile-screen-button"></i></button></label></div>
                    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button1" name="subcategory" value="shoe" type="submit"><i class="fa-solid fa-shoe-prints"></i></button></label></div>
                    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button1" name="subcategory" value="laptop" type="submit"><i class="fa-solid fa-laptop"></i></button></label></div>
                </section>
            </form>
            <p class="margin-bottom-sm">Sort by:</p>
            <form action="" method="post">
                <div class="grid grid--2-cols" id="sort-filters">
                    <button class="form-button margin-bottom-sm" name="sort" value="price_desc">Price highest</button>
                    <button class="form-button margin-bottom-sm" name="sort" value="newest">Newest</button>
                    <button class="form-button margin-bottom-sm" name="sort" value="price_asc">Price lowest</button>
                    <button class="form-button margin-bottom-sm" name="sort" value="oldest">Oldest</button>
                </div>
            </form>
            <p class="margin-bottom-sm margin-top-md">Price range filters:</p>
            <form action="" method="post">
                <div class="flex flex-gap-sm range-filters">
                    <div class="flex flex-gap-tiny">
                        <p>from:</p>
                        <input type="text" class="general-text--input" name="price_min">
                    </div>
                    <div class="flex flex-gap-tiny">
                        <p>to:</p>
                        <input type="text" class="general-text--input" name="price_max">
                    </div>
                </div>
                <div class="container-button-left margin-top-md">
                    <button type="submit" class="form-button">Apply</button>
                </div>
            </form>
        </div>

    <section class="main-section">
        <div class="container-listings discover-container">
            <!-- IMPROVE -->
            <div class="flex flex-gap-lg wrapped flex-start" >
            <?php
                fetchListings($conn);
            ?>
            </div>
        </div>
    </section>




</main>

<footer class="footer">
    <div class="grid grid--3-cols footer-grid">
    <div>
        <p class="margin-bottom-sm footer-headings">ACE</p>
        <p><a href="index.php">Discover</a></p>
        <?php if(isset($_SESSION['U_ID'])) { ?>
        <p><a href="your_profile.php">Your Profile</a></p>
        <p><a href="post-new-listing.php">Post new listing</a></p>
        <?php } else { ?>
        <p><a href="Login.php">Your Profile</a></p>
        <p><a href="Login.php">Post new listing</a></p>
        <?php } ?>
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

<div class="dimmed-background hidden"></div>

<script src="../js/main.js"></script>
</body>
</html>