<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Car</title>
    <link rel="stylesheet" href="./rent_car.css">
</head>
<body>
    
    
        <h1 >Rent Car</h1>
        <?php
        // Include database connection
        include 'db_connection.php';

        // Check if car ID is provided
        if (isset($_GET['id'])) {
            $car_id = $_GET['id'];

            // Fetch car details
            $sql = "SELECT * FROM cars WHERE id = $car_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "<p>You are about to rent: {$row['brand']} {$row['model']} ({$row['year']})</p>";
                echo "<form action='process_rental.php' method='post'>";
                echo "<input type='hidden' name='car_id' value='$car_id'>";
                echo "<label for='full_name'>Full Name </label><br>";
                echo "<input type='text' id='full_name' name='full_name'><br><h6></h6>";
                echo "<label for='email'>Email </label><br>";
                echo "<input type='email' id='email' name='email'><br><h6></h6>";
                echo "<label for='phone'>Phone </label><br>";
                echo "<input type='text' id='phone' name='phone'><br><h6></h6>";
                echo "<label for='rental_date'>Rental Date</label><br>";
                echo "<input type='date' id='rental_date' name='rental_date'><br><h6></h6>";
                echo "<label for='return_date'>Return Date</label><br>";
                echo "<input type='date' id='return_date' name='return_date'><br><h6></h6>";
                echo "<input type='submit' id='submit' value='Rent'>";
                echo "</form>";
            } else {
                echo "Car not found.";
            }
        } else {
            echo "Car ID not provided.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    
</body>
</html>

