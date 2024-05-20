<?php
session_start();
?>
<?php
/*
// Database connection

$conn = new mysqli('localhost', 'root', 'Oracle2003.', 'temp');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert new listing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $sql = "INSERT INTO listings (title, description, price) VALUES ('$title', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        header("Location: post-new-listing.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// NEEDS IMPROVEMENTS
$conn->close();
*/
?>

