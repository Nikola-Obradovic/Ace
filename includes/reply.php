<?php session_start();
require 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $parent_comment = $_POST['parent_comment'];
    $user = $_SESSION['U_ID'];
    $content = mysqli_real_escape_string($conn, $_POST['reply_comment']);
    $listing = $_POST['listing_id'];

    $sql = "INSERT INTO comments (Listing, Potential_Buyer, Parent_Comment, Content) VALUES ('$listing', '$user', '$parent_comment', '$content')";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    sleep(0.5);
    header('location: ../public/listing.php?id=' . $listing);
    exit();
}