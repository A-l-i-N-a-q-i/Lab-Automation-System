<?php
$conn = mysqli_connect("localhost", "root", "", "automationdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
