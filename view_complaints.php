<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "easelife2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch complaints
$sql = "SELECT * FROM complaints WHERE status = 'pending'";
$result = $conn->query($sql);

// Display complaints
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Complaint: " . $row["complaint"] . "<br>";
        echo "<form action='resolve_complaint.php' method='POST'>
                <input type='hidden' name='id' value='" . $row["id"] . "'>
                <button type='submit'>Resolve</button>
              </form>";
    }
} else {
    echo "No complaints found.";
}

$conn->close();
?>
