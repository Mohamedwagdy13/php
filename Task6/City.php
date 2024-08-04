<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'users';

$connection = mysqli_connect($server, $username, $password, $database_name);

if (!$connection) {
    die('Error: ' . mysqli_connect_error());
}

$selected_city = '';
if (isset($_POST['city']) && !empty($_POST['city'])) {
    $selected_city = mysqli_real_escape_string($connection, $_POST['city']);
}

$cities_sql = "SELECT DISTINCT city FROM customers";
$cities_result = mysqli_query($connection, $cities_sql);

$top_customers_result = [];
if (!empty($selected_city)) {
    $top_customers_sql = "SELECT * FROM customers WHERE city = '$selected_city' ORDER BY creditLimit DESC LIMIT 3";
    $top_customers_result = mysqli_query($connection, $top_customers_sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Top 3 Richest Customers</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="city" class="form-label">Select City</label>
                <select id="city" name="city" class="form-select" aria-label="Default select example">
                    <option value="">Open this select menu</option>
                    <?php
                    if ($cities_result) {
                        while ($city_row = mysqli_fetch_assoc($cities_result)) {
                            $city = htmlspecialchars($city_row['city'], ENT_QUOTES, 'UTF-8');
                            $selected = ($city == $selected_city) ? 'selected' : '';
                            echo '<option value="' . $city . '" ' . $selected . '>' . $city . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php
        if (!empty($selected_city) && $top_customers_result && mysqli_num_rows($top_customers_result) > 0) {
            echo '<h2>Top 3 Richest Customers in ' . htmlspecialchars($selected_city, ENT_QUOTES, 'UTF-8') . '</h2>';
            echo '<table class="table">
                    <thead>
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
                        </tr>
                    </thead>
                    <tbody>';

            while ($row = mysqli_fetch_assoc($top_customers_result)) {
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
            echo '</tbody>
                </table>';
        } elseif (!empty($selected_city)) {
            echo '<p>No data found for the city ' . htmlspecialchars($selected_city, ENT_QUOTES, 'UTF-8') . '.</p>';
        }
        ?>

    </div>
</body>
</html>

<?php
mysqli_close($connection);
?>
