<?php

function applyCarFilters($conn, &$sql): void
{
    // Manufacturer filter
    if (!empty($_POST['manufacturer'])) {
        $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Manufacturer = '$manufacturer')";
    }

    // Model filter
    if (!empty($_POST['model'])) {
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Model = '$model')";
    }

    // Mileage range filter
    if (!empty($_POST['mileage_from']) || !empty($_POST['mileage_to'])) {
        $mileage_from = !empty($_POST['mileage_from']) ? intval($_POST['mileage_from']) : 0;
        $mileage_to = !empty($_POST['mileage_to']) ? intval($_POST['mileage_to']) : PHP_INT_MAX;
        $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Mileage BETWEEN $mileage_from AND $mileage_to)";
    }

    // Transmission filter
    if (!empty($_POST['transmission'])) {
        $transmission = mysqli_real_escape_string($conn, $_POST['transmission']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Transmission = '$transmission')";
    }

    // Price range filter
    if (!empty($_POST['cars_price_max'])) {
        $cars_price_max = floatval($_POST['cars_price_max']);
        $cars_price_min = !empty($_POST['cars_price_min']) ? floatval($_POST['cars_price_min']) : 0;

        if ($cars_price_min > $cars_price_max) {
            $temp = $cars_price_min;
            $cars_price_min = $cars_price_max;
            $cars_price_max = $temp;
        }

        $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Price BETWEEN $cars_price_min AND $cars_price_max)";
    }

    // Fuel type filter
    if (!empty($_POST['fuel_type'])) {
        $fuel_type = mysqli_real_escape_string($conn, $_POST['fuel_type']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM cars WHERE Fuel_Type = '$fuel_type')";
    }
}