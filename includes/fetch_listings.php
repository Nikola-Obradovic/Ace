<?php
session_start();
require 'db_connection.php';

    $sql = "SELECT * FROM listings l, users u WHERE u.U_ID = l.Seller AND u.User_Status = 'active'";

    // 🔴🔴 Exclude listings from the logged-in user if session is active 🔴🔴
    if (isset($_SESSION['U_ID'])) {
        $user_id = intval($_SESSION['U_ID']);
        $sql .= " AND Seller != $user_id";
    }

    // 🔴🔴 General price range filter 🔴🔴
    if(isset($_POST['price_max'])) {
        $price_max = floatval($_POST['price_max']);
        // In case the minimal price is not set, set it to 0
        $price_min = isset($_POST['price_min']) ? floatval($_POST['price_min']) : 0;

        if ($price_min > $price_max) {
            $temp = $price_min;
            $price_min = $price_max;
            $price_max = $temp;
        }

        $sql .= " AND Price BETWEEN $price_min AND $price_max";
    }

    // 🔴🔴 Basic sorting 🔴🔴
    if(isset($_POST['sort'])) {
        $sort = $_POST['sort'];
        switch($sort) {
            case 'price_desc':
                $sql .= " ORDER BY Price DESC";
                break;
            case 'price_asc':
                $sql .= " ORDER BY Price ASC";
                break;
            case 'newest':
                $sql .= " ORDER BY Date_Posted DESC";
                break;
            case 'oldest':
                $sql .= " ORDER BY Date_Posted ASC";
                break;
        }
    }
    // 🔴🔴 General search filter 🔴🔴
    if(isset($_POST['q'])) {
        $search_query = $_POST['q'];
        $sql .= " AND Title LIKE '%$search_query%'";
    }

    // 🔴🔴 Subcategory filter 🔴🔴
    if(isset($_POST['subcategory'])) {
        $subcategory = $_POST['subcategory'];
        switch($subcategory) {
            case 'car':
                $sql .= " AND L_ID IN (SELECT L_ID FROM cars)";
                break;
            case 'house':
                $sql .= " AND L_ID IN (SELECT L_ID FROM housings)";
                break;
            case 'mobile':
                $sql .= " AND L_ID IN (SELECT L_ID FROM phones)";
                break;
            case 'shoe':
                $sql .= " AND L_ID IN (SELECT L_ID FROM shoes)";
                break;
            case 'laptop':
                $sql .= " AND L_ID IN (SELECT L_ID FROM laptops)";
                break;
        }
    }

    // 🔴🔴 CARS PART 🔴🔴

    // Cars search filter
    if (isset($_POST['cars_search'])) {
        $search_query = $_POST['cars_search'];
        $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM cars)";
    }

    include '../filters/cars_filters.php';
/** @noinspection PhpUndefinedVariableInspection */
    applyCarFilters($conn, $sql);

    // 🔴🔴 HOUSINGS PART 🔴🔴

    // Housings search filter
    if (isset($_POST['housings_search'])) {
        $search_query = $_POST['housings_search'];
        $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM housings)";
    }

    include '../filters/housings_filters.php';
    applyHousingsFilters($conn, $sql);

    // 🔴🔴 PHONES PART 🔴🔴

    // Phones search filter
    if (isset($_POST['phones_search'])) {
        $search_query = $_POST['phones_search'];
        $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM phones)";
    }

    include '../filters/phone_filters.php';
    applyPhoneFilters($conn, $sql);

    // 🔴🔴 SHOES PART 🔴🔴

    // Shoes search filter
    if (isset($_POST['shoes_search'])) {
        $search_query = $_POST['shoes_search'];
        $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM shoes)";
    }

    include '../filters/shoes_filters.php';
    applyShoesFilters($conn, $sql);

    // 🔴🔴 LAPTOPS PART 🔴🔴

    // Laptops search filter
    if (isset($_POST['laptops_search'])) {
        $search_query = $_POST['laptops_search'];
        $sql .= " AND Title LIKE '%$search_query%' AND listings.L_ID IN (SELECT L_ID FROM laptops)";
    }

    include '../filters/laptops_filters.php';
    applyLaptopsFilters($conn, $sql);

    $result = mysqli_query($conn, $sql);

$_SESSION['result'] = mysqli_fetch_all($result, MYSQLI_ASSOC);  // Fetch all rows as an associative array
mysqli_free_result($result);

    //
    // Trebaju promjene da izgleda ljepse
    //

    header('location: ../public/index.php');
    exit;
