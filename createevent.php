<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: purple;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .analytics, .product-management, .earnings {
            margin-bottom: 20px;
        }

        button {
            background-color: purple;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #800080; /* darker shade of purple on hover */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], input[type="file"], button[type="submit"] {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 5px;
            width: calc(33.33% - 10px); /* 3 cards per row */
            display: inline-block;
            box-sizing: border-box;
            vertical-align: top;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 10px;
        }

        .product-card h3 {
            margin: 0;
            font-size: 18px;
        }

        .product-card p {
            margin: 5px 0 0;
            font-size: 16px;
        }
    </style>
</head>
<body>

<nav>
    <h1> event-creatorsDashboard</h1>
    <button onclick="logout()">Logout</button>
</nav>

<div class="container">
    <div class="analytics">
        <h2>Analytics</h2>
        <!-- Display analytics here -->
    </div>

    <div class="product-management">
        <h2>Product Management</h2>
        <form id="productForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>

            <label for="productPrice">Price:</label>
            <input type="number" id="productPrice" name="productPrice" required>

            <label for="productImage">Image:</label>
            <input type="file" id="productImage" name="productImage" accept="image/*" required>

            <button type="submit">Add Product</button>
        </form>
    </div>

    <!-- Display products -->
    <div class="products">
        <h2>Products</h2>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                    <h3><?php echo $product['product_name']; ?></h3>
                    <p>Price: $<?php echo $product['product_price']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logout() {
        // Implement logout functionality
        window.location.href = "eventpage.php";
    }

    // Code to handle form submission for adding a product
    document.getElementById('productForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            Swal.fire({
                title: "Product added successfully!",
                icon: "success"
            });
            // Clear form fields if needed
            this.reset();
            // You can also refresh the page or update product list after successful product addition
            // window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
</body>
</html>
