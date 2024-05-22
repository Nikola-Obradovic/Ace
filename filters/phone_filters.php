<?php

function applyPhoneFilters($conn, &$sql) : void
{
    // Phone brand filter
    if (!empty($_POST['phone_brand'])) {
        $phone_brand = mysqli_real_escape_string($conn, $_POST['phone_brand']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM phones WHERE Brand = '$phone_brand')";
    }

    // Phone series filter
    if (!empty($_POST['phone_series'])) {
        $phone_series = mysqli_real_escape_string($conn, $_POST['phone_series']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM phones WHERE Series = '$phone_series')";
    }

    // Phone color filter
    if (!empty($_POST['phone_color'])) {
        $phone_color = mysqli_real_escape_string($conn, $_POST['phone_color']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM phones WHERE Color = '$phone_color')";
    }

    // Phone storage filter
    if (!empty($_POST['phone_storage'])) {
        $phone_storage = intval($_POST['phone_storage']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM phones WHERE Storage = $phone_storage)";
    }

    // Phone RAM filter
    if (!empty($_POST['phone_RAM'])) {
        $phone_RAM = intval($_POST['phone_RAM']);
        $sql .= " AND L_ID IN (SELECT L_ID FROM phones WHERE RAM = $phone_RAM)";
    }

    // Phone price range filter
    if (!empty($_POST['phone_price_max'])) {
        $phone_price_max = floatval($_POST['phone_price_max']);
        $phone_price_min = !empty($_POST['phone_price_min']) ? floatval($_POST['phone_price_min']) : 0;

        if ($phone_price_min > $phone_price_max) {
            $temp = $phone_price_min;
            $phone_price_min = $phone_price_max;
            $phone_price_max = $temp;
        }

        $sql .= " AND L_ID IN (SELECT L_ID FROM phones WHERE Price BETWEEN $phone_price_min AND $phone_price_max)";
    }
}