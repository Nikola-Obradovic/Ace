<?php

function fetchlocation($conn): void
{
    $query = "SELECT DISTINCT Location FROM listings ORDER BY Location ASC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . htmlspecialchars($row['Location']) . "'>" . htmlspecialchars($row['Location']) . "</option>";
        }
    }
}