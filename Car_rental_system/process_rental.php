<?php
include 'db_connection.php';

$car_id = $_POST['car_id'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$rental_date = $_POST['rental_date'];
$return_date = $_POST['return_date'];
$sql_check_customer = "SELECT id FROM customers WHERE email = '$email'";
$result_check_customer = mysqli_query($conn, $sql_check_customer);

if (mysqli_num_rows($result_check_customer) > 0) {
    
    $row = mysqli_fetch_assoc($result_check_customer);
    $customer_id = $row['id'];
} else {
    
    $sql_insert_customer = "INSERT INTO customers (full_name, email, phone) VALUES ('$full_name', '$email', '$phone')";
    if (mysqli_query($conn, $sql_insert_customer)) {
        $customer_id = mysqli_insert_id($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
}


$sql_insert_rental = "INSERT INTO rentals (car_id, customer_id, rental_date, return_date) VALUES ($car_id, $customer_id, '$rental_date', '$return_date')";
if (mysqli_query($conn, $sql_insert_rental)) {
    echo "Car rented successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
