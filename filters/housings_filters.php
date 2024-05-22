<?php

function applyHousingsFilters($conn, &$sql): void
{
    // Housing type filter
    if (!empty($_POST['housings_type'])) {
        $housings_type = mysqli_real_escape_string($conn, $_POST['housings_type']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM housings WHERE Type = '$housings_type')";
    }

    // Location filter
    if (!empty($_POST['location'])) {
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $sql .= " AND Location LIKE '%$location%'";
    }

    // Square meters range filter
    if (!empty($_POST['square_meters_from']) || !empty($_POST['square_meters_to'])) {
        $square_meters_from = !empty($_POST['square_meters_from']) ? intval($_POST['square_meters_from']) : 0;
        $square_meters_to = !empty($_POST['square_meters_to']) ? intval($_POST['square_meters_to']) : PHP_INT_MAX;
        $sql .= " AND L_ID IN (SELECT L_ID FROM housings WHERE Square_Meters BETWEEN $square_meters_from AND $square_meters_to)";
    }

    // Bedrooms filter
    if (!empty($_POST['bedrooms'])) {
        $bedrooms = $_POST['bedrooms'];
        if ($bedrooms == "5+") {
            $sql .= " AND L_ID IN (SELECT L_ID FROM housings WHERE Num_of_Bedrooms >= 5)";
        } else {
            $bedrooms = intval($bedrooms);
            $sql .= " AND L_ID IN (SELECT L_ID FROM housings WHERE Num_of_Bedrooms = $bedrooms)";
        }
    }

    // Housings price range filter
    if (!empty($_POST['housings_price_max'])) {
        $housings_price_max = floatval($_POST['housings_price_max']);
        $housings_price_min = !empty($_POST['housings_price_min']) ? floatval($_POST['housings_price_min']) : 0;

        if ($housings_price_min > $housings_price_max) {
            $temp = $housings_price_min;
            $housings_price_min = $housings_price_max;
            $housings_price_max = $temp;
        }

        $sql .= " AND L_ID IN (SELECT L_ID FROM housings WHERE Price BETWEEN $housings_price_min AND $housings_price_max)";
    }
}