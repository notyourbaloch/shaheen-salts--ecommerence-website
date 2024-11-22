<!DOCTYPE html>
<html lang="en"> <!-- Added lang attribute -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Viewport meta element for responsiveness -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="contact.css">
    
    <title>Contact Us - Himalayan Store</title>
</head>
<body>
    <!-- Header Section -->
    <?php include 'header.php'; ?>

    <!-- Contact Form Section -->
    <section id="contact">
        <div class="contact-container">
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to reach out to us!</p>

            <!-- Contact Form -->
            <form id="contact-form" method="POST" action="contact.php">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                
                <button type="submit" id="submit" name="submit" value="Send Message">Send Message</button>
            </form>
            <?php
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "shaheenecommerce";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Include PHPMailer files
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'C:/xampp/htdocs/shaheenecommerece/PHPMailer-master/src/Exception.php';
            require 'C:/xampp/htdocs/shaheenecommerece/PHPMailer-master/src/PHPMailer.php';
            require 'C:/xampp/htdocs/shaheenecommerece/PHPMailer-master/src/SMTP.php';

            // Check if the form was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['submit'])) {
                    // Retrieve form data
                    $name = $conn->real_escape_string($_POST['name']);
                    $email = $conn->real_escape_string($_POST['email']);
                    $subject = $conn->real_escape_string($_POST['subject']);
                    $message = $conn->real_escape_string($_POST['message']);
                    
                    // Insert data into the database
                    $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Thank you for contacting us!</p>";

                        // Send confirmation email using PHPMailer
                        $mail = new PHPMailer(true);
                        try {
                            // Server settings
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'alirazaibd2001@gmail.com'; // Replace with your Gmail address
                            $mail->Password = 'obzd oevs tlnk nszb'; // Replace with your app-specific password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
                            $mail->Port = 587; // TCP port to connect to
                
                            // Recipients
                            $mail->setFrom('your-email@gmail.com', 'Himalayan Store');
                            $mail->addAddress($email, $name);

                            // Content
                            $mail->isHTML(true);
                            $mail->Subject = 'Thank you for contacting us!';
                            $mail->Body = "
                                <html>
                                <body>
                                    <h2>Thank you for contacting Himalayan Store!</h2>
                                    <p>Hello, $name!</p>
                                    <p>We have received your message:</p>
                                    <blockquote>$message</blockquote>
                                    <p>Our team will get back to you shortly.</p>
                                    <p>Best regards,<br>Himalayan Store Team</p>
                                </body>
                                </html>
                            ";

                            $mail->send();
                        } catch (Exception $e) {
                            echo "Failed to send confirmation email. Error: {$mail->ErrorInfo}";
                        }
                    } else {
                        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                    }
                }
            }

            // Close the database connection
            $conn->close();
            ?>
            <div class="contact-info">
                <h3>Or Reach Us At</h3>
                <p><strong>Email:</strong> support@shaheensalts.com</p>
                <p><strong>Phone:</strong> +92 123 456 7890</p>
                <p><strong>Address:</strong> 123 Salt Street, Islamabad, Pakistan</p>
                <h3>Follow Us</h3>
                <div class="social-media">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>
    <script src="contact.js" defer></script>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>

</body>
</html>
