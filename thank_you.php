<?php
session_start(); // Start the session

// If there is a session order number, retrieve it
$order_number = $_SESSION['order_number'] ?? uniqid();
$order_date = $_SESSION['order_date'] ?? date('Y-m-d');

// Function to retrieve cart items from localStorage (simulated for PHP)
function getCartItems() {
    echo '<script>
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let cartItemsHtml = "";
        let orderTotal = 0;

        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            orderTotal += itemTotal;
            cartItemsHtml += `<li>${item.name} - PKR ${item.price} x ${item.quantity} = PKR ${itemTotal.toFixed(2)}</li>`;
        });

        document.getElementById("order-items").innerHTML = cartItemsHtml;
        document.getElementById("order-total").textContent = `Total: PKR ${orderTotal.toFixed(2)}`;
    </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="thankyou.css"> <!-- Optional: Create a separate CSS file for styling -->
    
    <title>Thank You for Your Order - Himalayan Store</title>
</head>
<body>
    <!-- Header Section -->

    <!-- Thank You Section -->
    <section id="thank-you">
        <div class="thank-you-container">
            <h2>Thank You for Your Order!</h2>
            <p>Your order has been successfully placed. We appreciate your business!</p>

            <h3>Order Summary</h3>
            <p><strong>Order Number:</strong> <?php echo htmlspecialchars($order_number); ?></p>
            <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order_date); ?></p>
            <h4>Your items:</h4>
            <ul id="order-items">
                <!-- Order items will be displayed here -->
            </ul>
            <h3 id="order-total">Total: PKR 0</h3>

            <p>You will receive an email confirmation shortly with the details of your order.</p>

            <h3>What Happens Next?</h3>
            <p>Your order will be processed, and you will receive updates regarding shipping and delivery via email. If you have any questions, feel free to contact us.</p>

            <div class="contact-info">
            <p>Need Help? <a href="contact.php" >Contact Us</a></p>
            <p><strong>Email:</strong> support@shaheensalts.com</p>
                <p><strong>Phone:</strong> +92 123 456 7890</p>
            </div>

            <a href="shop.php" class="btn">Continue Shopping</a>
            <a href="index.php" class="btn back-btn">Back to Home</a> <!-- Back button -->
        </div>
    </section>

    <!-- Footer Section -->

    <!-- Load cart items and total using JavaScript -->
    <?php getCartItems(); ?>

    <style>
       body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9; /* Light background color */
    color: #333; /* Default text color */
    margin: 0;
    padding: 20px;
}

#thank-you {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
    background-color: #fff; /* White background for the thank you section */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #d45d3f; /* A warm, salt-inspired color for the header */
}

.contact-info {
    margin-top: 20px;
    padding: 10px;
    border-top: 1px solid #ccc; /* Light border */
}

.btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #d45d3f; /* Warm color for buttons */
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #c44c34; /* Slightly darker warm color on hover */
}

.back-btn {
    background-color: #f44336; /* Red color for back button */
}

.back-btn:hover {
    background-color: #d32f2f; /* Darker red on hover */
}

    </style>
</body>
</html>
