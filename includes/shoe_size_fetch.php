<?php

function fetchShoeSize($conn): void
{
    $shoe_query = "SELECT DISTINCT Size FROM shoes ORDER BY Size ASC";
    $shoe_size = mysqli_query($conn, $shoe_query);

    if (mysqli_num_rows($shoe_size) > 0) {
        while ($row = mysqli_fetch_assoc($shoe_size)) {
            echo "<option value='" . intval($row['Size']) . "'>" . intval($row['Size']) . "</option>";
        }
    }
}