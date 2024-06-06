<?php
session_start();
$folder_name = '../img/';

// Check if the request contains any files
if (!empty($_FILES['file']['name'][0])) {

    $path = $folder_name . basename($_FILES['file']['name']);

    // Move the file to the upload directory
    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        echo "File uploaded successfully.\n";
    }

    $_SESSION["profile_picture"]= $_FILES['file']['name'];

} else {
    echo "No files uploaded.\n";
}