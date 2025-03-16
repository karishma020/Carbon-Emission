<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbon_emission_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET['email']; // Get user email from URL

$sql = "SELECT * FROM fines WHERE email = '$email'";
$result = $conn->query($sql);

echo "<h2>Fine History for: $email</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Ref. Number</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ref_number']}</td>
                <td>{$row['amount']}</td>
                <td>{$row['fine_date']}</td>
              </tr>";
    }
    echo "</table>";
    echo "<br><a href='generate_invoice.php?email=$email'>Download Invoice</a>";
} else {
    echo "No fines recorded.";
}

$conn->close();
?>
