<?php
session_start();
require '../includes/db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    /** @noinspection PhpUndefinedVariableInspection */
    $item_id = mysqli_real_escape_string($conn, $_GET['id']);


    $listing_sql = "SELECT * FROM listings WHERE L_ID = '$item_id'";
    $result_listing = mysqli_query($conn, $listing_sql);
    $row_listing = mysqli_fetch_assoc($result_listing);


    mysqli_free_result($result_listing);
    $img_sql = "SELECT * FROM pictures WHERE Listing = '$item_id'";
    $result_img = mysqli_query($conn, $img_sql);
    $images = array();

// Fetch the results into the array
    while ($row = mysqli_fetch_assoc($result_img)) {
        $images[] = $row["Picture_Name"];
    }


}
mysqli_free_result($result_img);
$listing_type = $row_listing['Listing_Type'];
$base_path = "../img/";

$attributes_map = [
    'Cars' => ['Manufacturer', 'Model', 'Mileage', 'Transmission', 'Fuel_Type'],
    'Housings' => ['Type', 'Square_Meters', 'Num_of_Bedrooms', 'Floor'],
    'Smartphones' => ['Brand', 'Series', 'Color' , 'Storage', 'RAM'],
    'Shoes' => ['Brand', 'Model' , 'Gender' ,'Size'],
    'Laptops' => ['Brand', 'Model', 'Display_Size', 'Processor' ,'RAM', 'Storage']
];

$attributes_to_display = isset($attributes_map[$listing_type]) ? $attributes_map[$listing_type] : [];

if ($listing_type == "Smartphones"){
    $listing_type = "Phones";
}

if ($listing_type != "Other") {
    $subtype_sql = "SELECT * FROM $listing_type WHERE L_ID = '$item_id'";
    $result_subtype = mysqli_query($conn, $subtype_sql);
    $row_subtype = mysqli_fetch_assoc($result_subtype);
    mysqli_free_result($result_subtype);
}else {
    $subtype_details = [];
}

$comments_sql = "SELECT * FROM comments WHERE Listing = '$item_id'";
$result_comments = mysqli_query($conn, $comments_sql);
$comments = array();

while($row = mysqli_fetch_assoc($result_comments)) {
    $comments[] = $row;
}



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['quantity'])) {

        $quantity = $_POST['quantity'];

        $_SESSION['purchased_quantity'] = $quantity;


    } else {
        echo 'problem';
    }
} else echo 'belaj';




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
                    <a href="../post-new-listing.php" class="main-nav-link">Post New Listing</a>
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


<section class="listing-section">

    <div class="slider">
        <ul class="slides">
            <?php
            // Generate the slides and radio buttons
            for ($i = 0; $i < count($images); $i++):
                $image_src = htmlspecialchars($base_path . $images[$i]);
                $prev_img = $i == 0 ? count($images) : $i;
                $next_img = ($i + 2) > count($images) ? 1 : ($i + 2);
                ?>
                <input type="radio" name="radio-btn" id="img-<?php echo $i + 1; ?>" <?php echo $i === 0 ? 'checked' : ''; ?> />
                <li class="slide-container">
                    <div class="slide">
                        <img src="<?php echo $image_src; ?>" />
                    </div>
                    <div class="nav">
                        <label for="img-<?php echo $prev_img; ?>" class="prev">&#x2039;</label>
                        <label for="img-<?php echo $next_img; ?>" class="next">&#x203a;</label>
                    </div>
                </li>
            <?php endfor; ?>

            <li class="nav-dots">
                <?php for ($i = 0; $i < count($images); $i++): ?>
                    <label for="img-<?php echo $i + 1; ?>" class="nav-dot" id="img-dot-<?php echo $i + 1; ?>"></label>
                <?php endfor; ?>
            </li>
        </ul>
    </div>

<div class="container">

    <div class="grid grid--2-cols margin-top-md margin-bottom-sm">
<?php
    echo "<div>";
    echo "<h1 class='font-size44'>{$row_listing["Title"]}</h1>";
    echo "<h2>{$row_listing["Price"]}KM</h2>";
    echo "</div>";
    if ($row_listing["isHidden"] == null || $row_listing["isHidden"] == 0){
        echo "<div class='stock'>";
        echo "<h2>In stock</h2>";
        echo "<h3>Quantity: {$row_listing["Quantity"]}</h3>";
        echo "</div>";
    } else{
        echo "<h2 class='stock'>Out of stock</h2>";
    }
?>



    </div>

    <?php

    if(!empty($row_listing["Description"])){
        echo "<div class='description margin-bottom-md'>";

        echo "<p class='description-paragraph'>{$row_listing["Description"]}</p>";

        echo "</div>";

    } ?>


    <?php if (!empty($attributes_to_display)): ?>
        <div class="margin-bottom-md">
        <table class="listing-details-table">
            <tbody>
            <?php foreach ($attributes_to_display as $attribute): ?>
                <?php if (!is_null($row_subtype[$attribute])): ?>
                    <tr>
                        <th><?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $attribute))). ":"; ?></th>
                        <td><?php echo htmlspecialchars($row_subtype[$attribute]); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>

    <?php endif; ?>


    <div class="container flex flex-gap-lg margin-top-slg margin-bottom-lg">
        <p class="comments-btn">Comments</p>
        <?php if(($row_listing["isHidden"] == null || $row_listing["isHidden"] == 0 ) && isset($_SESSION['U_ID']))
            echo "<button class='form-button purchase-button'>Purchase</button>";
        ?>
    </div>

    <section class="comment-section margin-top-md hidden">

      <?php if (isset($_SESSION['U_ID'])) { ?>
        <form action="../includes/add_comment.php" method="POST">
            <input type="hidden" value="<?php echo $item_id; ?>" name="listing_id">
            <div class="margin-top-md margin-bottom-lg">
                <div class="flex flex-gap-sm post-comment-div">
                    <textarea class="textarea" name="post-comment" rows="7" required></textarea>
                    <button type="submit" class="form-button">Post</button>
                </div>
            </div>
        </form>
         <?php } else {

          echo '<h1 class="margin-bottom-md">Log in to post a comment</h1>';

      }   ?>

        <?php foreach ($comments as $comment): ?>
                <?php if($comment['Parent_Comment'] == null): ?>

                    <?php
                        $user_id = $comment['Potential_Buyer'];
                        $username_sql = "SELECT Username FROM users WHERE U_ID = '$user_id'";
                        $result_username = mysqli_query($conn, $username_sql);
                        $username = mysqli_fetch_assoc($result_username);
                    ?>

                    <div class="margin-bottom-xsm">
                        <p><?php echo $username['Username']; ?></p>
                        <div class="comment-box"><?php echo $comment['Content']; ?></div>
                        <p class="reply" reply-id="<?php echo $comment['C_ID']; ?>">Reply</p>
                    </div>


                        <div class="margin-bottom-xsm child-comment reply-comment hidden" id="reply-comment-<?php echo $comment['C_ID']; ?>">
                            <?php if(isset($_SESSION['U_ID'])){    ?>
                            <form action="../includes/reply.php" method="POST">
                                <input type="hidden" value="<?php echo $item_id; ?>" name="listing_id">
                                <input value="<?php echo $comment['C_ID']; ?>" type="hidden" name="parent_comment">
                                <p>Reply @ <?php echo $username['Username']; ?></p>


                                <div class="flex flex-gap-sm">
                                    <input type="text" class="comment-box" name="reply_comment" required>
                                    <button type="submit" class="form-button">Reply</button>
                                </div>


                            </form>
                            <?php  } ?>
                        </div>


                    <?php foreach($comments as $child_comment): ?>
                        <?php if($child_comment['Parent_Comment'] == $comment['C_ID']): ?>

                            <?php
                            $user_id = $child_comment['Potential_Buyer'];
                            $username_sql = "SELECT Username FROM users WHERE U_ID = '$user_id'";
                            $result_username = mysqli_query($conn, $username_sql);
                            $child_username = mysqli_fetch_assoc($result_username);
                            ?>

                            <div class="margin-bottom-xsm child-comment">
                                <p><?php echo $child_username['Username']; ?></p>
                                <div class="comment-box"><?php echo $child_comment['Content']; ?></div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
        <?php endforeach; ?>



    </section>


</div>




    <?php if (isset($_SESSION['U_ID'])){ ?>
   <div class="pop-up transaction-pop-up hidden">
       <div class="exit-button-payment margin-bottom-sm">
           <i class="fa-solid fa-x" style="color: #040404;"></i>
       </div>


       <div class="payment-section">
           <p class="heading-secondary margin-bottom-md">Item name</p>
           <p class="margin-bottom-sm">Payment method</p>
           <select class="select-input margin-bottom-xsm smaller-input payment-options" required>
               <option disabled selected>Select Option</option>
               <option>Credit Card</option>
               <option>Paypal</option>
           </select>
       </div>

       <div class="payment-section">
           <form class="form-payment hidden" id="credit-card-form">
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

               <p class="margin-bottom-sm">Billing Address</p>
               <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Street Name">
               <div class="flex flex-gap-sm">
                   <input type="text" class="general-text--input margin-bottom-xsm" placeholder="City">
                   <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Postal/Zip Code">
               </div>

               <div>
                   <p>Quantity</p>
                   <div class="quantity-container">
                       <button type="button" class="quantity-btn decrement" data-action="minus" data-form="credit-card-form">-</button>
                       <input type="number" class="quantity-input" id="quantity-credit-card" name="quantity" value="1" min="1" max="<?php echo $row_listing["Quantity"];?>">
                       <button type="button" class="quantity-btn increment" data-action="add" data-form="credit-card-form">+</button>
                   </div>
               </div>

               <div class="flex flex-column">
                   <p class="heading-tertiary--black container-button-left margin-bottom-sm total-price" id="total-price-credit-card"><?php echo $row_listing['Price'] . "KM"; ?></p>
                   <input type="hidden" value='<?php $row_listing['Price'] ?>' />
                   <div class="container-button-left margin-bottom-md">
                       <button class="form-button">Purchase</button>
                   </div>
               </div>
           </form>

           <form class="form-payment hidden" id="paypal-form">
               <div>
                   <p class="margin-bottom-xsm"></p>
                   <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Email">
                   <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Password">
               </div>

               <p class="margin-bottom-sm">Billing Address</p>
               <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Street Name">
               <div class="flex flex-gap-sm">
                   <input type="text" class="general-text--input margin-bottom-xsm" placeholder="City">
                   <input type="text" class="general-text--input margin-bottom-xsm" placeholder="Postal/Zip Code">
               </div>

               <div>
                   <p>Quantity</p>
                   <div class="quantity-container">
                       <button type="button" class="quantity-btn decrement" data-action="minus" data-form="paypal-form">-</button>
                       <input type="number" class="quantity-input" id="quantity-paypal" name="quantity" value="1" min="1" max="<?php echo $row_listing["Quantity"];?>">
                       <button type="button" class="quantity-btn increment" data-action="add" data-form="paypal-form">+</button>
                   </div>
               </div>

               <div class="flex flex-column">
                   <p class="heading-tertiary--black container-button-left margin-bottom-sm total-price" id="total-price-paypal"><?php echo $row_listing['Price'] . "KM"; ?></p>
                   <input type="hidden" value='<?php $row_listing['Price'] ?>' />
                   <div class="container-button-left margin-bottom-md">
                       <button class="form-button">Purchase</button>
                   </div>
               </div>
           </form>
       </div>






   </div>
    <?php } ?>

</section>

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

<div class="dimmed-background hidden"></div>


<script src="../js/main.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const forms = [
            {
                formId: 'credit-card-form',
                quantityInputId: 'quantity-credit-card',
                totalPriceElementId: 'total-price-credit-card',
                pricePerUnit: <?php echo $row_listing['Price']; ?> // Fetch the price from PHP
            },
            {
                formId: 'paypal-form',
                quantityInputId: 'quantity-paypal',
                totalPriceElementId: 'total-price-paypal',
                pricePerUnit: <?php echo $row_listing['Price']; ?> // Fetch the price from PHP
            }
        ];

        forms.forEach(({ formId, quantityInputId, totalPriceElementId, pricePerUnit }) => {
            const quantityInput = document.getElementById(quantityInputId);
            const totalPriceElement = document.getElementById(totalPriceElementId);

            // Function to update the total price
            function updateTotalPrice() {
                const quantity = parseInt(quantityInput.value);
                let totalPrice = quantity * pricePerUnit;
                totalPrice = totalPrice.toFixed(2);
                totalPriceElement.textContent = totalPrice + 'KM';
            }

            // Event listener for quantity input change
            quantityInput.addEventListener('input', updateTotalPrice);

            // Event listeners for increment/decrement buttons
            document.querySelectorAll(`[data-form="${formId}"]`).forEach(button => {
                button.addEventListener('click', function() {
                    if (this.dataset.action === 'minus' && quantityInput.value > 1) {
                        quantityInput.value--;
                    } else if (this.dataset.action === 'add' && quantityInput.value < quantityInput.max) {
                        quantityInput.value++;
                    }
                    updateTotalPrice();
                });
            });
        });
    });
</script>

</body>
</html>