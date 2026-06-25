<?php

$conn = mysqli_connect("localhost", "root", "", "week4db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connected successfully.";

?>