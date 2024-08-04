<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'users';

$connection = mysqli_connect($server, $username, $password, $database_name);

if (!$connection) {
    die('Error: ' . mysqli_connect_error());
}

$customerName = '';
if (isset($_POST['customerName'])) {
    $customerName = mysqli_real_escape_string($connection, $_POST['customerName']);
}

$sqlcommand = "SELECT * FROM customers WHERE customerName LIKE '%$customerName%'";
$result = mysqli_query($connection, $sqlcommand);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
    <form method="POST" action="">
        <label for="customerName">Name:</label>
        <input type="text" id="customerName" name="customerName" value="<?php echo htmlspecialchars($customerName); ?>">
        <button type="submit">Search</button>
    </form>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table border="1">
                <tr>
                    <th>Customer Number</th>
                    <th>Customer Name</th>
                    <th>Password</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                    <th>Sales Rep Employee Number</th>
                    <th>Credit Limit</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . htmlspecialchars($row['customerNumber']) . '</td>
                    <td>' . htmlspecialchars($row['customerName']) . '</td>
                    <td>' . htmlspecialchars($row['CustomerPass']) . '</td>
                    <td>' . htmlspecialchars($row['contactLastName']) . '</td>
                    <td>' . htmlspecialchars($row['contactFirstName']) . '</td>
                    <td>' . htmlspecialchars($row['addressLine1']) . '</td>
                    <td>' . htmlspecialchars($row['addressLine2']) . '</td>
                    <td>' . htmlspecialchars($row['city']) . '</td>
                    <td>' . htmlspecialchars($row['state']) . '</td>
                    <td>' . htmlspecialchars($row['postalCode']) . '</td>
                    <td>' . htmlspecialchars($row['country']) . '</td>
                    <td>' . htmlspecialchars($row['salesRepEmployeeNumber']) . '</td>
                    <td>' . htmlspecialchars($row['creditLimit']) . '</td>
                </tr>';
        }
        echo '</table>';
    } else {
        echo 'No data found';
    }

    mysqli_close($connection);
    ?>
</body>
</html>
