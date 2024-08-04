<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .btn {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .alert {
            color: #d9534f;
        }
    </style>
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
            // Retrieve the product code from the form
            if (isset($_POST['productCode']) && !empty($_POST['productCode'])) {
                $productCode = mysqli_real_escape_string($connection, $_POST['productCode']);

                // Prepare the SQL query
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
