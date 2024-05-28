<?php
session_start();
$uploadDirectory = '../img/';

// Check if the request contains any files
if (!empty($_FILES['file']['name'][0])) {
    // Loop through each file in the request
    $i=0;

    while (isset($_SESSION["img$i"])){
        $i++;
    }
    foreach ($_FILES['file']['name'] as $key => $fileName) {
        // Construct the target path for the file
        $targetPath = $uploadDirectory . basename($fileName);

        // Move the file to the upload directory
        if (move_uploaded_file($_FILES['file']['tmp_name'][$key], $targetPath)) {
            echo "File $fileName uploaded successfully.\n";
        } else {
            echo "Error uploading file $fileName.\n";
        }
       //$_SESSION['imgName']=$_FILES['file']['name'][0];
        $_SESSION["img$i"]= $fileName;
        $i++;
    }
} else {
    echo "No files uploaded.\n";
}