<?php
require 'db_connection.php';

if ($_POST) {
    $userId = $_POST['user_id'];

    if (isset($_POST['promote'])) {
        $updateUserSQL = "UPDATE users SET User_Type = 'admin' WHERE U_ID = $userId";
    } elseif (isset($_POST['demote'])) {
        $updateUserSQL = "UPDATE users SET User_Type = 'normal' WHERE U_ID = $userId";
    } elseif (isset($_POST['ban'])) {
        $updateUserSQL = "UPDATE users SET User_Status = 'inactive' WHERE U_ID = $userId";
    } elseif (isset($_POST['unban'])) {
        $updateUserSQL = "UPDATE users SET User_Status = 'active' WHERE U_ID = $userId";
    }

    /** @noinspection PhpUndefinedVariableInspection */
    $result = mysqli_query($conn, $updateUserSQL);

    if ($result) {
        header("Location: ../public/your_profile.php");
        exit;
    } else {
        header("Location: ../public/your_profile.php");
        exit;
    }
}
