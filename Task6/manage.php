                      <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

$sql = "
    SELECT 
        e.firstName AS employee_firstName, 
        e.lastName AS employee_lastName, 
        m.firstName AS manager_firstName, 
        m.lastName AS manager_lastName
    FROM employees e
    LEFT JOIN employees m ON e.reportsTo = m.employeeNumber
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Employee</th><th>Manager</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_firstName"] . " " . $row["employee_lastName"] . "</td><td>" . 
             (isset($row["manager_firstName"]) ? $row["manager_firstName"] . " " . $row["manager_lastName"] : "No Manager") . 
             "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

$conn->close();
?>
