<?php
// Database connection

$conn = new mysqli('localhost', 'root', 'Oracle2003.', 'temp');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete listing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["listing_id"])) {
    $listing_id = $_POST["listing_id"];

    $sql = "DELETE FROM listings WHERE id=$listing_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// NEEDS IMPROVEMENTS
$conn->close();
?>