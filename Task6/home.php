<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'users';

$connection = mysqli_connect($server, $username, $password, $database_name);

if (!$connection) {
    die('no data' . mysqli_connect_error());
}

$sqlcommand = 'SELECT * FROM customers WHERE creditLimit > 20000';
$result = mysqli_query($connection, $sqlcommand);

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1">
            <tr>
                <th>customerNumber</th>
                <th>customerName</th>
                <th>CustomerPass</th>
                <th>contactLastName</th>
                <th>contactFirstName</th>
                <th>addressLine1</th>
                <th>addressLine2</th>
                 <th>city</th>
                <th>state</th>
                <th>postalCode</th>
                <th>country</th>
                <th>salesRepEmployeeNumber</th>
                <th>creditLimit</th>



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
    echo 'no data';
}

mysqli_close($connection);
?>
