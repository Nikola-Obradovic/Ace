<?php
require 'db_connection.php';
echo "<link rel='stylesheet' href='../css/general.css'>";
echo "<link rel='stylesheet' href='../css/style.css'>";
echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
echo "<link href='https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap' rel='stylesheet'>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $listing_id = intval($_POST['listing_id']);
    echo "<form action='../includes/update_quantity.php' method='POST' class='quantity-form'>";
    echo "<input type='hidden' name='listing_id' value='$listing_id'>";
    echo "<div class='form-group'>";
    echo "<label for='quantity'>Quantity:</label>";
    echo "<input type='number' id='quantity' name='quantity' class='form-control' min='1' required>";
    echo "</div>";
    echo "<button type='submit' name='update_quantity' class='form-button'>Update</button>";
    echo "</form>";
}
