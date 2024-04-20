<?php
// Database connection
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "eventexpo"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Retrieve password

    // Check if password meets criteria
    if (preg_match('/^(?=.*[a-zA-Z])(?=.*[^\w\s]).{6,}$/', $password)) {
        // Password meets criteria, hash it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to insert data into the table
        $sql = "INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $fullName, $userName, $email, $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            // Close statement
            $stmt->close();
            // Close connection
            $conn->close();

            // Send JSON response
            echo json_encode(['success' => true]);
            exit;
        } else {
            // Send JSON response with error message
            echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . "<br>" . $conn->error]);
        }
    } else {
        // Password doesn't meet criteria, send error response
        echo json_encode(['success' => false, 'message' => 'Password must contain a mixture of letters and special characters and be at least 6 characters long.']);
    }
}

// Check if the username already exists
$existingUsernameQuery = "SELECT COUNT(*) FROM users WHERE username = ?";
$stmtCheckUsername = $conn->prepare($existingUsernameQuery);
$stmtCheckUsername->bind_param("s", $userName);
$stmtCheckUsername->execute();
$stmtCheckUsername->bind_result($usernameCount);
$stmtCheckUsername->fetch();
$stmtCheckUsername->close();

if ($usernameCount > 0) {
    // Username already exists, handle the situation (e.g., show an error message)
    echo "Error: Username already taken.";
} else {
    // Continue with the INSERT query since the username is unique
    // ... (your existing INSERT logic)
}

// Close connection if not in POST request
$conn->close();
?>
