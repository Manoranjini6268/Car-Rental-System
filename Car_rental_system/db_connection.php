<?php
$servername = "localhost";
$username = "root";
$password = "mano6268";
$dbname = "car_rental";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
