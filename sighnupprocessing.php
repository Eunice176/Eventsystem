<?php
 $servername = "localhost";
 $username ="root";
 $password = "";
 $dbname = "eventproject";

 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check the connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["selectoption"];

    // Validate passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        exit();
    }

    // Validate password strength
    if (strlen($password) > 7 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
        echo "<script>alert('Password should be at least 7 characters long and include letters, numbers, and special characters.');</script>";
        exit();
    }

    // Database connection parameters
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "eventprojecteunice"; // Replace with your actual database name

    // Create database connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists
    $check_username_sql = "SELECT * FROM signup WHERE username = '$username'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already taken. Please choose another username.');</script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the database
    $insert_sql = "INSERT INTO signup (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('Signup successful. You can now login.');</script>";
    } else {
        echo "<script>alert('Error: " . $insert_sql . "<br>" . $conn->error . "');</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
