<?php
session_start();
require '../includes/db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $seller_id = $_GET['seller_id'];

    $sql = "SELECT Username, About_me, Profile_Picture_Path FROM users WHERE U_ID = '$seller_id'";
    $result = mysqli_query($conn, $sql);
    $seller = mysqli_fetch_assoc($result);
}

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
    <link rel="stylesheet" href="../css/slider.css">

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
                    <a href="../public/post-new-listing.php" class="main-nav-link">Post New Listing</a>
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
    <section class="container">
        <div class="profile container seller-profile">
            <div class="profile-info-left">
                <?php
                $pictureSource = !empty($seller['Profile_Picture_Path']) ? $seller['Profile_Picture_Path'] : 'default-avatar-icon.jpg';
                ?>
                <img src="../img/<?php echo htmlspecialchars($pictureSource); ?>" alt="Profile picture" class="profile-picture">
            </div>
            <div class="profile-info-right">
                <h1 class="seller-username"><?php echo $seller['Username']; ?></h1>
            </div>
        </div>
        <div class="bio-container div-center margin-bottom-xsm">
            <h2 class="profile-info-description text-center margin-bottom-lg"><?php echo !empty($seller['About_me']) ? $seller['About_me'] : 'This user has not provided an "About me" section yet.';?></h2>
        </div>
    </section>
    <section class="container">
        <div class="my_profile_elements margin-bottom-md">
            <h2>Active listings:</h2>
            <div class="listings">
                <?php
                $listingsSQL = "SELECT l.L_ID, l.Title, l.Price, l.Location, l.Date_Posted, l.First_Picture_Path FROM listings l WHERE Seller=" . $seller_id . " AND isHidden=0";
                $listingsResult = mysqli_query($conn, $listingsSQL);
                $listings = mysqli_fetch_all($listingsResult, MYSQLI_ASSOC);

                if (mysqli_num_rows($listingsResult) > 0) {
                    foreach ($listings as $listing) {
                        //$listingType = $listing['Listing_Type'];
                        $listingId = $listing['L_ID'];
                        $listingTitle = $listing['Title'];
                        $listingPrice = $listing['Price'];
                        $listingLocation = $listing['Location'];
                        $listingDate = $listing['Date_Posted'];
                        $listingPicture = $listing['First_Picture_Path'];
                        ?>
                        <div class="profile-listings">
                            <a href="listing.php?id=<?php echo $listingId; ?>">
                                <img src="../img/<?php echo htmlspecialchars($listingPicture); ?>" alt="Listing picture" class="listing_img_small">
                            </a>
                            <div class="listing-info">
                                <h3><?php echo htmlspecialchars($listingTitle); ?></h3>
                                <p>Price: <?php echo htmlspecialchars($listingPrice); ?>$</p>
                                <p>Location: <?php echo htmlspecialchars($listingLocation); ?></p>
                                <p>Date posted: <?php echo htmlspecialchars($listingDate); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<h3>No active listings</h3>";
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
            <p><a href="./index.php">Discover</a></p>
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

<script src="../js/main.js"></script>

</body>
</html>
