<?php

function applyLaptopsFilters($conn, &$sql) : void
{
    // Laptop brand filter
    if (!empty($_POST['laptop_brand'])) {
        $laptop_brand = mysqli_real_escape_string($conn, $_POST['laptop_brand']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM laptops WHERE Brand = '$laptop_brand')";
    }

    // Laptop model filter
    if (!empty($_POST['laptop_model'])) {
        $laptop_model = mysqli_real_escape_string($conn, $_POST['laptop_model']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM laptops WHERE Model = '$laptop_model')";
    }

    // Display size filter
    if (!empty($_POST['display_size'])) {
        $display_size = intval($_POST['display_size']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM laptops WHERE Display_Size = $display_size)";
    }

    // Processor filter
    if (!empty($_POST['processor'])) {
        $processor = mysqli_real_escape_string($conn, $_POST['processor']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM laptops WHERE Processor = '$processor')";
    }

    // Laptop storage filter
    if (!empty($_POST['laptop_storage'])) {
        $laptop_storage = intval($_POST['laptop_storage']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM laptops WHERE Storage = $laptop_storage)";
    }

    // Laptop RAM filter
    if (!empty($_POST['laptop_RAM'])) {
        $laptop_RAM = intval($_POST['laptop_RAM']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM laptops WHERE RAM = $laptop_RAM)";
    }

    // Laptop price range filter
    if (!empty($_POST['laptop_price_max'])) {
        $laptop_price_max = floatval($_POST['laptop_price_max']);
        $laptop_price_min = !empty($_POST['laptop_price_min']) ? floatval($_POST['laptop_price_min']) : 0;

        if ($laptop_price_min > $laptop_price_max) {
            $temp = $laptop_price_min;
            $laptop_price_min = $laptop_price_max;
            $laptop_price_max = $temp;
        }

        $sql .= " AND L_ID IN (SELECT L_ID FROM laptops WHERE Price BETWEEN $laptop_price_min AND $laptop_price_max)";
    }
}