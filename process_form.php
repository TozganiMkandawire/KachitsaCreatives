<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php'; // Ensure this path is correct

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    try {
        // Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'tozziemk03@gmail.com';                // Your Gmail address
        $mail->Password   = 'Tozzie@3002';                 // Your Gmail password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('your-email@gmail.com', 'Your Name');      // Your name
        $mail->addAddress('tozziemk03@gmail.com');                 // The email address where messages will be sent

        // Content
        $mail->isHTML(true);                                       // Set email format to HTML
        $mail->Subject = 'New Appointment Booking';
        $mail->Body    = "You have received a new booking:<br><br>
                          Name: $name<br>
                          Email: $email<br>
                          Phone: $phone<br>
                          Message: $message<br>";

        $mail->send();
        echo 'Success! Your message has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
