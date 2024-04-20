<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Listing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .navbar {
            background-color: #f2f2f2;
            padding: 10px;
        }

        .icon-cart {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        #icon-count {
            margin-right: 5px;
        }

        .cart {
            display: none; /* Initially hide the cart */
            width: 250px;
            position: fixed;
            top: 60px; /* Adjust the top position to account for the navbar */
            right: 10px;
            text-align: center;
            border: 1px solid black;
            overflow-y: scroll;
            height: 300px;
            margin-top: 20px;
            font:bold;
        }

        .cart.active {
            display: block; /* Show the cart when it has the 'active' class */
        }
        
        .cart{
            width: 250px;
            float: right;
            text-align: center;
            border: 1px solid black;
            overflow-y: scroll;
            height: 300px; /* Adjusted height for demonstration */
            margin-top: 20px; /* Added margin-top for spacing */
        }
        .cart-item {
            margin-bottom: 10px;
        }
        .cartimg img{
            width: 200px;
        }
        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .stars {
            color: #ffd700;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Event Listing</a>
            <div class="icon-cart" onclick="redirectToCart()">
                <i class="fas fa-shopping-cart"></i>
                <span id="icon-count">0</span> <!-- Display the count of items in the cart -->
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="grid-container">
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

            // Prepare the SQL statement
            $sql = "SELECT * FROM events";

            // Execute the query
            $result = $conn->query($sql);

            // Loop through the results and display the events
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="grid-item">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['event_image'] . '" class="card-img-top" alt="Event Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['event_name'] . '</h5>';
                    echo '<p class="card-text">' . $row['event_description'] . '</p>';
                    echo '<p class="card-text"><b>Date: </b>' . $row['event_date'] . '</p>';
                    echo '<p class="card-text"><b>Time: </b>' . $row['event_time'] . '</p>';
                    echo '<p class="card-text"><b>Price: $</b>' . $row['event_amount'] . '</p>';
                    echo '<div class="stars" id="stars' . $row['id'] . '" onclick="rateMeal(\'stars' . $row['id'] . '\')"> ';
                    echo '<div class="container">';
                    echo '<span class="fa fa-star checked"></span>';
                    echo '<span class="fa fa-star checked"></span>';
                    echo '<span class="fa fa-star checked"></span>';
                    echo '<span class="fa fa-star checked"></span>';
                    echo '<span class="fa fa-star"></span>';
                    echo '</div>';
                    echo '</div>';
                    echo '<button class="btn btn-primary" onclick="addToCart(\'' . $row['event_name'] . '\', ' . $row['event_amount'] . ')">Add to Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="alert alert-info" role="alert">No events found.</div>';
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var cartItems = [];
        var cartTotal = 0;

        function rateMeal(starsId) {
            // Add code to handle rating meals
            console.log('Rating meal ' + starsId);
        }

        // Function to add an event to the cart
        function addToCart(itemName, itemPrice) {
            // Add the item to the cart array
            cartItems.push({ name: itemName, price: itemPrice });

            // Update the total amount
            cartTotal += itemPrice;

            // Update the count of items in the cart
            var itemCount = parseInt(document.getElementById('icon-count').innerText);
            document.getElementById('icon-count').innerText = itemCount + 1;
        }

        function redirectToCart() {
            // Save the cart items and total to localStorage
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            localStorage.setItem('cartTotal', cartTotal.toFixed(2));

            // Redirect to the cart page
            window.location.href = 'cart.html';
        }
    </script>