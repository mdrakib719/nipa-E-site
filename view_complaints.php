<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Customer Complaints</h1>
        <table class="complaints-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Complaint</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
$username = "root";
$password = "";
$dbname = "easelife2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
                $sql = "SELECT complaints.id, users.username, complaints.message, complaints.status 
                        FROM complaints 
                        JOIN users ON complaints.user_id = users.id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['message']}</td>
                                <td>" . ucfirst($row['status']) . "</td>
                                <td>
                                    <form action='resolve_complaint.php' method='POST'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <button type='submit' class='btn resolve-btn'>Resolve</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No complaints found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
