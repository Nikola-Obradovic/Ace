<?php
session_start();
include '../includes/db_connection.php';

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
    <div class="flex flex-column flex-gap-tiny"><label class="red-label"><button class="red-circle-button"><i class="fa-solid fa-car"></i></button><p>Cars</p>
        </label></div>
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
                        <option></option>
                        <!--treba iz baze-->
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Square meters:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" name="square_footage" placeholder="from">
                        <input type="text" class="general-text--input" placeholder="to">
                    </div>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Bedrooms:</p>
                    <select class="select-input">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div>

            <div class="div-center margin-bottom-lg one-row--filter">
                <p class="margin-bottom-sm">Price range:</p>
                <div class="flex flex-gap-sm">
                    <input type="text" class="general-text--input" placeholder="from">
                    <input type="text" class="general-text--input" placeholder="to">
                </div>
            </div>
            <button class="form-button div-center">Apply</button>
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
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Brand:</p>
                    <select class="select-input">
                        <option>Apple</option>
                        <option>Xiaomi</option>
                        <option>Samsung</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Series:</p>
                    <select class="select-input">
                        <option>S24</option>
                        <option>iPhone 15</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Color:</p>
                    <select class="select-input">
                        <option>Red</option>
                        <option>Green</option>
                        <option>Blue</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Storage:</p>
                    <select class="select-input">
                        <option>64</option>
                        <option>128</option>
                        <option>256</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">RAM:</p>
                    <select class="select-input">
                        <option>16</option>
                        <option>32</option>
                        <option>64</option>
                    </select>
                </div>
                <div class="margin-bottom-lg">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" placeholder="from">
                        <input type="text" class="general-text--input" placeholder="to">
                    </div>
                </div>
            </div>

            <button class="form-button div-center">Apply</button>
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
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Brand:</p>
                    <select class="select-input">
                        <option>Nike</option>
                        <option>Adidas</option>
                        <option>Puma</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Model:</p>
                    <select class="select-input">
                        <option>Jordan 1</option>
                        <option>Yeezy</option>
                        <option>Air Force 1</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Gender:</p>
                    <select class="select-input">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Unisex</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Shoe size:</p>
                    <select class="select-input">
                        <option>42</option>
                        <option>43</option>
                        <option>44</option>
                        <!--treba ovo iz baze-->
                    </select>
                </div>
            </div>
                <div class="div-center margin-bottom-lg one-row--filter">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" placeholder="from">
                        <input type="text" class="general-text--input" placeholder="to">
                    </div>
                </div>

            <button class="form-button div-center">Apply</button>
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
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Brand:</p>
                    <select class="select-input">
                        <option>MSI</option>
                        <option>Asus</option>
                        <option>Acer</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Model:</p>
                    <select class="select-input">
                        <option>Katana</option>
                        <option>Dobrila</option>
                        <option>xyz</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Display:</p>
                    <select class="select-input">
                        <option>18</option>
                        <option>24</option>
                        <option>28</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Processor:</p>
                    <select class="select-input">
                        <option>Intel i7</option>
                        <option>Intel i9</option>
                        <option>Ryzen 5000</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Storage:</p>
                    <select class="select-input">
                        <option>256</option>
                        <option>512</option>
                        <option>1024</option>
                        <option>2058</option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">RAM:</p>
                    <select class="select-input">
                        <option>16</option>
                        <option>32</option>
                        <option>64</option>
                    </select>
                </div>
                </div>

                <div class="div-center margin-bottom-lg one-row--filter">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" placeholder="from">
                        <input type="text" class="general-text--input" placeholder="to">
                    </div>
                </div>

                <button class="form-button div-center">Apply</button>
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
            <div class="flex flex-gap-lg wrapped flex-start">
            <?php
            $sql = "SELECT * FROM listings WHERE 1=1";

            // Exclude listings from the logged-in user if session is active
            if (isset($_SESSION['U_ID'])) {
                $user_id = intval($_SESSION['U_ID']);
                $sql .= " AND Seller != $user_id";
            }

            // Price range filter
            if(isset($_POST['price_max'])) {
                $price_max = floatval($_POST['price_max']);
                // In case the minimal price is not set, set it to 0
                $price_min = isset($_POST['price_min']) ? floatval($_POST['price_min']) : 0;

                if ($price_min > $price_max) {
                    $temp = $price_min;
                    $price_min = $price_max;
                    $price_max = $temp;
                }

                $sql .= " AND Price BETWEEN $price_min AND $price_max";
            }

            // Basic sorting
            if(isset($_POST['sort'])) {
                $sort = $_POST['sort'];
                switch($sort) {
                    case 'price_desc':
                        $sql .= " ORDER BY Price DESC";
                        break;
                    case 'price_asc':
                        $sql .= " ORDER BY Price ASC";
                        break;
                    case 'newest':
                        $sql .= " ORDER BY Date_Posted DESC";
                        break;
                    case 'oldest':
                        $sql .= " ORDER BY Date_Posted ASC";
                        break;
                }
            }
            if(isset($_POST['q'])) {
                $search_query = $_POST['q'];
                $sql .= " AND Title LIKE '%$search_query%'";
            }

            // Cars search filter
            if (isset($_POST['cars_search'])) {
                $search_query = $_POST['cars_search'];
                $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM cars)";
            }

            // Manufacturer filter
            if (!empty($_POST['manufacturer'])) {
                /** @noinspection PhpUndefinedVariableInspection */
                $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
                $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Manufacturer = '$manufacturer')";
            }

            // Model filter
            if (!empty($_POST['model'])) {
                /** @noinspection PhpUndefinedVariableInspection */
                $model = mysqli_real_escape_string($conn, $_POST['model']);
                $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Model = '$model')";
            }

            // Mileage range filter
            if (!empty($_POST['mileage_from']) || !empty($_POST['mileage_to'])) {
                $mileage_from = !empty($_POST['mileage_from']) ? intval($_POST['mileage_from']) : 0;
                $mileage_to = !empty($_POST['mileage_to']) ? intval($_POST['mileage_to']) : PHP_INT_MAX;
                $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Mileage BETWEEN $mileage_from AND $mileage_to)";
            }

            // Transmission filter
            if (!empty($_POST['transmission'])) {
                /** @noinspection PhpUndefinedVariableInspection */
                $transmission = mysqli_real_escape_string($conn, $_POST['transmission']);
                $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Transmission = '$transmission')";
            }

            // Price range filter
            if (!empty($_POST['cars_price_max'])) {
                $cars_price_max = floatval($_POST['cars_price_max']);
                $cars_price_min = !empty($_POST['cars_price_min']) ? floatval($_POST['cars_price_min']) : 0;

                if ($cars_price_min > $cars_price_max) {
                    $temp = $cars_price_min;
                    $cars_price_min = $cars_price_max;
                    $cars_price_max = $temp;
                }

                $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Price BETWEEN $cars_price_min AND $cars_price_max)";
            }

            // Fuel type filter
            if (!empty($_POST['fuel_type'])) {
                /** @noinspection PhpUndefinedVariableInspection */
                $fuel_type = mysqli_real_escape_string($conn, $_POST['fuel_type']);
                $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Fuel_Type = '$fuel_type')";
            }

            // Housings search filter
            if (isset($_POST['housings_search'])) {
                $search_query = $_POST['housings_search'];
                $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM housings)";
            }

            // Phones search filter
            if (isset($_POST['phones_search'])) {
                $search_query = $_POST['phones_search'];
                $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM phones)";
            }

            // Shoes search filter
            if (isset($_POST['shoes_search'])) {
                $search_query = $_POST['shoes_search'];
                $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM shoes)";
            }

            // Laptops search filter
            if (isset($_POST['laptops_search'])) {
                $search_query = $_POST['laptops_search'];
                $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM laptops)";
            }

            /** @noinspection PhpUndefinedVariableInspection */
            $result = mysqli_query($conn, $sql);

            //
            // Trebaju promjene da izgleda ljepse
            //

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='listing'>";
                    echo "<h3>" . $row["Title"] . "</h3>";
                    echo "<p>Location: " . $row["Location"] . "</p>";
                    echo "<p>Price: €" . $row["Price"] . "</p>";
                    echo "<p>Posted on: " . $row["Date_Posted"] . "</p>";
                    echo "<p>Description: " . $row["Description"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No listings found";
            }
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