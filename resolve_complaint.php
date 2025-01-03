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

// Resolve complaint
$id = $_POST['id'];
$sql = "UPDATE complaints SET status = 'resolved' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Complaint resolved successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolve Complaint</title>
    <link rel="stylesheet" href="complain.css">
</head>
<body>
    <div class="container">
        <h1>Resolve Complaint</h1>
        <div class="complaint-card">
            <p><strong>Complaint ID:</strong> <?php echo $_POST['id']; ?></p>
            <p>Are you sure you want to mark this complaint as resolved?</p>
            <form action="resolve_complaint_process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                <div class="buttons">
                    <button type="submit" class="btn resolve">Resolve</button>
                    <a href="view_complaints.php" class="btn cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
