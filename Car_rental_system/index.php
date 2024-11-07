<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <center>
        <h1>Available Cars for Rent</h1>
        </center>
        <table>
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Rental Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                include 'db_connection.php';

                
                $sql = "SELECT * FROM cars WHERE availability = 'Available'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['brand']}</td>";
                        echo "<td>{$row['model']}</td>";
                        echo "<td>{$row['year']}</td>";
                        echo "<td>{$row['color']}</td>";
                        echo "<td>{$row['rental_price']}</td>";
                        echo "<td><a href='rent_car.php?id={$row['id']}'>Rent</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No cars available for rent.</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
