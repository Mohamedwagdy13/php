<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'users';

$connection = mysqli_connect($server, $username, $password, $database_name);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql = "SELECT customers.customerNumber, customers.customerName, COUNT(orders.orderNumber) AS orderCount 
        FROM customers 
        LEFT JOIN orders ON customers.customerNumber = orders.customerNumber 
        GROUP BY customers.customerNumber";

$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1">
            <tr>
                <th>Customer Number</th>
                <th>Customer Name</th>
                <th>Order Count</th>
            </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . htmlspecialchars($row['customerNumber']) . '</td>
                <td>' . htmlspecialchars($row['customerName']) . '</td>
                <td>' . htmlspecialchars($row['orderCount']) . '</td>
              </tr>';
    }
    echo '</table>';

} else {
    echo 'No data found.';
}

mysqli_close($connection);
?>
