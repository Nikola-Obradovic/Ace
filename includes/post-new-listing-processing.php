<?php session_start();
require 'db_connection.php';
$i=0;
//echo $_SESSION["img$i"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_SESSION["img$i"])) {
        $_SESSION["no_img"] = true;

        header("location: ../public/post-new-listing.php");
        exit;
    }


    // Escape user inputs for security
    /** @noinspection PhpUndefinedVariableInspection */
    $title = mysqli_real_escape_string($conn, $_POST['item_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $condition = mysqli_real_escape_string($conn, $_POST['condition']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $listing_type = mysqli_real_escape_string($conn, $_POST['listing_type']);
    $seller_id = $_SESSION['U_ID']; // Assuming user ID is stored in session

    $nameFirst = $_SESSION["img0"];
    // Insert into listings table
    $sql = "INSERT INTO listings (Title, Description, Price, Location, Condition_Of_Listing, Date_Posted, Quantity, Seller, First_Picture_Path, Listing_Type) VALUES ('$title', '$description', '$price', '$location', '$condition', NOW(), '$quantity', '$seller_id', '$nameFirst', '$listing_type')";

    mysqli_query($conn, $sql);
    $listing_id = mysqli_insert_id($conn);

    switch ($listing_type) {
        case 'Cars':
            $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
            $model = mysqli_real_escape_string($conn, $_POST['model']);
            $mileage = mysqli_real_escape_string($conn, $_POST['mileage']);
            $mileage = !empty($mileage) ? "'{$mileage}'" : 'null';
            $transmission = mysqli_real_escape_string($conn, $_POST['transmission']);
            $fuel_type = mysqli_real_escape_string($conn, $_POST['fuel_type']);

            $sql_car = "INSERT INTO cars (L_ID, Manufacturer, Model, Mileage, Transmission, Fuel_Type) 
                            VALUES ('$listing_id', '$manufacturer', '$model', $mileage, '$transmission', '$fuel_type')";
            mysqli_query($conn, $sql_car);
            break;

        case 'Housings':
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $square_meters = mysqli_real_escape_string($conn, $_POST['square_meters']);
            $square_meters = !empty($square_meters) ? "'{$square_meters}'" : 'null';
            $num_of_bedrooms = mysqli_real_escape_string($conn, $_POST['num_of_bedrooms']);
            $num_of_bedrooms = !empty($num_of_bedrooms) ? "'{$num_of_bedrooms}'" : 'null';
            $floor = mysqli_real_escape_string($conn, $_POST['floor']);
            $floor = !empty($floor) ? "'{$floor}'" : 'null';

            $sql_housing = "INSERT INTO housings (L_ID, Type, Square_Meters, Num_of_Bedrooms, Floor) 
                                VALUES ('$listing_id', '$type', $square_meters, $num_of_bedrooms, $floor)";
            mysqli_query($conn, $sql_housing);
            break;

        case 'Smartphones':
            $brand = mysqli_real_escape_string($conn, $_POST['brand_phone']);
            $series = mysqli_real_escape_string($conn, $_POST['series']);
            $color = mysqli_real_escape_string($conn, $_POST['color']);
            $storage = mysqli_real_escape_string($conn,  $_POST['storage_phone']);
            $storage = !empty($storage) ? "'{$storage}'" : 'null';
            $ram = mysqli_real_escape_string($conn, $_POST['ram_phone']);
            $ram = !empty($ram) ? "'{$ram}'" : 'null';

            $sql_phone = "INSERT INTO phones (L_ID, Brand, Series, Color, Storage, RAM) 
                              VALUES ('$listing_id', '$brand', '$series', '$color', $storage, $ram)";
            mysqli_query($conn, $sql_phone);
            break;

        case 'Shoes':
            $brand = mysqli_real_escape_string($conn, $_POST['brand_shoe']);
            $model = mysqli_real_escape_string($conn, $_POST['model_shoe']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $size = mysqli_real_escape_string($conn, $_POST['size']);
            $size = !empty($size) ? "'{$size}'" : 'null';

            $sql_shoe = "INSERT INTO shoes (L_ID, Brand, Model, Gender, Size) 
                             VALUES ('$listing_id', '$brand', '$model', '$gender', $size)";
            mysqli_query($conn, $sql_shoe);
            break;

        case 'Laptops':
            $brand = mysqli_real_escape_string($conn, $_POST['brand_laptop']);
            $model = mysqli_real_escape_string($conn, $_POST['model_laptop']);
            $display_size = mysqli_real_escape_string($conn, $_POST['display_size']);
            $display_size = !empty($display_size) ? "'{$display_size}'" : 'null';
            $processor = mysqli_real_escape_string($conn, $_POST['processor']);
            $ram = mysqli_real_escape_string($conn, $_POST['ram_laptop']);
            $ram = !empty($ram) ? "'{$ram}'" : 'null';
            $storage = mysqli_real_escape_string($conn, $_POST['storage']);
            $storage = !empty($storage) ? "'{$storage}'" : 'null';


            $sql_laptop = "INSERT INTO laptops (L_ID, Brand, Model, Display_Size, Processor, RAM, Storage) 
                               VALUES ('$listing_id', '$brand', '$model', $display_size, '$processor', $ram, $storage)";
            mysqli_query($conn, $sql_laptop);
            break;

        case 'Other':
            // No additional fields to insert
            break;
    }


while (isset($_SESSION["img$i"])){
        $name = $_SESSION["img$i"];
    $sql_img = "INSERT INTO pictures (Listing, Picture_Name)
                VALUES ('$listing_id', '$name')";
    mysqli_query($conn, $sql_img);
    unset($_SESSION["img$i"]);
    $i++;

}


}

mysqli_close($conn);
sleep(1);
header('location: ../public/index.php');