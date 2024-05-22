<?php

function applyShoesFilters($conn, &$sql) : void
{
    // Shoe brand filter
    if (!empty($_POST['shoe_brand'])) {
        $shoe_brand = mysqli_real_escape_string($conn, $_POST['shoe_brand']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM shoes WHERE Brand = '$shoe_brand')";
    }

    // Shoe model filter
    if (!empty($_POST['shoe_model'])) {
        $shoe_model = mysqli_real_escape_string($conn, $_POST['shoe_model']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM shoes WHERE Model = '$shoe_model')";
    }

    // Gender filter
    if (!empty($_POST['gender'])) {
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM shoes WHERE Gender = '$gender')";
    }

    // Shoe size filter
    if (!empty($_POST['shoe_size'])) {
        $shoe_size = intval($_POST['shoe_size']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM shoes WHERE Size = $shoe_size)";
    }

    // Shoe price range filter
    if (!empty($_POST['shoes_price_max'])) {
        $shoes_price_max = floatval($_POST['shoes_price_max']);
        $shoes_price_min = !empty($_POST['shoes_price_min']) ? floatval($_POST['shoes_price_min']) : 0;

        if ($shoes_price_min > $shoes_price_max) {
            $temp = $shoes_price_min;
            $shoes_price_min = $shoes_price_max;
            $shoes_price_max = $temp;
        }

        $sql .= " AND L_ID IN (SELECT L_ID FROM shoes WHERE Price BETWEEN $shoes_price_min AND $shoes_price_max)";
    }
}