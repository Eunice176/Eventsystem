<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "eventexpo";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reminder = $_POST["reminder"];
    $reminder_time = $_POST["reminder_time"];

    // Insert reminder into the database
    $sql = "INSERT INTO reminders (reminder, reminder_time) VALUES ('$reminder', '$reminder_time')";
    if ($conn->query($sql) === TRUE) {
        echo "Reminder set successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
