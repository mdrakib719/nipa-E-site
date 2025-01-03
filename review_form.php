<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review and Complaint</title>
</head>
<body>
    <h1>Submit a Review</h1>
    <form action="submit_review.php" method="POST">
        <label for="booking_id">Booking ID:</label>
        <input type="number" id="booking_id" name="booking_id" required><br>

        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>

        <label for="review">Review:</label>
        <textarea id="review" name="review"></textarea><br>

        <button type="submit">Submit Review</button>
    </form>

    <h1>Submit a Complaint</h1>
    <form action="submit_complaint.php" method="POST">
        <label for="booking_id">Booking ID:</label>
        <input type="number" id="booking_id" name="booking_id" required><br>

        <label for="complaint">Complaint:</label>
        <textarea id="complaint" name="complaint" required></textarea><br>

        <button type="submit">Submit Complaint</button>
    </form>
</body>
</html>
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

// Get form data
$customer_id = 1; // Replace with session user ID
$booking_id = $_POST['booking_id'];
$rating = $_POST['rating'];
$review = $_POST['review'];

// Insert into reviews table
$sql = "INSERT INTO reviews (customer_id, booking_id, rating, review) VALUES ('$customer_id', '$booking_id', '$rating', '$review')";
if ($conn->query($sql) === TRUE) {
    echo "Review submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
