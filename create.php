<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
        }
        
        /* Custom CSS to style the button */
        .btn-purple {
            background-color: purple;
            border-color: purple;
        }

        .btn-purple:hover {
            background-color: #800080; /* darker shade of purple on hover */
            border-color: #800080;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Event Form</h2>

                <?php
                // Database connection details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "eventexpo";

                // Create a new database connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if the form data was submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get the form data
                    $eventName = $_POST['event_name'];
                    $eventDescription = $_POST['event_description'];
                    $eventDate = $_POST['event_date'];
                    $eventTime = $_POST['event_time'];
                    $eventAmount = $_POST['event_amount'];

                    // Handle the event image upload
                    $eventImage = $_FILES['event_image'];
                    $imageName = $eventImage['name'];
                    $imageTmpName = $eventImage['tmp_name'];
                    $imageSize = $eventImage['size'];
                    $imageError = $eventImage['error'];

                    // Move the uploaded image to a desired location
                    $uploadDir = 'uploads/';
                    $uploadPath = $uploadDir . basename($imageName);

                    if ($imageError === UPLOAD_ERR_OK) {
                        if (move_uploaded_file($imageTmpName, $uploadPath)) {
                            // Prepare the SQL statement
                            $sql = "INSERT INTO events (event_name, event_description, event_date, event_time, event_amount, event_image) VALUES (?, ?, ?, ?, ?, ?)";

                            // Prepare the statement
                            $stmt = $conn->prepare($sql);

                            // Bind the parameters
                            $stmt->bind_param("ssssds", $eventName, $eventDescription, $eventDate, $eventTime, $eventAmount, $uploadPath);

                            // Execute the statement
                            if ($stmt->execute()) {
                                echo '<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">Event uploaded successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
                            }

                            // Close the statement and connection
                            $stmt->close();
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error uploading event image.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Error uploading event image.</div>';
                    }
                }


                $conn->close();
                ?>

                <form id="event-form" enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="event-name">Event Name</label>
                            <input type="text" class="form-control" id="event-name" name="event_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="event-date">Event Date</label>
                            <input type="date" class="form-control" id="event-date" name="event_date" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="event-time">Event Time</label>
                            <input type="time" class="form-control" id="event-time" name="event_time" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="event-amount">Event Amount</label>
                            <input type="number" step="0.01" class="form-control" id="event-amount" name="event_amount" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="event-image">Event Image</label>
                            <input type="file" class="form-control-file" id="event-image" name="event_image" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event-description">Event Description</label>
                        <textarea class="form-control" id="event-description" name="event_description" rows="3" required></textarea>
                    </div>
                    <div class="text-center">
                        <!-- Adding btn-purple class to make the button purple -->
                        <button type="submit" class="btn btn-primary btn-purple">Submit Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Get the success alert element
        const successAlert = document.getElementById('success-alert');

        // Check if the success alert exists
        if (successAlert) {
            // Set a timeout to hide the alert after 2 seconds
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 2000);
        }
    </script>
</body>
</html>
