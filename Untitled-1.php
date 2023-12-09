<?php
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve tracking number from the GET request
$trackingNumber = $_GET['tracking_number'];

// Insert tracking number into the database
$sql = "INSERT INTO tracking_numbers (tracking_number) VALUES ('$trackingNumber')";

if ($conn->query($sql) === TRUE) {
    echo "Tracking number inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>