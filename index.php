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
        <form action="">

            <div class="flex flex-gap-tiny margin-bottom-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>

                <input type="text" class="general-text--input" placeholder="Search">

            </div>
            <div class="grid grid--2-cols filter-mobile">
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Manufacturer:</p>
                    <select class="select-input">  <!-- !promijeni na svim mjestima, pogledaj dizajn -->
                        <option></option>
                    </select>
                    <!--<input type="text" class="general-text--input">-->
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Model:</p>
                    <select class="select-input">
                        <option></option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Mileage:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" placeholder="from">
                        <input type="text" class="general-text--input" placeholder="to">
                    </div>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Transmission:</p>
                    <select class="select-input">
                        <option></option>
                    </select>
                </div>
                <div class="margin-bottom-md">
                    <p class="margin-bottom-sm">Price range:</p>
                    <div class="flex flex-gap-sm">
                        <input type="text" class="general-text--input" placeholder="from">
                        <input type="text" class="general-text--input" placeholder="to">
                    </div>
                </div>
                <div class="margin-bottom-lg">
                    <p class="margin-bottom-sm">Gas:</p>
                    <select class="select-input">
                        <option></option>
                    </select>
                </div>
            </div>

            <button class="form-button div-center">Apply</button>
        </form>
        </div>
    </section>

    <section class="filter-section hidden">
        <div class="container">
            <form action="">
                <div class="flex flex-gap-tiny margin-bottom-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>

                    <input type="text" class="general-text--input" placeholder="Search">
                </div>
                <div class="grid grid--2-cols filter-mobile">
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Type:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Location:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Square footage:</p>
                        <div class="flex flex-gap-sm">
                            <input type="text" class="general-text--input" placeholder="from">
                            <input type="text" class="general-text--input" placeholder="to">
                        </div>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Bedrooms:</p>
                        <select class="select-input">
                            <option></option>
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

            </form>
        </div>
    </section>

    <section class="filter-section hidden">
        <div class="container">
            <form action="">
                <div class="flex flex-gap-tiny margin-bottom-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>

                    <input type="text" class="general-text--input" placeholder="Search">
                </div>
                <div class="grid grid--2-cols filter-mobile">
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Series:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Color:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Storage:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">RAM:</p>
                        <select class="select-input">
                            <option></option>
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

            </form>
        </div>
    </section>

    <section class="filter-section hidden">

        <div class="container">
            <form action="">
                <div class="flex flex-gap-tiny margin-bottom-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>

                    <input type="text" class="general-text--input" placeholder="Search">
                </div>
                <div class="grid grid--2-cols filter-mobile">
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Gender:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Shoe size:</p>
                        <select class="select-input">
                            <option></option>
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

            </form>
        </div>
    </section>

    <section class="filter-section hidden">
        <div class="container">
            <form action="">
                <div class="flex flex-gap-tiny margin-bottom-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 search-icon">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>

                    <input type="text" class="general-text--input" placeholder="Search">
                </div>
                <div class="grid grid--2-cols filter-mobile">
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Brand:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Model:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Display:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Processor:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">Storage:</p>
                        <select class="select-input">
                            <option></option>
                        </select>
                    </div>
                    <div class="margin-bottom-md">
                        <p class="margin-bottom-sm">RAM:</p>
                        <select class="select-input">
                            <option></option>
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

            </form>
        </div>
    </section>
    <section class="main-section">
        <div class="container">

            <!-- IMPROVE -->

            <h2>Listings</h2>

            <?php

            /*
            $conn = new mysqli('localhost', 'root', 'Oracle2003.', 'temp');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM listings";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<p>Price: $" . $row["price"] . "</p>";
                    echo "<form action='delete_listing.php' method='post'>";
                    echo "<input type='hidden' name='listing_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            */
            ?>





        </div>
    </section>




</main>

<script src="main.js"></script>
</body>
</html>