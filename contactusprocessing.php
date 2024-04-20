<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message= $_POST["message"];
   /* $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";*/


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

    // Insert data into the database
    $sql = "INSERT INTO contactus (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Send email
        $to = "eunicemaina006@gmail.com";
        $subject = "New Contact Form Submission";
        $email_message = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
        $headers = "From: $email";

        mail($to, $subject, $email_message, $headers);

        echo "<script>alert('Thank you for contacting us. We will get back to you shortly.');</script>";
    } else {
        echo "<script>alert('Sorry, something went wrong. Please try again later.');</script>";
    }
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Close the database connection
    $conn->close();
}
?>
