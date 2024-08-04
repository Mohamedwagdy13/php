<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
   
</head>
<body>
    <div class="container">
        <h1>Search Product by Code</h1>

        <?php
        // Establish database connection
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $database_name = 'users';

        $connection = mysqli_connect($server, $username, $password, $database_name);

        if (!$connection) {
            die('Error: ' . mysqli_connect_error());
        }

        $productCode = '';
        $result = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['productCode']) && !empty($_POST['productCode'])) {
                $productCode = mysqli_real_escape_string($connection, $_POST['productCode']);

                $sqlcommand = "SELECT * FROM products WHERE productCode = '$productCode'";
                $result = mysqli_query($connection, $sqlcommand);

                if (!$result) {
                    echo '<p class="alert">Error executing query: ' . mysqli_error($connection) . '</p>';
                }
            } else {
                echo '<p class="alert">Please enter a valid product code.</p>';
            }
        }
        ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="productCode">Enter Product Code:</label>
                <input type="text" id="productCode" name="productCode" class="form-control" value="<?php echo htmlspecialchars($productCode); ?>" required>
            </div>
            <button type="submit" class="btn">Search</button>
        </form>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            echo '<table>
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Quantity in Stock</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . htmlspecialchars($row['productCode']) . '</td>
                        <td>' . htmlspecialchars($row['productName']) . '</td>
                        <td>' . htmlspecialchars($row['quantityInStock']) . '</td>
                        <td>' . htmlspecialchars($row['buyPrice']) . '</td>
                    </tr>';
            }
            echo '</tbody>
                </table>';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<p>No product found with code ' . htmlspecialchars($productCode) . '.</p>';
        }

        mysqli_close($connection);
        ?>
    </div>
</body>
</html>
