<?php

session_start();

require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $buyer = $_SESSION['U_ID'];
   $listing = $_POST['item_id'];
   $paymentMethod = $_POST['payment'];
   $quantity = $_POST['quantity'];

   $sql = "INSERT INTO transactions (Buyer, Listing, Payment_Method, Num_of_Items) VALUES ('$buyer', '$listing', '$paymentMethod', '$quantity')";
    /** @noinspection PhpUndefinedVariableInspection */
     mysqli_query($conn, $sql);

   $sql_selectQuantity = "SELECT l.Quantity FROM listings l WHERE '$listing' = L_ID";
    $result = mysqli_query($conn, $sql_selectQuantity);
    $row = mysqli_fetch_assoc($result);
    $oldQuantity = $row['Quantity'];

    $newQuantity = $oldQuantity - $quantity;

   $sql_updateListing = "UPDATE listings SET Quantity = $newQuantity WHERE L_ID = '$listing'";
    mysqli_query($conn, $sql_updateListing);



    mysqli_close($conn);
    sleep(1);
    echo "<script>alert('Purchase complete ✅'); window.location.href='../public/index.php';</script>";


}