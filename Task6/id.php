<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'users';

$connection = mysqli_connect($server, $username, $password, $database_name);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

$customerNumber = isset($_GET['customerNumber']) ? intval($_GET['customerNumber']) : 0;

if ($customerNumber > 0) {
    $sqlcommand = 'SELECT * FROM customers WHERE customerNumber = ' . $customerNumber;
    $result = mysqli_query($connection, $sqlcommand);
    
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Password</th>
                        <th>Contact Last Name</th>
                        <th>Contact First Name</th>
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
        echo '</tbody></table>';

    } else {
        echo '<p class="mt-4">No data found for the provided customer number.</p>';
    }
} else {
    echo '<p class="mt-4">Please enter a valid customer number.</p>';
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Lookup</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Customer Lookup</h1>
    <form action="" method="GET">
        <div class="form-group">
            <label for="customerNumber">Enter Customer Number:</label>
            <input type="text" id="customerNumber" name="customerNumber" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
