<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products by Stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <h1>Search Products by Stock</h1>

        <?php
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $database_name = 'users';

        $connection = mysqli_connect($server, $username, $password, $database_name);

        if (!$connection) {
            die('Error: ' . mysqli_connect_error());
        }

        $minStock = '';
        $result = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['minStock']) && is_numeric($_POST['minStock'])) {
                $minStock = (int) $_POST['minStock'];

                if ($minStock >= 100 && $minStock <= 5000) {
                    // Prepare the SQL query
                    $sqlcommand = "SELECT * FROM products WHERE quantityInStock > $minStock";
                    $result = mysqli_query($connection, $sqlcommand);
                } else {
                    echo '<p class="alert">Stock value must be between 100 and 5000.</p>';
                }
            }
        }
        ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="minStock">Enter minimum stock (100 to 5000):</label>
                <input type="number" id="minStock" name="minStock" class="form-control" min="100" max="5000" value="<?php echo htmlspecialchars($minStock); ?>" required>
            </div>
            <button type="submit" class="btn">Search</button>
        </form>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            echo '<table>
                    <thead>
                        <tr>
                            <th>productName </th>
                            <th>productDescription</th>
                            <th>quantityInStock</th>
                            <th>buyPrice</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . htmlspecialchars($row['productName']) . '</td>
                        <td>' . htmlspecialchars($row['productDescription']) . '</td>
                        <td>' . htmlspecialchars($row['quantityInStock']) . '</td>
                        <td>' . htmlspecialchars($row['buyPrice']) . '</td>
                    </tr>';
            }
            echo '</tbody>
                </table>';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<p>No products found with stock greater than ' . htmlspecialchars($minStock) . '.</p>';
        }

        mysqli_close($connection);
        ?>
    </div>
</body>
</html>
