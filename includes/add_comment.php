<?php session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



        $user = $_SESSION['U_ID'];
        $listing = $_POST['listing_id'];
    /** @noinspection PhpUndefinedVariableInspection */
        $content = mysqli_real_escape_string($conn, $_POST['post-comment']);


        $sql = "INSERT INTO comments (Listing, Potential_Buyer, Content) VALUES ('$listing', '$user', '$content')";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);
        sleep(0.5);
        header('location: ../public/listing.php?id=' . $listing);
        exit();
}