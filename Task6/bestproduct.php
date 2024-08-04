<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'users';

$connection = mysqli_connect($server, $username, $password, $database_name);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql = 'SELECT products.quantityInStock, products.productName, COUNT(orders.orderNumber) AS totalSold
        FROM orders
        INNER JOIN products ON orders.orderNumber = products.quantityInStock
        GROUP BY products.quantityInStock, products.productName
        ORDER BY totalSold DESC';

$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1">
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Total Sold</th>
            </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . htmlspecialchars($row['productCode']) . '</td>
                <td>' . htmlspecialchars($row['productName']) . '</td>
                <td>' . htmlspecialchars($row['totalSold']) . '</td>
              </tr>';
    }
    echo '</table>';

} else {
    echo 'No data found.';
}

mysqli_close($connection);
?>
