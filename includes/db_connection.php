<?php

$db_host = 'localhost';
$db_user = 'hana';
$db_pass = '1234512345';
$db_name = 'ace';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}