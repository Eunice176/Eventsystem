<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2c1b3d;
            color: #fff;
        }
        .container {
            max-width: 1200px;
        }
        .table {
            background-color: #3c2a57;
            color: #fff;
            font-size: 14px;
        }
        .table th, .table td {
            border-color: #4d3771;
        }
        .btn-danger {
            background-color: #7b5ca8;
            border-color: #7b5ca8;
        }
        .btn-danger:hover {
            background-color: #8264b8;
            border-color: #8264b8;
        }
    </style>
</head>
<body>

<nav>

            <a href="create.php">CREATE EVENT</a>
            <a href="logout.php">LOGOUT</a>
             <div class="header">
  
    
          </div>

    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Event Admin</h1>

        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex">
                <input type="text" class="form-control mr-2" id="searchInput" placeholder="Search by name...">
                <select class="form-control" id="monthFilter">
                    <option value="">Filter by month</option>
                    <?php
                        $currentMonth = date('n');
                        for ($i = $currentMonth; $i <= 12; $i++) {
                            echo '<option value="' . $i . '">' . date('F', mktime(0, 0, 0, $i, 1)) . '</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Event Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="eventTable">
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

                // Retrieve all events from the database
                $sql = "SELECT * FROM events";
                $result = $conn->query($sql);

                // Check if any events are found
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["id"] . '</td>';
                        echo '<td>' . $row["event_name"] . '</td>';
                        echo '<td>' . $row["event_date"] . '</td>';
                        echo '<td>' . $row["event_time"] . '</td>';
                        echo '<td>KSH ' . $row["event_amount"] . '</td>';
                        echo '<td>';
                        echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
                        echo '<input type="hidden" name="event_id" value="' . $row["id"] . '">';
                        echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">No events found.</td></tr>';
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

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

    // Get the event ID from the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eventId = $_POST['event_id'];

        // Delete the event from the database
        $sql = "DELETE FROM events WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $eventId);

        if ($stmt->execute()) {
            // Redirect back to the admin page
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Error deleting event: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Search and filter functionality
        const searchInput = document.getElementById('searchInput');
        const monthFilter = document.getElementById('monthFilter');
        const eventTable = document.getElementById('eventTable');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const rows = eventTable.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const eventName = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
                if (eventName.includes(searchTerm)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });

        monthFilter.addEventListener('change', function() {
            const selectedMonth = monthFilter.value;
            const rows = eventTable.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const eventDate = rows[i].getElementsByTagName('td')[2].textContent;
                const eventMonth = new Date(eventDate).getMonth() + 1;
                if (selectedMonth === '' || eventMonth === parseInt(selectedMonth)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>