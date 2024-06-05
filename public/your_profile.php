<?php
session_start();
require '../includes/db_connection.php';

$userType = $_SESSION['User_Type'] ?? '';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Profile</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">


    <!-- LATO -->
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
<main>
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
                        <a href="./post-new-listing.php" class="main-nav-link">Post New Listing</a>
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

    <div class="profile container">
        <div class="profile-info-left">
            <?php
            $profilePicSQL = "SELECT Profile_Picture_Path FROM users WHERE U_ID=" . $_SESSION['U_ID'];
            /** @noinspection PhpUndefinedVariableInspection */
            $profilePicResult = mysqli_query($conn, $profilePicSQL);
            $user = mysqli_fetch_assoc($profilePicResult);
            $pictureSource = !empty($user['Profile_Picture_Path']) ? $user['Profile_Picture_Path'] : 'default-avatar-icon.jpg';
            ?>
            <img src="../img/<?php echo htmlspecialchars($pictureSource); ?>" alt="Profile picture" class="profile-picture">
        </div>
        <div class="profile-info-right">
            <h2 class="profile-info-title">Hello <?php echo $_SESSION['Username']; ?>!</h2>

            <?php
            $totalSpentSQL = "SELECT SUM(Total_Amount) AS total_spent FROM transactions WHERE Buyer=" . $_SESSION['U_ID'];
            $totalSpentResult = mysqli_query($conn, $totalSpentSQL);
            $totalSpentRow = mysqli_fetch_assoc($totalSpentResult);
            $totalSpent = $totalSpentRow['total_spent'];

            echo "<h2 class='profile-info-title'>Total Amount Spent: " . number_format($totalSpent, 2) . " KM</h2>";
            ?>
        </div>

    </div>

    <h2 class="profile-info-title text-center margin-bottom-lg"><?php echo !empty($_SESSION['About_me']) ? $_SESSION['About_me'] : 'This user has not provided an "About me" section yet.';?></h2>

    <section class="container">
    <div class="my_profile_elements margin-bottom-md">
        <h2>Active listings:</h2>
        <div class="listings">
            <?php
            $listingsSQL = "SELECT * FROM listings WHERE Seller=" . $_SESSION['U_ID'] . " AND isHidden=0";
            $listingsResult = mysqli_query($conn, $listingsSQL);
            $listings = mysqli_fetch_all($listingsResult, MYSQLI_ASSOC);

            if (mysqli_num_rows($listingsResult) > 0) {
                foreach ($listings as $listing) {
                    $listingType = $listing['Listing_Type'];
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

    <div class="my_profile_elements margin-bottom-md">
        <h2>Inactive listings:</h2>
        <div class="listings">
            <?php
            $listingsSQL = "SELECT * FROM listings WHERE Seller=" . $_SESSION['U_ID'] . " AND isHidden=1";
            $listingsResult = mysqli_query($conn, $listingsSQL);

            if (mysqli_num_rows($listingsResult) > 0) {
            $listings = mysqli_fetch_all($listingsResult, MYSQLI_ASSOC);
            foreach ($listings as $listing) {
                $listingType = $listing['Listing_Type'];
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
            <?php }
            }else {
                echo "<h3>No inactive listings</h3>";
            }?>
        </div>
    </div>

    <div class="my_profile_elements margin-bottom-md">
        <h2>Completed transactions:</h2>
        <div class="listings">
            <?php
            $transactionsSQL = "SELECT * FROM transactions WHERE Buyer=" . $_SESSION['U_ID'];
            $transactionsResult = mysqli_query($conn, $transactionsSQL);
            if (mysqli_num_rows($transactionsResult) > 0) {
            $transactions = mysqli_fetch_all($transactionsResult, MYSQLI_ASSOC);
            foreach ($transactions as $transaction) {
                $transactionPayment = $transaction['Payment_Method'];
                $transactionQuantity = $transaction['Num_of_Items'];
                $transactionPrice = $transaction['Total_Amount'];
                $transactionSQL = "SELECT * FROM listings WHERE L_ID=" . $transaction['Listing'];
                $transactionResult = mysqli_query($conn, $transactionSQL);
                $transactionListing = mysqli_fetch_assoc($transactionResult);
                $transactionTitle = $transactionListing['Title'];
                $transactionLocation = $transactionListing['Location'];
                $transactionPicture = $transactionListing['First_Picture_Path'];
                ?>
                <div class="profile-listings">
                    <img src="../img/<?php echo htmlspecialchars($transactionPicture); ?>" alt="Listing picture" class="listing_img_small">
                    <div class="listing-info">
                        <h3><?php echo htmlspecialchars($transactionTitle); ?></h3>
                        <p>Total price: <?php echo htmlspecialchars($transactionPrice); ?>$</p>
                        <p>Payment method: <?php echo htmlspecialchars($transactionPayment); ?></p>
                        <p>Quantity: <?php echo htmlspecialchars($transactionQuantity); ?></p>
                    </div>
                </div>
            <?php }
            } else{
                echo "<h3>No transactions</h3>";
            }
            ?>
        </div>
    </div>

    <?php if($userType === 'admin') { ?>
        <div class="admin-section">
            <h2>Admin Panel</h2>
            <div class="all-users">
                <?php
                $usersSQL = "SELECT * FROM users WHERE U_ID!=" . $_SESSION['U_ID'];
                $usersResult = mysqli_query($conn, $usersSQL);

                if (mysqli_num_rows($usersResult) > 0) {
                    while ($user = mysqli_fetch_assoc($usersResult)) {
                        $userId = $user['U_ID'];
                        $username = htmlspecialchars($user['Username']);
                        $userType = htmlspecialchars($user['User_Type']);
                        $userStatus = htmlspecialchars($user['User_Status']);
                        ?>
                        <div class="users">
                            <p>Username: <?php echo $username; ?></p>
                            <p>User Type: <?php echo $userType; ?></p>
                            <form style="padding: 0; display: flex; justify-content: space-between" action="../includes/admin_actions.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                                <?php if ($userStatus === 'inactive') { ?>
                                    <button type="submit" name="unban" class="form-button2">Unban</button>
                                <?php } else { ?>
                                    <?php if ($userType === 'normal') { ?>
                                        <button type="submit" name="promote" class="form-button2">Promote</button>
                                    <?php } elseif ($userType === 'admin') { ?>
                                        <button type="submit" name="demote" class="form-button2">Demote</button>
                                    <?php } ?>
                                    <?php if ($userStatus === 'active') { ?>
                                        <button type="submit" name="ban" class="form-button2">Ban</button>
                                    <?php } ?>
                                <?php } ?>
                            </form>
                        </div>
                    <?php }
                }
                else {
                    echo "<p>No users found</p>";
                }
                ?>
            </div>
        </div>
    <?php } ?>
    </section>

</main>

<script src="../js/main.js"></script>
</body>
</html>