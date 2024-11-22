<?php
ob_start(); // Start output buffering

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/shaheenecommerece/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/shaheenecommerece/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/shaheenecommerece/PHPMailer-master/src/SMTP.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shaheenecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$name = '';
$email = '';
$cartItems = []; // Array to hold cart items

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $zip = $conn->real_escape_string($_POST['zip']);
    $cardName = $conn->real_escape_string($_POST['cardName']);
    $cardNum = $conn->real_escape_string($_POST['cardNum']);
    $expMonth = $conn->real_escape_string($_POST['expMonth']);
    $expYear = $conn->real_escape_string($_POST['expYear']);
    $cvv = $conn->real_escape_string($_POST['cvv']);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO checkout (name, email, address, city, state, zip, cardName, cardNum, expMonth, expYear, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters and execute the statement
    $stmt->bind_param("sssssssssss", $name, $email, $address, $city, $state, $zip, $cardName, $cardNum, $expMonth, $expYear, $cvv);

    if ($stmt->execute()) {
        // Retrieve selected products from the session or cart
        session_start(); // Start the session to access cart data
        $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Send confirmation email with PHPMailer
        sendConfirmationEmail($email, $name, $cartItems, $address, $city, $state, $zip);

        // Store order details in session for thank you page
        $_SESSION['order_number'] = uniqid();
        $_SESSION['order_date'] = date('Y-m-d');
        $_SESSION['order_details'] = [
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'cart_items' => $cartItems
        ];

        header("Location: thank_you.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

ob_end_flush(); // Flush the output buffer

// Function to send confirmation email
function sendConfirmationEmail($email, $name, $cartItems, $address, $city, $state, $zip) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alirazaibd2001@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'obzd oevs tlnk nszb'; // Replace with your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your-email@gmail.com', 'Himalayan Store');
        $mail->addAddress($email, $name);

        // Build the product list and calculate total
        $productDetails = '<h3>Your Order Details:</h3><ul>';
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $totalPrice += $itemTotal;
            $productDetails .= "<li>{$item['name']} - Quantity: {$item['quantity']} - Price: PKR {$item['price']} - Total: PKR {$itemTotal}</li>";
        }
        $productDetails .= "</ul><strong>Total Price: PKR {$totalPrice}</strong>";

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Order Confirmation - Himalayan Store';
        $mail->Body = "
            <html>
            <body>
                <h2>Thank you for your order!</h2>
                <p>Hello, {$name}!</p>
                <p>Your order has been received and is being processed.</p>
                <h3>Billing Address:</h3>
                <p>{$name}<br>{$address}<br>{$city}, {$state} {$zip}</p>
                {$productDetails}
                <p>Thank you for shopping with us!</p>
            </body>
            </html>
        ";

        $mail->send();
        echo "Confirmation email sent successfully";
    } catch (Exception $e) {
        echo "Failed to send confirmation email. Error: {$mail->ErrorInfo}";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment Page</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <div class="container">
        <a href="cart.php" class="back-button">Back to Cart</a>
        <form action="checkout.php" method="POST">
            <div class="row">
                <div class="col">
                    <h3 class="title">Billing Address</h3>
                    <div class="inputBox">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="inputBox">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="inputBox">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" placeholder="Enter address" required>
                    </div>
                    <div class="inputBox">
                        <label for="city">province:</label>
                        <input type="text" id="city" name="city" placeholder="Enter city" required>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <label for="state">city:</label>
                            <input type="text" id="state" name="state" placeholder="Enter state" required>
                        </div>
                        <div class="inputBox">
                            <label for="zip">Zip Code:</label>
                            <input type="number" id="zip" name="zip" placeholder="123 456" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">Payment</h3>
                    <div class="inputBox">
                        <label for="cardName">Card Accepted:</label>
                        <img src="pictures/pay.png" alt="credit/debit card image">
                    </div>
                    <div class="inputBox">
                        <label for="cardName">Name On Card:</label>
                        <input type="text" id="cardName" name="cardName" placeholder="Enter card name" required>
                    </div>
                    <div class="inputBox">
                        <label for="cardNum">Credit Card Number:</label>
                        <input type="text" id="cardNum" name="cardNum" placeholder="1111-2222-3333-4444" maxlength="19" required>
                    </div>
                    <div class="inputBox">
                        <label for="">Exp Month:</label>
                        <select name="expMonth" required>
                            <option value="">Choose month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <label for="">Exp Year:</label>
                            <select name="expYear" required>
                                <option value="">Choose Year</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <label for="cvv">CVV</label>
                            <input type="number" id="cvv" name="cvv" placeholder="123" maxlength="3" required>
                        </div>
                    </div>
                    <button type="submit" class="btn1">Confirm Payment</button>                    </div>
            </div>
        </form>
    </div>
</body>
</html>
 